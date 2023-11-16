<?php 

require "conexion.php";

$query = "SELECT * FROM task;";
$result = $conexion->query($query);

if(!$result){
    die('query Failed'. mysqli_error($conexion));
}

$json = array();
while($row = mysqli_fetch_array($result)){
    $json[] = array(
        'name'=>$row['name'],
        'descripcion'=>$row['descripcion'],   
        'id'=>$row['id']
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;
 





?>