<?php

include('conexion2.php');

if (isset($_POST['save_task'])) {
  $areaElegida = $_POST['areaElegida'];
  $numeroPreguntas = $_POST['numeroPreguntas'];
  


  $query = "INSERT INTO test(TesNumPre,TesAreCod) VALUES ('$numeroPreguntas', '$areaElegida')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed----.");
  }


  $_SESSION['message'] = 'Ingrese preguntas ';
  $_SESSION['message_type'] = 'success';

}

?>


<?php include('encabezado.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card card-body">

      	<?php 
      	$m =mysqli_insert_id($conn);

      	 ?>
   
      <form action="guardarTest.php?id=<?php echo $m  ?> " method="POST">

      	<?php 
					//$query = "SELECT *FROM area ";
					//$result=mysqli_query($conn,$query);
					$i=1;
					while ($i<=$numeroPreguntas) { ?>	

						<h5>Pregunta <?php echo $i ?> </h5>
						<div class="form-group">
                           <input name="pregunta<?php echo $i ?>" type="text" class="form-control"  placeholder="¿Pregunta <?php echo $i ?> ?">

                           <?php 
					        $query2 = "SELECT *FROM carrera where CarAreCod = '$areaElegida'  ";
					        $resultado=mysqli_query($conn,$query2);
					        
					      while ($row = mysqli_fetch_array($resultado)) { ?>	

						<input type="radio" id="carrera" name="carreraPregunta<?php echo$i?>" value="<?php echo $row ['CarCod']; ?>">
                           <label for="carrera"> <?php echo $row ['CarNom'] ?></label><br>	
					<?php
					}
					 ?>

					     <input name="pregunta<?php echo$i?>Respuesta1" type="text" class="form-control"  placeholder="respuesta 1 -- puntos +0">
					     <input name="pregunta<?php echo$i?>Respuesta2" type="text" class="form-control"  placeholder="respuesta 2 -- puntos +1">
					     <input name="pregunta<?php echo$i?>Respuesta3" type="text" class="form-control"  placeholder="respuesta 3 -- puntos +3">

                        </div>

					<?php
					 $i=$i+1;
					 }
					 
					 ?>
        
        
        <button class="btn-success" name="save_test"> Guardar Test </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('pie.php'); ?>
