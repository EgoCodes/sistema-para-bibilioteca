<?php

    require_once 'conexion.php';
    
    $stmt = $mysqli->prepare("SELECT p.id, p.cedula, p.nombre, p.telefono, p.direccion, b.nombreBarrio FROM persona p
    INNER JOIN barrios b on b.id = p.barrios_id");
    $stmt->execute();
    $stmt->bind_result($id, $cedula, $nombre, $telefono, $direccion, $barrio);
    $pdt = array();
    $j = 0;
    while ($stmt->fetch()) {
        $pdt[$j]['id']=$id;
        $pdt[$j]['cedula']=$cedula;
        $pdt[$j]['nombre']=$nombre;
        $pdt[$j]['telefono']=$telefono;
        $pdt[$j]['direccion']=$direccion;
        $pdt[$j]['barrio']=$barrio;
        $j++;
    }
    echo json_encode($pdt);
    $stmt->close();
    $mysqli->close();
                        
?>