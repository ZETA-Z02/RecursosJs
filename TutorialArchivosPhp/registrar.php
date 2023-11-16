<?php  
include 'conexion.php';
include 'subir_imagen.php';

$producto = $_REQUEST['producto'];

$conf = new Configuracion();
$conf->conectarBD();

$insertar = "INSERT INTO productos (producto) VALUES ('$producto')";
$conf->actualizacion($insertar);

$consulta = "SELECT MAX(id_producto) AS id_producto FROM productos";
$res = $conf->consulta($consulta);
$id_producto = $res[0]["id_producto"];

insertaImagen($id_producto,"url_imagen",$conf);

$conf->desconectarDB();

header("Location: index.php");



?>