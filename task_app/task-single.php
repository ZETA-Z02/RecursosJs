<?php 

require "conexion.php";

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = $conexion->query($query);

    if(!$result){
        die('query failed');
    }

    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'name' => $row['name'],
            'descripcion' => $row['descripcion'],
            'id' => $row['id']
        );
    }
    $jsonstring = json_encode($json[0]);

    echo $jsonstring;
}




?>