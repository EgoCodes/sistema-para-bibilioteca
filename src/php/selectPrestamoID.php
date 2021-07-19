<?php

    require_once 'conexion.php';
    
    $stmt = $mysqli->prepare("SELECT estado_id FROM prestamo WHERE id = ?");
    $stmt->bind_param('i', $id);
    $id = $_POST['id']; 
    $stmt->execute();
    $stmt->bind_result($std);
    $pdt = array();
    while ($stmt->fetch()) {
        $pdt['std']=$std;
    }
    echo json_encode($pdt);
    $stmt->close();
    $mysqli->close();
                        
?>