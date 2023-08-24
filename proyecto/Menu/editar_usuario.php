<?php
// Verificar si se recibió el ID del usuario a editar
if(isset($_GET['id'])) {
    // Conectar a la base de datos
    include_once 'conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    // Obtener los datos del usuario a editar
    $id = $_GET['id'];
    $consulta = "SELECT id, usuario, correo, password, rol FROM usuarios WHERE id = :id";
    $resultado = $conexion->prepare($consulta);
    $resultado->bindParam(':id', $id);
    $resultado->execute();
    $fila = $resultado->fetch(PDO::FETCH_ASSOC);

    // Si el usuario no existe, redirigir a la página principal
    if(!$fila) {
        header('Location: crud_usuario.php');
        exit;
    }

    // Si se recibió el formulario de edición, actualizar los datos en la base de datos
    if(isset($_POST['editar_usuario'])) {
        $usuario = $_POST['usuario'];
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        $rol = $_POST['rol'];

        $consulta = "UPDATE usuarios SET usuario = :usuario, correo = :correo, password = :password, rol = :rol WHERE id = :id";
        $resultado = $conexion->prepare($consulta);
        $resultado->bindParam(':usuario', $usuario);
        $resultado->bindParam(':correo', $correo);
        $resultado->bindParam(':password', $password);
        $resultado->bindParam(':rol', $rol);
        $resultado->bindParam(':id', $id);
        $resultado->execute();

        // Redirigir a la página principal después de actualizar los datos
        header('Location: crud_usuario.php');
        exit;
    }
}
else {
    // Si no se recibió el ID del usuario a editar, redirigir a la página principal
    header('Location: crud_usuario.php');
    exit;
}
?>

<?php include('encabezado.php');?>
    
<!--INICIO del cont principal-->
<div class="container">

    <br>
    <h2>Editar Usuario</h2>
    <br>
    <form  method="post">
        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $fila['usuario']; ?>" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $fila['correo']; ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo $fila['password']; ?>" required>
        </div>
        <div class="form-group">
            <label for="rol">Rol:</label>
            <select class="form-control" id="rol" name="rol" required>
                <option value="admin" <?php if($fila['rol'] == 'admin') { echo 'selected'; } ?>>admin</option>
                <option value="usuario" <?php if($fila['rol'] == 'usuario') { echo 'selected'; } ?>>Usuario</option>
            </select>
</div>
<button type="submit" class="btn btn-info" name="editar_usuario">Actualizar</button>
</form>
<br>
</div>
<!--FIN del cont principal-->
<?php include('pie.php'); ?>
