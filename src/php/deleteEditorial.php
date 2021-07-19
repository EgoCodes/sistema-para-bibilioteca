<?php

    require_once 'conexion.php';
    
    $stmt = $mysqli->prepare("DELETE FROM `editorial` WHERE `editorial`.`id` =  ?");
    $stmt->bind_param('i', $i);
    $i = $_POST['id']; 
    $stmt->execute();
    $stmt->close();
    $mysqli->close();   
?>