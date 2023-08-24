<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="Login/img/Captura.png">
	<title> FORMULARIO DE INSCRIPCIÓN </title>
	<style>
		body {
			font-family: "Lucida Grande", sans-serif;
			background-color: #003300;
		}

		h1 {
  text-align: center;
  margin-top: 30px;
  color: orange;
  font-family: "Montserrat", sans-serif;
}


		form {
			background-color: #fff;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);
			width: 600px;
			margin: 0 auto;
			margin-top: 50px;
			margin-bottom: 50px;
		}

		form > fieldset {
			border: none;
			margin: 0;
			padding: 0;
			display: block;
			width: 100%;
			min-width: 0;
			border-radius: 0;
			background-color: transparent;
		}

		form > fieldset > legend {
			font-weight: bold;
			font-size: 20px;
			color: #0000FF;
			padding-bottom: 10px;
			text-align: center;
		}

		form > fieldset:first-of-type > legend {
			color: #006600;
			font-family: "Montserrat", sans-serif;
		}

		form > fieldset:last-of-type > legend {
			color:#006600;
			font-family: "Montserrat", sans-serif;
		}
	

		label {
  display: inline-block;
  width: 40%; /* ancho específico del label */
  margin-bottom: 20px;
  font-weight: bold;
  font-size: 14px;
  text-align: right; /* alineación a la derecha del label */
}

input[type=text], 
input[type=email], 
input[type=tel] 
 {

  width: calc(80% - 130px); /* ancho específico del input, se calcula restando el ancho del label */
  margin-bottom: 10px;
  padding: 10px;
  border: 2px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-size: 16px;
   margin-left: 120px; 
 
   
  
}
input[type=file] {
  display: inline-block;
  width: 30%; /* ancho específico del input, se calcula restando el ancho del label */
  margin-bottom: 10px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 2px;
  box-sizing: border-box;
  font-size: 8px;
}



		input[type=submit] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			font-size: 18px;
			cursor: pointer;
			margin-top: 20px;
		}

		input[type=submit]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	



	<form action="procesar_inscripcion.php" method="POST" enctype="multipart/form-data">

	<h1>FORMULARIO DE INSCRIPCIÓN</h1>
	<hr>
	<hr>
	<fieldset>
			<legend>:::: Datos Personales del Alumno(a)::::</legend>
			<hr>
			<hr>
<br>


              <input type="hidden" name="id" placeholder="id" id="id" value="">
			<input type="text" name="nombre" placeholder="Nombre" id="nombre" required><br><br>

			
			<input type="text" name="apellido" placeholder="Apellido" id="apellido" required><br><br>

			<input type="email" name="email" placeholder="Email" id="email" required><br><br>

			
			<input type="tel" name="telefono" placeholder="Telefono" id="telefono" required><br><br>

			<input type="text" name="direccion" placeholder="Direccion" id="direccion" required><br><br>
	
		<hr>
		<hr>
	
		<hr>
		
			<legend>:::: Documentos para enviar ::::</legend>
			<hr>
			<br>

			
			<label for="formulario">Formulario de inscripcion":</label>
			<input type="file" name="formulario" id="formulario" required>
			
			<label for="foto">Foto tamaño 2" x 2":</label>
			<input type="file" name="foto" id="foto" required>

			<label for="acta_nacimiento">Acta de nacimiento legalizada:</label>
			<input type="file" name="acta_nacimiento" id="acta_nacimiento" required>

			<label for="certificacion_bachiller">Certificación de Bachiller expedida por MESCyT:</label>
			<input type="file" name="certificacion_bachiller" id="certificacion_bachiller" required>

			<label for="record_calificaciones">Récord de calificaciones del bachillerato:</label>
			<input type="file" name="record_calificaciones" id="record_calificaciones" required>

			<label for="certificado_salud">Certificado de salud:</label>
			<input type="file" name="certificado_salud" id="certificado_salud" required>

			<label for="cedula_identidad">Copia de la cédula de identidad y electoral:</label>
			<input type="file" name="cedula_identidad" id="cedula_identidad" required>

		</fieldset>
		
		<input type="submit" name="submit" value="Enviar">

	</form>
</body>
</html>