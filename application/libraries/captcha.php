<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    /*
    * this class is created by: mohammad tareq alam
    * email: tareq.mist@gmail.com
    * web:commitmentsoft.com
    * blog: tareqalam.wordpress.com
    */
    class Captcha {

    var $CI = null;

    function Captcha()
    {
    $this->CI =& get_instance();
    $this->CI->load->library('session');
    }

    function captchaImg()
    {

    $RandomStr = md5(microtime());// md5 to generate the random string

    $ResultStr = substr($RandomStr,0,5);//trim 5 digit

    $NewImage =imagecreatefromjpeg(APPPATH."themes/img.jpg");//image create by existing image and as back ground

    $LineColor = imagecolorallocate($NewImage,233,239,239);//line color
    $TextColor = imagecolorallocate($NewImage, 255, 255, 255);//text color-white

    imageline($NewImage,1,1,40,40,$LineColor);//create line 1 on image
    imageline($NewImage,1,100,60,0,$LineColor);//create line 2 on image

    imagestring($NewImage, 5, 20, 10, $ResultStr, $TextColor);// Draw a random string horizontally

    $newdata = array(
    'captchaKey' =>$ResultStr
    );

    $this->CI->session->set_userdata($newdata);

    //$_SESSION['key'] = $ResultStr;// carry the data through session

    header("Content-type: image/jpeg");// out out the image

    imagejpeg($NewImage);//Output image to browser

    }

    function captchaText()
    {

    $RandomStr = md5(microtime());// md5 to generate the random string

    $ResultStr = substr($RandomStr,0,5);//trim 5 digit

    $newdata = array(
    'captchaKey' =>$ResultStr
    );

    $this->CI->session->set_userdata($newdata);

    return $ResultStr;

    }

    function validateCaptcha()
    {

    //$key=substr($_SESSION['key'],0,5);
    $key = $this->CI->session->userdata('captchaKey');
    $number = $_REQUEST['number'];
    if($number!=$key){
    $msg = '<center><font face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
    String not valid! Please try again!</font></center>';
    return $msg;
    }
    else{ return 'success';}
    }

    }