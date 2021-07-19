<?php

    require_once 'conexion.php';
    
    $stmt = $mysqli->prepare("SELECT l.id, l.nombreLibro, a.nombreAutor, ed.nombreEditorial, edi.numeroEdicion, l.cantidad_id FROM libro l
    INNER JOIN autor a on a.id = l.autor_id
    INNER JOIN editorial ed on ed.id = l.editorial_id
    INNER JOIN edicion edi on edi.id = l.edicion_id");
    $stmt->execute();
    $stmt->bind_result($id, $nombre, $autor, $editorial, $edicion, $cantidad);
    $pdt = array();
    $j = 0;
    while ($stmt->fetch()) {
        $pdt[$j]['id']=$id;
        $pdt[$j]['nombre']=$nombre;
        $pdt[$j]['editorial']=$editorial;
        $pdt[$j]['autor']=$autor;
        $pdt[$j]['edicion']=$edicion;
        $pdt[$j]['cantidad']=$cantidad;
        $j++;
    }
    echo json_encode($pdt);
    $stmt->close();
    $mysqli->close();
?>