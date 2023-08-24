<?php

// Conectarse a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'inscripcion');

// Verificar la conexión
if ($mysqli->connect_error) {
    die('Error de conexión (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}

if (isset($_POST['id']) && isset($_POST['estado']) && isset($_POST['notas'])) {
    $id = $_POST['id'];
    $estado = $_POST['estado'];
    $notas = $_POST['notas'];
    $query = "UPDATE datos_inscripcion SET estado='$estado', notas='$notas' WHERE id=$id";
    $mysqli->query($query);
}

// Redirigir de vuelta a la página anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;

// Cerrar la conexión
$mysqli->close();
?>
