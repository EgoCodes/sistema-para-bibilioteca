<?php

require_once 'conexion.php';

$stmt = $mysqli->prepare("SELECT A.id, A.numeroCantidad FROM cantidad A");
$stmt->execute();
$stmt->bind_result($id, $autor);
$librosData = array();
$j = 0;
while ($stmt->fetch()) {
    $librosData[$j]['id']=$id;
    $librosData[$j]['cantidad']=$autor;
    $j++;
}
echo json_encode($librosData);
$stmt->close();
$mysqli->close();

?>