<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/3521a2d66a.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.4/dist/sweetalert2.all.min.js"></script>
    
    </head>
    <body id="body">
    <div class="ayuda">
        <a onclick="ayuda()"><i class="fas fa-info-circle"></i><br>Ayuda</a>
    </div>

    <div class="contenido" id="contenido">
        <header>
            <div class="bienvenida">
                <h1>TEST VOCACIONAL</h1>
                <hr>
                <p>Universidad Tecnologica de Santiago (UTESA) </p>
			</div><br><br>
            
        </header>
    
            <script>

function ayuda(){
    Swal.fire({
    title: '<h2 class="notificacion">Informacion</h1>',
    type: 'info',
    html:
        '<div class="notificacion"><h2>Objetivo</h2><hr>' +
        '<p>Facilitar la toma de decisiones a la hora de seleccionar su carrera universitaria que mas se ajuste a sus capacidades, habilidades, garantizándole el éxito academico y personal</p>' +
        '<br><h2>Instrucciones</h2><hr>' + 
        '<p>1. Lee detenidamente cada una de las actividades.</p>' +
        '<p>2. Selecciona con un clic para indicar que si te sientes identificado, si marcas por error puedes descarmar con un clic</p>' +
        '<p>3. En general no existe respuestas correctas o incorrectas, lo importante es que contestes con sinceridad y confianza para que puedas conocer mejor tus intereses vocacionales</p></div>',
    showCloseButton: true,
    focusConfirm: false,
    confirmButtonText:
        'Entendido',
    confirmButtonAriaLabel: 'Thumbs up, great!',
    })
};

ayuda();


</script>
<?php

include("conexion2.php");


if(isset($_GET['id'])) {
  $TestCod = $_GET['id'];
  $query0 = "SELECT * FROM test WHERE TesCod = $TestCod";
  $result0 = mysqli_query($conn, $query0);
  if(!$result0) {
    die(" Sentencia query fallida.");
  }
  $area=0;
  while ($row0 = mysqli_fetch_array($result0)){

     $area= $row0['TesAreCod'];
  }


  $query = "SELECT * FROM preguntas WHERE PreTesCod = $TestCod";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die(" Sentencia query fallida.");
  }
}

  ?>
<br>
  <div class="container p-4">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card card-body">
        <form action="ResultadoTestVo.php?id=<?php echo $TestCod ?> " method="POST">
       
        <?php  
        $i=1;

        while ($row = mysqli_fetch_array($result)){ 
           $preCodigo = $row['PreCod'];
          ?>
          <br>
            <label>Pregunta <?php echo $i ?> </label>
<br>
            <div class="form-group">
            
                   

              <input disabled="disabled" name="pregunta<?php echo $i ?>" type="text" class="form-control" value="<?php echo $row['PreNom']; ?>"  >

              <?php 
                  
                  $query2 = "SELECT *FROM carrera where CarAreCod = $area  ";
                  $resultado=mysqli_query($conn,$query2);
                  
               
                $query3 = "SELECT *FROM respuestas where ResPreCod = $preCodigo ";
                $resultado3=mysqli_query($conn,$query3);

                $n=1;

                while ($row3 = mysqli_fetch_array($resultado3)){
           ?>

          

           <input  id="rptaQ" readonly="readonly" name="pregunta<?php echo$i?>Respuesta" type="radio"  value="<?php echo $row3 ['ResCod']; ?>" > 
           <label for="rptaQ"> <?php echo $row3 ['ResNom'] ?></label><br>
               
           <?php
             $n= $n+1;
             }
             ?>

             </div>
            
            <?php
            
             $i=$i+1;
           } ?>
<br>
            <button class="btn-success" name="respuestas_TestVo"> Evaluar respuestas </button>
          </form>

 

</body>



</div>
</div>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
