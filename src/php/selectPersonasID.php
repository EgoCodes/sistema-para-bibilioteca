<?php

    require_once 'conexion.php';
    
    $stmt = $mysqli->prepare("SELECT p.id, p.cedula, p.nombre, p.telefono, p.direccion, p.barrios_id FROM persona p where id = ?");
    $stmt->bind_param('i', $id);
    $id = $_POST['id']; 
    $stmt->execute();
    $stmt->bind_result($id, $cedula, $nombre, $telefono, $direccion, $barrio);
    $pdt = array();
    while ($stmt->fetch()) {
        $pdt['id']=$id;
        $pdt['cedula']=$cedula;
        $pdt['nombre']=$nombre;
        $pdt['telefono']=$telefono;
        $pdt['direccion']=$direccion;
        $pdt['barrio']=$barrio;
    }
    echo json_encode($pdt);
    $stmt->close();
    $mysqli->close();
                        
?>