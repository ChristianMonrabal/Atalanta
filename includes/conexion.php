<?php
$mysqli=new mysqli('localhost','root','','Atalanta');

if($mysqli->connect_errno){
    printf("error en la conexión:%s\n",$mysqli->connect_error);
    exit();
}