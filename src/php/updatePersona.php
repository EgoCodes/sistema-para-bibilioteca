<?php

    require_once 'conexion.php';
    
    $stmt = $mysqli->prepare("UPDATE `persona` SET `cedula` = ?, `nombre` = ?, `direccion` = ?, `telefono` = ?, `barrios_id` = ? WHERE `persona`.`id` = ? ");
    $stmt->bind_param('ssssii', $cedula ,$nombre ,$direccion ,$telefono ,$barrio ,$i);
    $i = $_POST['id']; 
    $cedula = $_POST['cedula']; 
    $nombre = $_POST['nombre']; 
    $direccion = $_POST['direccion']; 
    $telefono = $_POST['telefono']; 
    $barrio = $_POST['barrio']; 
    $stmt->execute();
    $stmt->close();
    $mysqli->close();   
?>