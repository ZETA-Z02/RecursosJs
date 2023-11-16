<?php 

require "conexion.php";





if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = "DELETE FROM task WHERE id = $id;";
    $result = $conexion->query($query);

    if(!$result){
        die('query failed');
    }
    echo 'task deleted successfully'; 
    
}




?>