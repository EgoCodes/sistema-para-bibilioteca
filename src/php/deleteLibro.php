<?php

    require_once 'conexion.php';
    
    $stmt = $mysqli->prepare("DELETE FROM `libro` WHERE `libro`.`id` =  ?");
    $stmt->bind_param('i', $i);
    $i = $_POST['id']; 
    $stmt->execute();
    $stmt->close();
    $mysqli->close();   
?>