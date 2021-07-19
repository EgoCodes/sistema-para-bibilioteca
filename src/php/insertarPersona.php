<?php

    require_once 'conexion.php';
    
    $stmt = $mysqli->prepare("INSERT INTO `persona` (`id`, `cedula`, `nombre`, `direccion`, `telefono`, `barrios_id`, `fCreacion`, `fActualizacion`) VALUES (NULL, ?, ?, ?, ?, ?, NULL, NULL) ");
    $stmt->bind_param('ssssi', $cedula, $nombre , $direccion, $telefono ,$barrio);
    $cedula = $_POST['cedula']; 
    $nombre = $_POST['nombre']; 
    $direccion = $_POST['direccion']; 
    $telefono = $_POST['telefono']; 
    $barrio = $_POST['barrio']; 
    $stmt->execute();
    $stmt->close();
    $mysqli->close();   
?>