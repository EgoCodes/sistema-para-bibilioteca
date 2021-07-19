<?php

    require_once 'conexion.php';
    
    $stmt = $mysqli->prepare("INSERT INTO `prestamo` (`id`, `cantidad_id`, `persona_id`, `libro_id`, `estado_id`, `fechaFin`, `fCreacion`, `fActualizacion`) VALUES (NULL, 1, ?, ?, 1, (SELECT DATE_ADD(now(), INTERVAL ? DAY)), NULL, NULL)  ");
    $stmt->bind_param('iis', $persona , $libro, $fecha);
    $persona = $_POST['persona']; 
    $libro = $_POST['libro']; 
    $fecha = $_POST['fecha']; 
    $stmt->execute();
    $stmt->close();
    $mysqli->close();   
?>