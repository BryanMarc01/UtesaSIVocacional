<?php

// Conectarse a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'inscripcion');

// Verificar la conexión
if ($mysqli->connect_error) {
    die('Error de conexión (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}

// Obtener el ID de la inscripción a aprobar
$id = $_GET['id'];

// Actualizar el estado de la inscripción a "aprobado"
$query = "UPDATE datos_inscripcion SET estado='aprobado' WHERE id=?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id);
$result = $stmt->execute();

if ($result) {
// Obtener la información del usuario
$query = "SELECT nombre, email, estado FROM datos_inscripcion WHERE id=?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
require '../PHPMailer.php';
require '../Exception.php';
require '../SMTP.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->CharSet = 'UTF-8';

$mail->IsSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPSecure = 'tls';
$mail->Port       = 587;
$mail->SMTPDebug  = 1;
$mail->SMTPAuth   = true;
$mail->Username   = 'utesatest01@gmail.com';
$mail->Password   = 'hqolxtmaxxkhixxq';
$mail->SetFrom('utesatest01@gmail.com', "Sistema Corporativo - UTESA ");
$mail->AddReplyTo('no-reply@mycomp.com','no-reply');


while ($row = $resultado->fetch_assoc()) {
  
$nombre = $row["nombre"];
$email = $row["email"];

$enlace = "https://servicios2.utesa.edu/support/tickets/new?form_2=true&page_type=2";
    
$subject = "Su solicitud de inscripción ha sido aprobada";
$message = "Hola " . $nombre . ", Le informamos que su solicitud ha sido aprobada.<br><br>Para proceder hacer su pago de inscripcion,<a href=" . $enlace . "> Haz clic aquí </a><br><br>Saludos,<br>El equipo de Inscripción UTESA - SEDE. ";

 $mail->Subject = $subject;
 $mail->MsgHTML($message);
// Envío del correo electrónico
$mail->AddAddress($email, $nombre);
$mail->send();
}
// Redirigir de vuelta a la página de administración
    header("Location: admin.php");
} else {
    // Mostrar un mensaje de error si falla la actualización
    echo "Error al aprobar la inscripción.";
}

// Cerrar la conexión
$mysqli->close();

?>

