
<?php include ("conexion2.php")?>
<?php include('encabezado.php');?>


<div class="container">
<h3>CRUD TEST</h3>

<div class="container p-4">
<div class="col-md-8">
    <table class="table table-bordered">
        <!-- ... (contenido de la tabla) ... -->
    </table>

    <!-- Agregar el botón "Nuevo Test" -->
    <a href="CrearTest.php" class="btn btn-primary">Nuevo Test</a>
</div>
<br>
	<div class="row">
		
		<div class="col-md-8">
			<table class="table table-borbered">
				<thead>
					<tr>
						<th>Codigo</th>
						<th>Area</th>
						<th>Numero de Preguntas</th>
						<th>Acciones</th>
			

					</tr>
				</thead>
				<tbody>
					<?php 
					$query = "SELECT *FROM test ";
					$result=mysqli_query($conn,$query);
					while ($row = mysqli_fetch_array($result)) { 
						$idArTest= $row ['TesAreCod'];
						$queryCarrera= "SELECT *FROM area where AreCod = '$idArTest'" ;
						$result2= mysqli_query($conn,$queryCarrera);
						$NomArea="";

						while ($row2 = mysqli_fetch_array($result2)) {
							$NomArea= $row2['AreNom'];

						}

						?>	
						<tr>
						   <td><?php echo $row ['TesCod'] ?></td>
						   <td><?php echo $NomArea ?></td>
						   <td><?php echo $row ['TesNumPre'] ?></td>

						   <td>
                               <a href="verTest.php?id=<?php echo $row['TesCod']?>">Ver </a>
						   	   <a href="editTest.php?id=<?php echo $row['TesCod']?>">Editar </a>
						   	   <a href="deleteTest.php?id=<?php echo $row['TesCod']?>">Eliminar </a>
						   </td>

						</tr>


					<?php
					}
					 ?>
				</tbody>
				
			</table>
		</div>

		
	</div>
	<!--FIN del cont principal-->
<?php include('pie.php');?>
</div>
