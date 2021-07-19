<?php

    require_once 'conexion.php';
    
    $stmt = $mysqli->prepare("UPDATE `prestamo` SET `estado_id` = ? WHERE `prestamo`.`id` = ?");
    $stmt->bind_param('ii', $estado ,$i);
    $i = $_POST['id'];  
    $estado = $_POST['estado']; 
    $stmt->execute();
    $stmt->close();
    $mysqli->close();   
?>