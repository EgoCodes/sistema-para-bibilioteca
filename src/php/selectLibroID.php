<?php

require_once 'conexion.php';

$stmt = $mysqli->prepare("SELECT id, nombreLibro, editorial_id, edicion_id, autor_id, cantidad_id FROM libro where id = ?");
$stmt->bind_param('i', $id);
$id = $_POST['id']; 
$stmt->execute();
$stmt->bind_result($id, $nombre, $editorial, $edicion, $autor, $cantidad);
$librosData = array();
while ($stmt->fetch()) {
    $librosData['id']=$id;
    $librosData['nombre']=$nombre;
    $librosData['editorial']=$editorial;
    $librosData['edicion']=$edicion;
    $librosData['autor']=$autor;
    $librosData['cantidad']=$cantidad;
}
echo json_encode($librosData);
$stmt->close();
$mysqli->close();

?>