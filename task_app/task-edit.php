<?php 

require "conexion.php";
$id = $_POST['id'];
$name = $_POST['name'];
$descripcion = $_POST['descripcion'];

$query = "UPDATE task SET name ='$name', descripcion = '$descripcion' WHERE id = $id;";

$result = $conexion->query($query);

if(!$result){
    die('Query failed');
}
echo "Update Task Succesfully";
?>