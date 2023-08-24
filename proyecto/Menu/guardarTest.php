<?php

include('conexion2.php');

if (isset($_POST['save_test'])) {
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


   $_SESSION['message'] = ' -----';
    $_SESSION['message_type'] = '-----';



 //----------------------------------------------------------------------------

  
					//$query = "SELECT *FROM area ";
					//$result=mysqli_query($conn,$query);
	$i=1;
	while ($i<=$numPre) {
		$prNom="pregunta".$i;
		$prCar= "carreraPregunta".$i;

        $preNombre = $_POST[$prNom];
        $preCarrera=$_POST[$prCar];

    $queryPre = " INSERT INTO preguntas (PreTesCod,PreNom,PreCarCod) VALUES ('$idTest','$preNombre','$preCarrera')";

        $resultadoPr=mysqli_query($conn,$queryPre);

        if(!$resultadoPr) {
    die("Query Failed----.");

  }

        $CodPregunta = mysqli_insert_id($conn);

        $j=1;
        while($j<=3){

            $valor=$j-1;

        	$rptNom="pregunta".$i."Respuesta".$j;   
		    
           $resNombre = $_POST[$rptNom];
           

        	$queryRpta = " INSERT INTO respuestas (ResPreCod,ResValor,ResNom) VALUES ('$CodPregunta','$valor','$resNombre')";

        	 $resultadoRPT=mysqli_query($conn,$queryRpta);

       $j=$j+1;

        }

		$i=$i+1;
	}



}

header('Location: crearTest.php');

?>