<?php

include('conexion2.php');
include('colorizado.php');
require('fpdf/fpdf.php');
if (isset($_POST['respuestas_TestVo'])) {
	$idTest = $_GET['id'];

	$queryAux = "SELECT *FROM test where TesCod = '$idTest'  ";
	$resultado=mysqli_query($conn,$queryAux);
    $numPre=0;
    $numAreCod=0;
    while ($row = mysqli_fetch_array($resultado)) {

    	$numPre=$row ['TesNumPre'];		
    	$numAreCod=$row ['TesAreCod'];		
	}

	if(!$resultado) {
       die("Query Failed----.");
     }

    $queryAux2 = "SELECT *FROM carrera where CarAreCod = '$numAreCod'  ";
    $resultado2=mysqli_query($conn,$queryAux2);

    $carrerasCod[0]=0;
    $puntajeCarr[0]=0;
    $totalXCarr[0]=0;
    $j=0;
    while ($row2 = mysqli_fetch_array($resultado2)) {
        $carrerasCod[$j]=$row2['CarCod'];
        $puntajeCarr[$j]=0;
        $totalXCarr[$j]= 0;
        $j++;      
    }




   //$_SESSION['message'] = ' -----';
   //$_SESSION['message_type'] = '-----';





 //----------------------------------------------------------------------------

	$i=1;
	while ($i<=$numPre) {
        
		$prRespu="pregunta".$i."Respuesta";

        $preRpta = $_POST [$prRespu];
        $queryPrRespu="SELECT *FROM respuestas where ResCod = '$preRpta'  ";
        $resultadoPrRpta=mysqli_query($conn,$queryPrRespu);
        $valorResp=0;
        $codPreRp=0;

        while ($rowRp = mysqli_fetch_array($resultadoPrRpta)) {
            $valorResp=$rowRp ['ResValor'];
            $codPreRp=$rowRp ['ResPreCod']; 
        }
        if(!$resultadoPrRpta) {
           die("Query Failed----.");
        }
        
        $carrDePreg=0;
        $queryAux3="SELECT *FROM preguntas where PreCod = '$codPreRp' ";
        $resultado3=mysqli_query($conn,$queryAux3);
        
        while ($row3 = mysqli_fetch_array($resultado3)) {
            $carrDePreg=$row3 ['PreCarCod'];
            
        }
        $k=0;
        while($k<$j){
            if($carrDePreg==$carrerasCod[$k]){
                $totalXCarr[$k]=$totalXCarr[$k]+3;
                $puntajeCarr[$k]=$puntajeCarr[$k]+$valorResp;
            }
            $k++;
        }
      $i++;
	}

   
    
    /*
    $a=0;
    while ($a<$j) {
        
        echo $carrerasCod[$a]." --> ".$puntajeCarr[$a]."<br />";
        $a++;      
    }
    */


    ?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Resultados Test</title>
<style>
  .container {
    background-color: white;
    padding: 20px; /* Ajusta el espaciado interior según tus necesidades */
    border-radius: 5px; /* Opcional: agregar bordes redondeados */
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1); /* Opcional: agregar sombra */
}
  </style>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="grafica/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>

<script src="scriptt.js"></script>
<script src="scriptt2.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
      
      </div>
      <div class="col-4 text-center">
        
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
 
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2 bg-dark">
    <nav class="nav d-flex justify-content-start">
  
      

      
    </nav>
  </div>
<div class="row mb-2">
    <div class="col-md-5">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">Resultados</strong>
          <h3 class="mb-0">Test Vocacional</h3>
          <!--<div class="mb-1 text-muted">Fecha</div> -->
          <br>
          <p class="card-text mb-auto">¡Felicidades! Has finalizado tu test de orientación vocacional. Revisa las estadísticas para saber cuáles son tus puntos fuertes. </p>
          <br>
          <form  method="POST">
          <?php
           $nombresCarr[0]="";
           $porcentajesCarr[0]=0;
           $nomCarreraTotal="";
           $a=0;
           while ($a<$j) {
                $query4="SELECT *FROM carrera where CarCod = '$carrerasCod[$a]'  ";
                $resultado4=mysqli_query($conn,$query4);
                $nomCarrera="";

                while ($rowRp = mysqli_fetch_array($resultado4)) {
                    $nomCarrera=$rowRp ['CarNom'];
                    
                }
                $nombresCarr[$a]=$nomCarrera;

                 $porcentaje=round(($puntajeCarr[$a]/$totalXCarr[$a])*100);
                 $porcentajesCarr[$a]=$porcentaje;

                 $valorResultado= $nomCarrera." --> ".$porcentaje." %";

                 $nomCarreraTotal=$nomCarreraTotal.$valorResultado."#"."\n";
                 ?>



                 <!--<li class="list-group-item list-group-item-info"><?php echo $nomCarrera ?> -- <?php echo $porcentaje ?>  </li> -->

                 <input readonly="readonly" id="Resultado<?php echo$a?>" type="text" class="form-control"  value="<?php echo $valorResultado ?>" >


                <?php
                 //echo $nomCarrera." --> ".$porcentaje." % <br />";
                 $a++;      
           }
           $datosX=json_encode($nombresCarr);
            $datosY=json_encode($porcentajesCarr);
          ?>

          <input id="tab" name="prodId" type="hidden" value="<?php echo $nomCarreraTotal ?>">

<br>
          <form method="POST">
              <input id="paraPDF" name="docPDF" type="hidden" value="<?php echo $nomCarreraTotal ?>">

              <input type="button" class="btn btn-secondary col-md-3 mb-3"- value="Generar" name="submit"   onclick="enviar_datos_PDF();" /> 
              <!--<input type="submit" class="stretched-link" value="Descargar Resultados" name="DOWLO"/> -->


          </form>
          <div id="mostrarPDF" class="col-md-3 mb-3 bg-info text-white">
          </div>




          <a href="documentopdf.php" class="stretched-link">Descargar Resultados </a> 
        </div>
        
      </div>
    </div>
    <div class="col-md-7">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Grafica</strong>

          <canvas id="barChart"></canvas>

          <script type="text/javascript">

            
              //bar
var ctxB = document.getElementById("barChart").getContext('2d');
var myBarChart = new Chart(ctxB, {
type: 'bar',
data: {
labels: <?php echo $datosX ?>,
datasets: [{
label: "porcentaje de aptabilidad",
data: <?php echo $datosY ?>,
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)',
'rgba(255, 159, 64, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
 
}
}
});
$imgData ='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAVQAAACqCAYAAADyfbdoAAAAAXNSR0lArs4c6QAABWpJREFUeF7t1LENAAAlwzD6/9M8kdEc0MFC2TkCBAgQSASWrBghQlAAgRNUT0CAAIFIQFAjSD/QlAAgUhAUCNIMwQIEBBUP0CAAIFIQFAjSDMECBAQVD9AgACBSEBQI0gzBAgQEFQ/'; 

          </script>

        </div>
        
      </div>
    </div>
    <div class="col-md-12">
         <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">Enviar los resultados al correo electronico</strong>

 <!--determinar el tipo de información-->
 <p>Puedes enviarte los resultados a tu correo electrónico para consultarlos más tarde.</p>

<strong>Email: </strong>

<input type="email" class="col-md-5 mb-5" id="direccion" name="correo" placeholder="Introduce un correo valido" required />  

<tr><td><input type="button" class="btn btn-secondary col-md-2 mb-2" value="Enviar" name="submit"   onclick="enviar_datos();" /></td><td></td></tr>
<hr>
<br>
<br>
<br>
<br>


</form>

<div id="mostrar" class="col-md-3 mb-3 bg-info text-white">
    </div>


</div>
</div>
</div>





    <!--
   <div>
        <br>

        <br><b><p>Enviar los resultados al correo electronico</p></b>

<form action="enviar.php" method="POST"> 
<tr><td>Email: </td>
<td><input type="email" name="correo" placeholder="Introduce un correo valido" required /></td></tr>
<tr><td><input type="submit" value="Enviar" name="submit" /></td><td></td></tr>
</form>
    </div>--> 
    <!--
    <div id="graficaBar">
              
          </div>
          <script type="text/javascript">
              function crearCadenaLineal(json){
                var parsed=JSON.parse(json);
                var arr=[];
                for(var x in parsed){
                    arr.push(parsed[x])
                }
                return arr;
              }

          
              datosX=crearCadenaLineal('<?php echo $datosX ?>');
              datosY=crearCadenaLineal('<?php echo $datosY ?>');
              var trace1={
                x:datosX;
                y:datosY;
                type:'scatter'
              };
              var data=[trace1];
              Ploty.newPlot('graficaBar',data);

          </script>
          
  </div>
-->
<?php
}
?>