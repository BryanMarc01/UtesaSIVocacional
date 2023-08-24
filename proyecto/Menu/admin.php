
<style>
		/* Estilos CSS para la tabla */
     /* Estilos CSS para la tabla */
table {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 30px;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #009688; /* verde */
  color: #fff; /* blanco */
}

tr:hover {
  background-color: #ffcc00; /* naranja */
}

a {
  color: #007bff;
  text-decoration: none;
}

a:hover {
  color: #0056b3;
  text-decoration: underline;
}

.btn-approve {
  display: inline-block;
  padding: 6px 12px;
  background-color: #009688;; /* verde */
  color: #fff;
  font-size: 14px;
  font-weight: bold;
  border: 2px solid #009688; /* verde */
  border-radius: 4px;
  text-decoration: none;
}

.btn-approve span {
  display: inline-block;
  margin-right: 8px;
}

.btn-approve i {
  display: inline-block;
  font-size: 12px;
  margin-left: 8px;
}


/* Estilos CSS para el encabezado */
h1 {
  font-size: 28px;
  margin-top: 0;
  color: #009933; /* verde */
}

/* Estilos CSS para el contenedor principal */
.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);
  color: #333; /* negro */
}

/* Estilos CSS para el botón "Ver archivos" */
.tablink {
  display: inline-block;
  padding: 6px 12px;
  background-color: #009688; /* verde */
  color: #fff;
  font-size: 14px;
  font-weight: bold;
  border: 2px solid #009688; /* verde */
  border-radius: 4px;
  text-decoration: none;
}

.tablink:hover {
  background-color: #ffcc00; /* naranja */
  border-color: #ffcc00; /* naranja */
  color: #333; /* negro */
}


.tab {
  overflow: hidden;
  border-bottom: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Enlace del menú de subpestañas */
.tab a {
  float: left;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  border-bottom: none;
}

/* Cambio de color del enlace del menú de subpestañas en el mouse */
.tab a:hover {
  background-color: #ddd;
}

/* Enlace activo del menú de subpestañas */
.tab a.active {
  background-color: #ccc;
  color: white;
  border-bottom: 1px solid #ccc;
}
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

.tab:not(a.active):hover {
  background-color: white;
  color: green;
  border-bottom-color: white;
}
.btn-reject {
    display: inline-block;
    padding: 6px 12px;
    background-color: #dc3545; /* rojo */
    color: #fff;
    font-size: 14px;
    font-weight: bold;
    border: 2px solid #dc3545; /* rojo */
    border-radius: 4px;
    text-decoration: none;
  }

  .btn-reject span {
    display: inline-block;
    margin-right: 8px;
  }

  .btn-reject i {
    display: inline-block;
    font-size: 12px;
    margin-left: 8px;
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

  #print-btn {
  position: fixed;
  bottom: 15px;
  right: 150px;
  margin: 0 auto;
  background-color: #009688;
  color: white;
  padding: 10px;
  border-radius: 5px;
  border: none;
}

	</style>

    <!-- Agregar los scripts JavaScript -->

	<script>
	function openTab(evt, tabName) {
		  // Obtener todas las subpestañas y ocultarlas
		  var i, tabcontent, tablinks;
		  tabcontent = document.getElementsByClassName("tabcontent");
		  for (i = 0; i < tabcontent.length; i++) {
		    tabcontent[i].style.display = "none";
		  }

		  // Obtener todos los botones de la pestaña y desactivarlos
		  tablinks = document.getElementsByClassName("tablink");
		  for (i = 0; i < tablinks.length; i++) {
		    tablinks[i].className = tablinks[i].className.replace(" active", "");
		  }

      	  // Mostrar la subpestaña correspondiente y activar su botón
		  document.getElementById(tabName).style.display = "block";
		  evt.currentTarget.className += " active";
		}
       

function rechazarInscripcion(id) {
      if (confirm("¿Está seguro de que desea rechazar esta inscripción?")) {
        // Actualizar el estado de la inscripción a "rechazada" en la base de datos
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            // Recargar la página después de actualizar la base de datos
            location.reload();
          }
        };
        xhttp.open("POST", "rechazar.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + id);
      }
    }
   
    

	</script>



<?php include('encabezado.php');?>

        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
<div class="container">
<br>
  <a href="admin.php" onclick="location.reload()"><h2 >Validacion de Inscripcion</h2></a>
 
    <br>
<form method="GET" action="" class="input-group">
    <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Buscar">
    <div class="input-group-append">
        <button type="submit" class="btn btn-info">Buscar</button>
    </div>
</form>

<?php

// Conectarse a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'inscripcion');

// Verificar la conexión
if ($mysqli->connect_error) {
    die('Error de conexión (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}

// Si el administrador ha aprobado o rechazado una inscripción, actualiza la base de datos
if (isset($_POST['id']) && isset($_POST['estado'])) {
  $id = $_POST['id'];
  $estado = $_POST['estado'];
  $notas = $_POST['notas']; // nueva variable para almacenar las notas ingresadas por el administrador
  $query = "UPDATE datos_inscripcion SET estado='$estado', notas='$notas' WHERE id=$id";
  $mysqli->query($query);
}

if (isset($_POST['notas']) && isset($_POST['id'])) {
  // Obtener los valores del formulario
  $notas = $_POST['notas'];
  $id = $_POST['id'];

  // Actualizar la base de datos con las nuevas notas
  $que= "UPDATE datos_inscripcion SET notas = '$notas' WHERE id = '$id'";
  $mysqli->query($que);
}

if(isset($_GET['buscar'])){
  $query = "SELECT * FROM datos_inscripcion WHERE nombre LIKE '%" . $_GET['buscar'] . "%'";
} else {
  $query = "SELECT * FROM datos_inscripcion" ;;
}
// Consultar las inscripciones y sus archivos adjuntos
//$query = "SELECT * FROM datos_inscripcion" ;
$result = $mysqli->query($query);


// Mostrar las inscripciones y sus archivos adjuntos en una tabla
echo '<table>';
echo '<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Estado</th><th>Notas</th></tr>';

while ($row = $result->fetch_assoc()) {
    
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['nombre'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['estado'] . '</td>';
    
    echo '<td>' . $row['notas'] .'<form method="POST"><input type="text" name="notas" id="notas"><input type="hidden" name="id" value="' . $row['id'] . '"><button class="btn-approve" type="submit">Guardar nota</button></form>'; '</td>'; 
    
   

      
        
    echo '</tr>';


         
    
   
    
         // Mostrar el botón de aprobación si la inscripción no ha sido aprobada
         if ($row['estado'] == 'pendiente') {
          echo '<td><a class="btn-approve" href="aprobar.php?id=' . $row['id'] . '"><span>Aprobar</span> </a></td>';
          
          
      } else {
          echo '<td></td>';
      }
        if ($row['estado'] == 'pendiente' ) {
          echo '<td><a class="btn-reject" href="rechazar.php?id=' . $row['id'] . '"><span>Rechazar</span> </a></td>';
      
        } else {
          echo '<td></td>';
        }
        
       
     // Agregar el botón "Ver archivos" y el div oculto para cada fila
    
     echo '<td><button class="tablink" onclick="openTab(event, \'tab-' . $row['id'] . '\')">Ver archivos</button></td>';
     echo '</tr>'; // <--- aquí
     echo '<tr class="tabcontent" id="tab-' . $row['id'] . '" style="display: none">'; 
echo '<td colspan="11">';
echo '<div class="container-fluid">';
echo '<div class="row">';
echo '<div class="col-md-12">';
echo '<ul>';
echo '<li><a href="../archivos/fotos/' . $row['foto'] . '">Foto</a></li>';
echo '<li><a href="../archivos/actas_nacimiento/' . $row['acta_nacimiento'] . '">Acta de nacimiento</a></li>';
echo '<li><a href="../archivos/certificaciones_bachiller/' . $row['certificacion_bachiller'] . '">Certificación de bachiller</a></li>';
echo '<li><a href="../archivos/records_calificaciones/' . $row['record_calificaciones'] . '">Records de calificaciones</a></li>';
echo '<li><a href="../archivos/certificados_salud/' . $row['certificado_salud'] . '">Certificado de salud</a></li>';
echo '<li><a href="../archivos/cedulas_identidad/' . $row['cedula_identidad'] . '">Cédula de identidad</a></li>';
echo '<li><a href="../archivos/formulario/' . $row['formulario'] . '">Formulario</a></li>';
echo '</ul>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</td>';
echo '</tr>';




}


// Cerrar la conexión
$mysqli->close();
?>
</div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <button id="print-btn" onclick="window.print()" >Imprimir</button>
        <?php include('pie.php');?>