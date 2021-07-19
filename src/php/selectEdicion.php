<?php

require_once 'conexion.php';

$stmt = $mysqli->prepare("SELECT `id`, `numeroEdicion`FROM `edicion` order by id");
$stmt->execute();
$stmt->bind_result($id, $autor);
$librosData = array();
$j = 0;
while ($stmt->fetch()) {
    $librosData[$j]['id']=$id;
    $librosData[$j]['edicion']=$autor;
    $j++;
}
echo json_encode($librosData);
$stmt->close();
$mysqli->close();

?>