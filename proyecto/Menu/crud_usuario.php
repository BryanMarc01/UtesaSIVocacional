<style>
    button.nuevo {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      color: #fff;
      font-weight: bold;
      background-color: #009688;
    }
    
    button.editar {
      background-color: yellow;
    }
    
    button.borrar {
      background-color: red;
    }
    h2 {
      font-size: 28px;
  font-weight: bold;
  color: #333333;
  margin-top: 20px;
  margin-bottom: 20px;
  text-transform: uppercase;
  letter-spacing: 1px;
  text-align: center;
  text-shadow: 2px 2px #e6e6e6;
}
.buscar {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  margin-bottom: 10px;
}

.buscar input {
  width: 200px;
  margin-right: 10px;
}

.buscar button {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  color: #fff;
  font-weight: bold;
  background-color: #009688;
}

  </style>
<?php include('encabezado.php');?>

<!--INICIO del cont principal-->
<div class="container">
  <br>
  <a href="crud_usuario.php" onclick="location.reload()"><h2 >Mantenimiento de Usuario</h2></a>
 
    <br>
 <?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

if(isset($_GET['buscar'])){
  $consulta = "SELECT id, usuario, correo, password, rol FROM usuarios WHERE usuario LIKE '%" . $_GET['buscar'] . "%'";
} else {
  $consulta = "SELECT id, usuario, correo, password, rol FROM usuarios";
}

$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

</div>
<div class="container">
<form method="GET" action="" class="input-group">
    <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Buscar">
    <div class="input-group-append">
        <button type="submit" class="btn btn-info">Buscar</button>
    </div>
</form>

        <div class="row">
            <div class="col-lg-12">            
            <button onclick="window.location.href = 'ManUsuario.php';"  id="btnNuevo" type="button" class="nuevo" data-toggle="modal">Nuevo Usuario</button>    
            </div>  
              
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <?php
                // Mostrar la lista de usuarios en una tabla
echo "<table style='border-collapse: collapse; width: 100%;'>";
echo "<tr style='background-color: #009688; color: white;'>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>ID</th>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>Usuario</th>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>Correo</th>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>Password</th>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>Rol</th>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>Acciones</th>";
echo "</tr>";
foreach ($data as $fila) {
   
    echo "<tr style='background-color: #FFCC00;'>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $fila["id"] . "</td>";
    echo "<td style='border:1px solid #ddd; padding: 8px;'>" . $fila["usuario"] . "</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $fila["correo"] . "</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $fila["password"] . "</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $fila["rol"] . "</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>";
    echo "<a href='editar_usuario.php?id=" . $fila["id"] . "' style='text-decoration: none; color: blue;'>Editar</a> | ";
    echo "<a href='eliminar_usuario.php?id=" . $fila["id"] . "' style='text-decoration: none; color: red;' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este usuario?\")'>Eliminar</a>";
    echo "</td>";
    echo "</tr>";
    }
    echo "</table>";
    
    // Cerrar la conexión a la base de datos
   // $objeto->CerrarConexion();
    ?>            
    <br>       
                    </div>
                </div>
        </div>  
    </div>         
    
    
</div>
<!--FIN del cont principal-->
<?php include('pie.php');?>