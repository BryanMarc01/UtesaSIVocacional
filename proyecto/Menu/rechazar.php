<?php

// Conectarse a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'inscripcion');

// Verificar la conexión
if ($mysqli->connect_error) {
    die('Error de conexión (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}

// Obtener el ID de la inscripción a rechazar
$id = $_GET['id'];

// Actualizar el estado de la inscripción a "rechazado"
$query = "UPDATE datos_inscripcion SET estado='rechazado' WHERE id=?";
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

    
$subject = "Su solicitud de inscripción ha sido rechazada";
$message = "Estimado/a " . $nombre . ", Lamentablemente, le informamos que su solicitud ha sido rechazada. Nos gustaría recordarle que si tiene alguna duda o inquietud, puede ponerse en contacto con nosotros a través del correo electrónico [sistemautesa@gmail.com].<br><br>Le agradecemos por su interés en nuestro servicio, y esperamos poder ayudarle en el futuro.<br><br>Atentamente,<br>El equipo de Inscripción UTESA - SEDE.";

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
    echo "Error al rechazar la inscripción.";
}


// Cerrar la conexión
$mysqli->close();

?>
