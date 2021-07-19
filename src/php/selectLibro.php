<?php

require_once 'conexion.php';

$stmt = $mysqli->prepare("SELECT id, nombreLibro FROM libro where cantidad_id != 0 order by nombreLibro");
$stmt->execute();
$stmt->bind_result($id, $nombre);
$librosData = array();
$j = 0;
while ($stmt->fetch()) {
    $librosData[$j]['id']=$id;
    $librosData[$j]['nombre']=$nombre;
    $j++;
}
echo json_encode($librosData);
$stmt->close();
$mysqli->close();

?>
