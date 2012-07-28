<?php

class Usuariomodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function iniciarSesion($usuario, $password) {
        $alumnoid = null;
        $campos = array('usuario' => $usuario, 'password' => $password);
        $query = $this->db->get_where('superadmin', $campos);
        $result = $query->result_array();
        if ($query->num_rows() > 0) {
            $usuario = $result[0];
            $tipo = 'superadmin';
            $id = $result[0]['superadmin_id'];
            $id_cole = $result[0]['colegio_id'];
        } else {
            $query = $this->db->get_where('administrador', $campos);
            $result = $query->result_array();
            if ($query->num_rows() > 0) {
                $usuario = $result[0];
                $tipo = 'administrador';
                $id = $result[0]['admin_id'];
                $id_cole = $result[0]['colegio_id'];
            } else {
                $query = $this->db->get_where('profesor', $campos);
                $result = $query->result_array();
                if ($query->num_rows() > 0) {
                    $usuario = $result[0];
                    $tipo = 'profesor';
                    $id = $result[0]['profesor_id'];
                    $id_cole = $result[0]['colegio_id'];
                } else {
                    $query = $this->db->get_where('alumno', $campos);
                    $result = $query->result_array();
                    if ($query->num_rows() > 0) {
                        $usuario = $result[0];
                        $tipo = 'alumno';
                        $id = $result[0]['alumno_id'];
                        $id_cole = $result[0]['colegio_id'];
                    } else {
                        //echo "Entra".print_r($campos);
                        $query = $this->db->get_where("padres", $campos);
                        $result = $query->result_array();
                        if ($query->num_rows() > 0) {

                            $usuario = $result[0];
                            $tipo = 'padre';
                            $id = $result[0]['id'];
                            $id_cole = $result[0]['colegio_id'];
                            $alumnoid = $result[0]['alumno_id'];
                        } else {
                            return 'El usuario no existe.';
                        }
                    }
                }
            }
        }
        if ($usuario['estado'] == 'activo') {
            $usuario['id'] = $id;
            $usuario['tipo'] = $tipo;
            if ($id_cole != null)
                $usuario['colegio_id'] = $id_cole;
            if ($alumnoid != null)
                $usuario['alumno_id'] = $alumnoid;
            return $usuario;
        }
        else {
            return 'Usted es un usuario inactivo.';
        }
    }

    function creaNombreUsuario($nombre_alum, $apell_alumn) {
        $apellidos = explode(" ", $apell_alumn);
        $alNom = explode(" ", $nombre_alum);
        if (!empty($alNom[1]))
            $alumnoNom = $alNom[0] . $alNom[1];
        else
            $alumnoNom = $alNom[0];
        $nombre = "";
        for ($i = 1; $i < strlen($alumnoNom) - 1; $i++) {

            $nombre = substr(utf8_decode($alumnoNom), 0, $i);
            $nomUsuario = $nombre . $apellidos[0];
            $bool=$this->existeNomUsuarioAlumno($nomUsuario);
            if (!$bool)
                return $nomUsuario;
        }
        return $nomUsuario;
    }

    function cambiarPassword($password, $idUsuario, $tipo) {
        $administrador = array('password' => $password);
        if ($tipo == 'alumno')
            $this->db->where('alumno_id', $idUsuario);
        elseif ($tipo == 'profesor')
            $this->db->where('profesor_id', $idUsuario);
        elseif ($tipo == 'administrador')
            $this->db->where('admin_id', $idUsuario);

        $this->db->update($tipo, $administrador);
    }

    function obtenerBusqueda($datos, $criterio) {
        $idCole = $this->session->userdata('idCole');
        $nombreSQL = '';
        $apellidoSQL = '';
        if (isset($datos['nombre_usuario']) && TRIM($datos['nombre_usuario']) != '')
            $nombreSQL = ' AND nombre LIKE ' . $this->db->escape('%' . TRIM($datos['nombre_usuario']) . '%');
        if (isset($datos['apellido_usuario']) && TRIM($datos['apellido_usuario']) != '')
            $apellidoSQL = ' AND apellido LIKE ' . $this->db->escape('%' . TRIM($datos['apellido_usuario']) . '%');
        $colegioSQL = ' AND colegio_id = ' . $this->db->escape($idCole);
        if ($criterio == 'alumno')
            $detallesQuery = 'SELECT alumno_id,nombre,apellido,nombre_curso FROM alumno as A,curso as C WHERE A.curso_id = C.curso_id AND 1=1 AND A.colegio_id = ' . $this->db->escape($idCole) . $nombreSQL . $apellidoSQL;
        else
            $detallesQuery= 'SELECT * FROM ' . $criterio . ' WHERE 1=1' . $nombreSQL . $apellidoSQL . $colegioSQL;
        $asociadosQuery = $this->db->query($detallesQuery);
        return $asociadosQuery->result_array();
    }

    function obtieneCampoUsuario($id_usuario, $tipo) {
        if ($tipo == 'alumno')
            $usuarioQuery = $this->db->query('SELECT usuario FROM alumno WHERE alumno_id = ' . $id_usuario . '');
        else
            $usuarioQuery = $this->db->query('SELECT usuario FROM profesor WHERE profesor_id = ' . $id_usuario . '');
        $usuarioVector = $usuarioQuery->result_array();
        return $usuarioVector[0];
    }

    function obtenerDocumentos($buscarNombre, $id_asignacion) {
        $nombreSQL = '';
        if (isset($buscarNombre) && TRIM($buscarNombre) != '')
            $nombreSQL = ' AND nombre_documento LIKE ' . $this->db->escape('%' . TRIM($buscarNombre) . '%');
        $asignaSQL = ' AND 	asignar_id = ' . $id_asignacion . '';
        $detallesQuery = 'SELECT * FROM documentos WHERE 1=1' . $nombreSQL . $asignaSQL;
        $asociadosQuery = $this->db->query($detallesQuery);
        return $asociadosQuery->result_array();
    }

    function existeNomUsuarioAlumno($nomUsuario) {
        //$existe = $this->db->query('SELECT * FROM alumno WHERE usuario = ' . $this->db->escape($nomUsuario).'');
        $existe = $this->db->get_where("alumno", array("usuario" => $nomUsuario));
        $cc=$existe->num_rows();
        if ($cc > 0)
            return true;
        else {
            $existe = $this->db->query('SELECT * FROM profesor WHERE usuario = ' . $this->db->escape($nomUsuario) . '');
            return $existe->num_rows() > 0;
        }
    }

    function tieneImagen($id, $tipo) {
        if ($tipo == 'alumno')
            $existe = $this->db->query("SELECT * FROM alumno WHERE alumno_id = " . $id . " && estadoImagen = 'si' ");
        else if ($tipo == 'profesor')
            $existe = $existe = $this->db->query("SELECT * FROM profesor WHERE profesor_id = " . $id . " && estadoImagen = 'si' ");
        else if ($tipo == 'colegio')
            $existe = $existe = $this->db->query("SELECT * FROM colegio WHERE colegio_id = " . $id . " && estadoImagen = 'si' ");
        else
            $existe = $existe = $this->db->query("SELECT * FROM administrador WHERE admin_id = " . $id . " && estadoImagen = 'si' ");
        if ($existe->num_rows() > 0)
            return true;
    }

}

?>