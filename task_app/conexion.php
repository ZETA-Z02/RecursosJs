<?php 

$host = 'localhost';
$user = 'jersson';
$pass = 'jersson';
$dbas = 'task';

$conexion = mysqli_connect($host,$user,$pass,$dbas);

// if(!$conexion){

//     echo 'error'. mysqli_error() .'error en la conexion';
// }else{
//     echo 'conexion exitosa';
// }
    return $conexion;


?>