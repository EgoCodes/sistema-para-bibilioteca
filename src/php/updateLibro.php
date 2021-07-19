<?php

    require_once 'conexion.php';
    
    $stmt = $mysqli->prepare("UPDATE `libro` SET `nombreLibro` = ?, `editorial_id` = ?, `edicion_id` = ?, `autor_id` = ?, `cantidad_id` = ? WHERE `libro`.`id` = ?");
    $stmt->bind_param('siiiii', $nombre , $editorial, $edicion ,$autor ,$cantidad ,$i);
    $i = $_POST['id']; 
    $nombre = $_POST['nombre']; 
    $editorial = $_POST['editorial']; 
    $edicion = $_POST['edicion']; 
    $autor = $_POST['autor']; 
    $cantidad = $_POST['cantidad']; 
    $stmt->execute();
    $stmt->close();
    $mysqli->close();   
?>