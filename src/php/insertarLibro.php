<?php

    require_once 'conexion.php';
    
    $stmt = $mysqli->prepare("INSERT INTO `libro` (`id`, `nombreLibro`, `editorial_id`, `edicion_id`, `autor_id`, `cantidad_id`, `fCreacion`, `fActualizacion`) VALUES (NULL, ?, ?, ?, ?, ?, NULL, NULL) ");
    $stmt->bind_param('siiii', $nombre , $editorial, $edicion ,$autor ,$cantidad);
    $nombre = $_POST['nombre']; 
    $editorial = $_POST['editorial']; 
    $edicion = $_POST['edicion']; 
    $autor = $_POST['autor']; 
    $cantidad = $_POST['cantidad']; 
    $stmt->execute();
    $stmt->close();
    $mysqli->close();   
?>