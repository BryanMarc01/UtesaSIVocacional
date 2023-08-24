<?php
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verificar si se ingresaron todos los campos
    if (!empty($_POST['usuario']) && !empty($_POST['password']) && !empty($_POST['password2']) && !empty($_POST['correo'])) {

        // Verificar si las contraseñas coinciden
        if ($_POST['password'] == $_POST['password2']) {

            // Conectarse a la base de datos
            $conexion = mysqli_connect("localhost", "root", "", "inscripcion");

            // Verificar si se pudo conectar a la base de datos
            if (!$conexion) {
                die("Error de conexión: " . mysqli_connect_error());
            }

            // Verificar si el usuario ya está registrado
            $consulta = "SELECT * FROM usuarios WHERE usuario='" . $_POST['usuario'] . "'";
            $resultado = mysqli_query($conexion, $consulta);

            if (mysqli_num_rows($resultado) > 0) {
                // El usuario ya está registrado
                header("Location: ManUsuario.php?error=usuario_existente");
                exit();
            } else {
                // Insertar el nuevo usuario en la base de datos
                $insertar = "INSERT INTO usuarios (usuario, password, correo, rol) VALUES ('" . $_POST['usuario'] . "', '" . $_POST['password'] . "', '" . $_POST['correo'] . "', 'admin')";
                $resultado = mysqli_query($conexion, $insertar);

                if ($resultado) {
                    // Registro exitoso
                    header("Location: crud_usuario.php?registro=exitoso");
                    exit();
                } else {
                    // Error al insertar el nuevo usuario
                    header("Location: ManUsuario.php?error=formulario_invalido");
                    exit();
                }
            }

            // Cerrar la conexión a la base de datos
            mysqli_close($conexion);

        } else {
            // Las contraseñas no coinciden
            header("Location: ManUsuario.php?error=formulario_invalido");
            exit();
        }

    } else {
        // Faltan campos por llenar
        header("Location: ManUsuario.php?error=campos_vacios");
        exit();
    }

}
?>
