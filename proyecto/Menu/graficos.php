<?php include('encabezado.php');?>
<style>
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
</style>
<body>
  <div class="content">
    <div class="animated fadeIn">
      <div class="container">
      
  <a href="graficos.php" onclick="location.reload()"><h2 >Graficos</h2></a>
 
    <br>
        <?php
        // Conexión a la base de datos
        $conn = mysqli_connect("localhost", "root", "", "inscripcion");

        // Consulta para contar solicitudes por estado
        $resultado = mysqli_query($conn, "SELECT COUNT(*) AS cantidad, estado FROM datos_inscripcion GROUP BY estado");

        // Arreglo para almacenar los datos del gráfico
        $datos = array();

        // Iterar sobre los resultados de la consulta y agregar cada fila a los datos del gráfico
        while($fila = mysqli_fetch_array($resultado)) {
            $datos[$fila['estado']] = $fila['cantidad'];
        }
        ?>
       
    <div class="row">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Solicitudes por estado </h4>
                    <canvas id="miGrafico"></canvas>

                    
                        <script>
                        var datos = <?php echo json_encode($datos); ?>;
                        var colores = ['#009688', 'red', 'orange'];
                        var etiquetas = ['Aprobadas', 'Rechazadas', 'Pendientes'];

                        // Crear el gráfico de pastel
                        var ctx = document.getElementById('miGrafico').getContext('2d');
                        var miGrafico = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                datasets: [{
                                    data: [datos['aprobado'], datos['rechazado'], datos['pendiente']],
                                    backgroundColor: colores
                                }],
                                labels: etiquetas
                            },
                            options: {}
                        });
                        </script>
                </div>
            </div>  
        </div>
    
        <?php
        // Conexión a la base de datos
        $conn = mysqli_connect("localhost", "root", "", "inscripcion");

        // Consulta para contar solicitudes por ubicación
        $resultado2 = mysqli_query($conn, "SELECT COUNT(*) AS cantidad, 
                                          CASE 
                                            WHEN direccion LIKE '%Santiago%' THEN 'Santiago' 
                                            ELSE 'Otras provincias' 
                                          END AS ubicacion 
                                          FROM datos_inscripcion 
                                          GROUP BY ubicacion");

        // Arreglo para almacenar los datos del gráfico
        $datos2 = array();

        // Iterar sobre los resultados de la consulta y agregar cada fila a los datos del gráfico
        while($fila = mysqli_fetch_array($resultado2)) {
            $datos2[$fila['ubicacion']] = $fila['cantidad'];
        }
        ?>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Solicitudes por ubicación</h4>
                    <canvas id="miGrafico2"></canvas>

                        <script>
                            var datos = <?php echo json_encode($datos2); ?>;
                            var colores = ['#009688', 'red'];
                            var etiquetas = ['Santiago', 'Otras provincias'];

                            // Crear el gráfico de pastel
                            var ctx = document.getElementById('miGrafico2').getContext('2d');
                            var miGrafico2 = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    datasets: [{
                                        data: [datos['Santiago'], datos['Otras provincias']],
                                        backgroundColor: colores
                                    }],
                                    labels: etiquetas
                                },
                                options: {}
                            });
                        </script>
                </div>
            </div>  
        </div>


    

      </div>


    </div>
  </div>
  </div>
<?php include('pie.php');?>
