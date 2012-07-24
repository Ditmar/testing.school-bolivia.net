<?php

$fili=fopen("../database.txt","r");
$read=fread($fili,  filesize("../database.txt"));
echo $read;