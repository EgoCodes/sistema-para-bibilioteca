<?php

    require_once 'conexion.php';
    
    $stmt = $mysqli->prepare("SELECT p.id, per.cedula, per.nombre, l.nombreLibro, p.cantidad_id, e.estadoPrestamo, p.fechaFin FROM prestamo p 
    INNER JOIN libro l on l.id = p.libro_id
    INNER JOIN persona per on per.id = p.persona_id
    INNER JOIN estado e on e.id = p.estado_id");
    $stmt->execute();
    $stmt->bind_result($id, $cedula, $nombre, $libro, $cant, $estado, $fin);
    $pdt = array();
    $j = 0;
    while ($stmt->fetch()) {
        $pdt[$j]['id']=$id;
        $pdt[$j]['cedula']=$cedula;
        $pdt[$j]['nombre']=$nombre;
        $pdt[$j]['libro']=$libro;
        $pdt[$j]['cant']=$cant;
        $pdt[$j]['estado']=$estado;
        $pdt[$j]['fin']=$fin;
        $j++;
    }
    echo json_encode($pdt);
    $stmt->close();
    $mysqli->close();
                        
?>