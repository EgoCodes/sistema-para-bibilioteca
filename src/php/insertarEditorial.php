<?php

    require_once 'conexion.php';
    
    $stmt = $mysqli->prepare("INSERT INTO `editorial` (`id`, `nombreEditorial`, `fCreacion`, `fActualizacion`) VALUES (NULL, ?, NULL, NULL)");
    $stmt->bind_param('s', $nombre);
    $nombre = $_POST['nombre']; 
    $stmt->execute();
    $stmt->close();
    $mysqli->close();   

?>