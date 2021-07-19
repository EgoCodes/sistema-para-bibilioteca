<?php

    require_once 'conexion.php';
    
    $stmt = $mysqli->prepare("UPDATE `editorial` SET `nombreEditorial` = ? WHERE `editorial`.`id` = ?");
    $stmt->bind_param('si', $nombre ,$i);
    $i = $_POST['id']; 
    $nombre = $_POST['nombre']; 
    $stmt->execute();
    $stmt->close();
    $mysqli->close();   
?>