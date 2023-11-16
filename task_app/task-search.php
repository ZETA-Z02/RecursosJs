<?php 

require "conexion.php";


$search = $_POST['search'];

if(!empty($search)){
    $query = "SELECT * FROM task WHERE name LIKE '$search%';";
    $result = $conexion->query($query);

    if(!$result){
        die('Query Error'. mysqli_error($conexion));
    }

    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'name'=>$row['name'],
            'description'=>$row['descripcion'],
            'id'=>$row['id']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;       
}




?>