<?php

require_once'conexion.php';

$stmt = $mysqli->prepare("SELECT A.id, A.nombreBarrio FROM barrios A order by nombreBarrio");
$stmt->execute();
$stmt->bind_result($id, $autor);
$librosData = array();
$j = 0;
while ($stmt->fetch()) {
    $librosData[$j]['id']=$id;
    $librosData[$j]['barrio']=$autor;
    $j++;
}
$barrios = array('Barrios' => $librosData);
echo json_encode($barrios);
$stmt->close();
$mysqli->close();

?>