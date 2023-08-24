<?php
  // Conexión a la base de datos
  include "conexion.php";

  // Obtener el id del usuario a eliminar
  $id = $_GET["id"];

  // Eliminar el usuario de la tabla usuarios
  
  $objeto = new Conexion();
  $conexion = $objeto->Conectar();

  $query = "DELETE FROM usuarios WHERE id = '$id'";
  $resultado = $conexion->prepare($query);
  $resultado->execute();

  // Redirigir a la lista de usuarios
  header("Location: crud_usuario.php");

  // Cerrar la conexión a la base de datos
  //mysqli_close($conexion);
?>