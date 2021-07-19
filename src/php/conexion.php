<?php
    // $mysqli = new mysqli('localhost', 'root', '', 'clicreservas');
    // if ($mysqli->connect_errno) {
    //     echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    // }
    $mysqli = mysqli_connect('localhost', 'root', '', 'biblioteca_pcn');
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    return $mysqli;
    
?>
