<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/Captura.png">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/estilos.css">
      
</head>

<body>

    <div class="contenedor-formulario contenedor">
        <div class="imagen-formulario">
            
        </div>

        <form class="formulario" action="procesar_login.php" method="post">
            <div class="texto-formulario">
                <h2>Bienvenido de nuevo</h2>
                <p>Inicia sesión con tu cuenta</p>
            </div>
            <div class="input">
                <label for="usuario">Usuario</label>
                <input placeholder="Ingresa tu usuario" type="text" name="usuario">
            </div>
            <div class="input">
                <label for="password">Contraseña</label>
                <input placeholder="Ingresa tu contraseña" type="password" name="password">
            </div>
            <div class="password-olvidada">
                <a href="https://servicios2.utesa.edu/support/solutions/articles/63000241911--c%C3%B3mo-recupero-mi-clave-de-la-p%C3%A1gina-de-utesa-#:~:text=Si%20olvidaste%20tu%20contrase%C3%B1a%20de,web%2C%20llenando%20los%20datos%20solicitados.&text=Nota%3A,momento%20de%20llenar%20el%20ticket.">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="input">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
   
</body>

</html>