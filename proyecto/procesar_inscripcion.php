<?php
// Configurar la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inscripcion";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión a la base de datos
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Verificar que se han enviado todos los campos del formulario
if (!isset($_POST["id"], $_POST["nombre"], $_POST["apellido"], $_POST["email"], $_POST["telefono"], $_POST["direccion"], $_FILES["foto"], $_FILES["acta_nacimiento"], $_FILES["certificacion_bachiller"], $_FILES["record_calificaciones"], $_FILES["certificado_salud"], $_FILES["cedula_identidad"],  $_FILES["formulario"])) {
    die("Error: faltan campos en el formulario.");
}

function validarCampos($id, $nombre, $apellido, $email, $conn) {
    $sql = "SELECT * FROM datos_inscripcion WHERE id='$id' OR email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if ($row["id"] == $id) {
                die("Error: el ID ya existe en la base de datos.");
            }
            if ($row["email"] == $email) {
                die("Error: el correo electrónico ya existe en la base de datos.");
            }
        }
    }
}

// Obtener los datos del formulario
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$foto = $_FILES["foto"]["name"];
$acta_nacimiento = $_FILES["acta_nacimiento"]["name"];
$certificacion_bachiller = $_FILES["certificacion_bachiller"]["name"];
$record_calificaciones = $_FILES["record_calificaciones"]["name"];
$certificado_salud = $_FILES["certificado_salud"]["name"];
$cedula_identidad = $_FILES["cedula_identidad"]["name"];
$formulario = $_FILES["formulario"]["name"];


validarCampos($id, $nombre, $apellido, $email, $conn);
// Mover los archivos subidos a la carpeta deseada
$foto_destino = "archivos/fotos/" . $foto;
$acta_nacimiento_destino = "archivos/actas_nacimiento/" . $acta_nacimiento;
$certificacion_bachiller_destino = "archivos/certificaciones_bachiller/" . $certificacion_bachiller;
$record_calificaciones_destino = "archivos/records_calificaciones/" . $record_calificaciones;
$certificado_salud_destino = "archivos/certificados_salud/" . $certificado_salud;
$formulario_destino = "archivos/formulario/" . $formulario;
$cedula_identidad_destino = "archivos/cedulas_identidad/" . $cedula_identidad;


move_uploaded_file($_FILES["foto"]["tmp_name"], $foto_destino);
move_uploaded_file($_FILES["acta_nacimiento"]["tmp_name"], $acta_nacimiento_destino);
move_uploaded_file($_FILES["certificacion_bachiller"]["tmp_name"], $certificacion_bachiller_destino);
move_uploaded_file($_FILES["record_calificaciones"]["tmp_name"], $record_calificaciones_destino);
move_uploaded_file($_FILES["certificado_salud"]["tmp_name"], $certificado_salud_destino);
move_uploaded_file($_FILES["cedula_identidad"]["tmp_name"], $cedula_identidad_destino);
move_uploaded_file($_FILES["formulario"]["tmp_name"], $formulario_destino);
// Insertar los datos en la base de datos

$sql = "INSERT INTO datos_inscripcion (nombre, apellido, email, telefono, direccion, foto, acta_nacimiento, certificacion_bachiller, record_calificaciones, certificado_salud, cedula_identidad,formulario)
VALUES ('$nombre', '$apellido', '$email', '$telefono', '$direccion', '$foto', '$acta_nacimiento', '$certificacion_bachiller', '$record_calificaciones', '$certificado_salud', '$cedula_identidad', '$formulario')";

if ($conn->query($sql) === TRUE) {
    echo "Los datos se han insertado correctamente.";
} else {
    echo "Error al insertar los datos: " . $conn->error;
}


$conn->close();
header('Location: estatus.php');
?>