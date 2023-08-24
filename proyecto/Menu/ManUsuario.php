<?php include('encabezado.php');?>


        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                 <!-- Content -->
        <div class="content mt-4">
            <div class="card col-md-8 offset-md-2">
                <div class="card-header" style="color: #006600;">Registro de Usuario</div>
                <div class="card-body">
                <form action="procesar_usuario.php" method="post">
                    <h2 class="sr-only" style="color: #006600;">Registro de Usuario</h2>
                     <div class="illustration"><i class="icon ion-ios-person"></i></div>
                    <div class="form-group"><label for="usuario" style="color: #006600;" >Usuario</label><input class="form-control" type="text" name="usuario" placeholder="Ingrese su usuario"></div>
                    <div class="form-group"><label for="password" style="color: #006600;">Contraseña</label><input class="form-control" type="password" name="password" placeholder="Ingrese su contraseña"></div>
                    <div class="form-group"><label for="password2" style="color: #006600;">Confirmar contraseña</label><input class="form-control" type="password" name="password2" placeholder="Confirme su contraseña"></div>
                     <div class="form-group"><label for="correo" style="color: #006600;">Correo electrónico</label><input class="form-control" type="email" name="correo" placeholder="Ingrese su correo electrónico"></div>
                     <div class="form-group"><button class="btn btn-info btn-block" type="submit">Registrarse</button></div>
                     </form>
        
                </div>
            </div>
        </div>

    
  
        <!-- /.content -->
  
        <?php
        // Verificar si hay un mensaje de error o de registro exitoso en la URL
        if (isset($_GET['error']) && $_GET['error'] == 'campos_vacios') {
            echo '<div class="alert alert-danger" role="alert">Error: Campo Vacio.</div>';
        if (isset($_GET['error']) && $_GET['error'] == 'formulario_invalido') {
            echo '<div class="alert alert-danger" role="alert">Error: formulario inválido.</div>';
        } elseif (isset($_GET['error']) && $_GET['error'] == 'usuario_existente') {
            echo '<div class="alert alert-danger" role="alert">Error: usuario ya registrado.</div>';
        }
    }
        ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
               





            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->


<?php include('pie.php');?>