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


// Consulta de estudiantes

$sql = "SELECT id, nombre, email, estado, correo_enviado FROM datos_inscripcion";
$result = $conn->query($sql);


// Generación del correo electrónico para cada estudiante
require 'PHPMailer.php';
require 'Exception.php';
require 'SMTP.php';
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


while ($row = $result->fetch_assoc()) {
    
    $id = $row["id"];
    $nombre = $row["nombre"];
    $email = $row["email"];
    $estado = $row["estado"];
    $enlace = "http://localhost/proyecto/Servicios_Santiago.php?id=" . $id;
    
      // Verificar si el correo ya ha sido enviado
    if ($row["correo_enviado"] == 0) {

        $subject = "Estatus de tu progreso académico";
        $message = "Hola " . $nombre . ", tu estatus actual es: " . $estado . ". Para ver detalles, haz clic en el siguiente enlace: " . $enlace;

        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        // Envío del correo electrónico
        $mail->AddAddress($email, $nombre);

        try {
            $mail->send();

            echo "Correo enviado exitosamente a " . $email . "<br>";

            // Actualizar la columna correo_enviado a 1
            $update_query = "UPDATE datos_inscripcion SET correo_enviado = 1 WHERE id = $id";
            $conn->query($update_query);
            
        header('Location: back.html');
    } catch (Exception $e) {
        echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
    }
}
}
// Cierre de la conexión a la base de datos
$conn->close();

?>
