<?php include ("conexion2.php")?>

<?php include ("encabezado.php")?>

<div class="container p-4">

<form action="crearPreguntas.php" method="POST">
	<h4> Elija area para el test </h4>
	<?php 
					$query = "SELECT *FROM area ";
					$result=mysqli_query($conn,$query);
					while ($row = mysqli_fetch_array($result)) { ?>	

						<input type="radio" id="area" name="areaElegida" value="<?php echo $row ['AreCod']; ?>">
                           <label for="area"> <?php echo $row ['AreNom'] ?></label><br>
						
					<?php
					}
					 ?>
	<h4> Ingrese numero de preguntas:  </h4>
	<div class="form-group">
						<input type="text" name="numeroPreguntas" class="form-control"
						placeholder="numero de Preguntas " autofocus>
	</div>
    
        <input type="submit" name="save_task" class="btn btn-success btn-block" value="Siguiente">
 </form>
</div>

<?php include ("pie.php")?>