<?php 

require "conexion.php";

if(isset($_POST['name']) && isset($_POST['descripcion'])){
    $name = $_POST['name'];
    $descripcion = $_POST['descripcion'];
    $query = "INSERT INTO task VALUES(null, '$name','$descripcion');";

    $result = $conexion->query($query);
    if(!$result){
        die('Query Failed.');
    }
    echo 'Task Added Succesfully';
}




?>