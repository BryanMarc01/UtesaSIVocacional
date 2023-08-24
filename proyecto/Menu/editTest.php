<?php
include("conexion2.php");
include('encabezado.php');

if (isset($_GET['id'])) {
    $TestCod = $_GET['id'];

    if (isset($_POST['update'])) {
        $PreNom = $_POST['PreNom'];
        $updateQuery = "UPDATE test SET TesNumPre = $PreNom WHERE TesCod = $TestCod";
        mysqli_query($conn, $updateQuery);
    }

    $query = "SELECT * FROM test WHERE TesCod = $TestCod";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Sentencia query fallida.");
    }

    $row = mysqli_fetch_array($result);
    $TesAreCod = $row['TesAreCod'];
    $TesNumPre = $row['TesNumPre'];
}
$queryArea = "SELECT AreNom FROM area WHERE AreCod = $TesAreCod";
$resultArea = mysqli_query($conn, $queryArea);

if (!$resultArea) {
    die("Sentencia query fallida.");
}

$rowArea = mysqli_fetch_array($resultArea);
$NomArea = $rowArea['AreNom'];
// Editar preguntas y respuestas
if (isset($_POST['updateQuestion'])) {
    $i = 1;
    while (isset($_POST['pregunta' . $i])) {
        $preNombre = $_POST['pregunta' . $i];
        $preCarrera = $_POST['carreraPregunta' . $i];
        $PreCod = $_POST['preCod' . $i];

        $updateQuery = "UPDATE preguntas SET PreNom = '$preNombre', PreCarCod = $preCarrera WHERE PreCod = $PreCod";
        mysqli_query($conn, $updateQuery);

        $n = 1;
        while (isset($_POST['pregunta' . $i . 'Respuesta' . $n])) {
            $resNombre = $_POST['pregunta' . $i . 'Respuesta' . $n];
            $ResCod = $_POST['resCod' . $i . 'Respuesta' . $n];

            $updateQuery = "UPDATE respuestas SET ResNom = '$resNombre' WHERE ResCod = $ResCod";
            mysqli_query($conn, $updateQuery);

            $n++;
        }

        $i++;
    }

    $_SESSION['message'] = 'Los datos se actualizaron correctamente.';
    $_SESSION['message_type'] = 'success';
  
}
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card card-body">
                <form action="editTest.php?id=<?php echo $TestCod ?>" method="POST">
                   
                    <div class="form-group">
                        <label for="area">Área</label>
                        <input type="text" class="form-control" value="<?php echo $NomArea ?>" readonly>
                    </div>
                  
                
                </form>
                <form action="editTest.php?id=<?php echo $TestCod ?>" method="POST">
                    <?php
                    $queryPreguntas = "SELECT * FROM preguntas WHERE PreTesCod = $TestCod";
                    $resultPreguntas = mysqli_query($conn, $queryPreguntas);
                    $i = 1;
                    while ($rowPregunta = mysqli_fetch_array($resultPreguntas)) {
                        $PreCod = $rowPregunta['PreCod'];
                        $PreNom = $rowPregunta['PreNom'];
                        $PreCarCod = $rowPregunta['PreCarCod'];

                        $queryCarreras = "SELECT * FROM carrera WHERE CarAreCod = $TesAreCod";
                        $resultCarreras = mysqli_query($conn, $queryCarreras);

                        echo '<div class="form-group">';
                        echo '<label for="pregunta' . $i . '">Pregunta ' . $i . '</label>';
                        echo '<input type="hidden" name="preCod' . $i . '" value="' . $PreCod . '">';
                        echo '<input type="text" class="form-control" name="pregunta' . $i . '" value="' . $PreNom . '">';
                        echo '<label for="carreraPregunta' . $i . '">Carrera</label>';
                        while ($rowCarrera = mysqli_fetch_array($resultCarreras)) {
                            $CarCod = $rowCarrera['CarCod'];
                            $CarNom = $rowCarrera['CarNom'];
                            $checked = ($PreCarCod == $CarCod) ? 'checked' : '';
                            echo '<div class="form-check">';
                            echo '<input type="radio" class="form-check-input" name="carreraPregunta' . $i . '" value="' . $CarCod . '" ' . $checked . '>';
                            echo '<label class="form-check-label">' . $CarNom . '</label>';
                            echo '</div>';
                        }
                        echo '</div>';

                        $queryRespuestas = "SELECT * FROM respuestas WHERE ResPreCod = $PreCod";
                        $resultRespuestas = mysqli_query($conn, $queryRespuestas);
                        $n = 1;
                        while ($rowRespuesta = mysqli_fetch_array($resultRespuestas)) {
                            $ResCod = $rowRespuesta['ResCod'];
                            $ResNom = $rowRespuesta['ResNom'];

                            echo '<div class="form-group">';
                            echo '<input type="hidden" name="resCod' . $i . 'Respuesta' . $n . '" value="' . $ResCod . '">';
                            echo '<input type="text" class="form-control" name="pregunta' . $i . 'Respuesta' . $n . '" value="' . $ResNom . '" placeholder="Respuesta ' . $n . '">';
                            echo '</div>';
                            $n++;
                        }

                        $i++;
                    }
                    ?>
                    <button class="btn btn-success" name="updateQuestion">Actualizar Preguntas</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('pie.php'); ?>
