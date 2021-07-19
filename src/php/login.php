<?php
    session_start();
    require_once 'conexion.php';
    
    $stmt = $mysqli->prepare("SELECT COUNT(*), c.id FROM usuario c WHERE c.correo = ? and c.contrasena = ?");
    $stmt->bind_param('ss', $mail, $pass);
    $mail = $_POST['correo'];
    $pass = $_POST['contrasena'];
    $stmt->execute();
    $stmt->bind_result($i, $id);
    while ($stmt->fetch()) {
        if($i < 1){
            echo 0;
        } else{
            $_SESSION['idU'] = $id;
            echo 1;
        }
    }
    $stmt->close();
    $mysqli->close();
?>