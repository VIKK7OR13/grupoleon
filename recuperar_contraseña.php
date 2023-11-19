<?php

print_r($_POST);


// ... (código de conexión a la base de datos)
$servername = "localhost";
$username = "root";
$password = "";
$database = "usuariosleon";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';




$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger el correo proporcionado en el formulario

    $CORREO = $_POST['correo'];

    // Verificar si el correo existe en la base de datos
    $sql = "SELECT NOMBRE_Y_APELLIDO FROM locatario WHERE CORREO = '$CORREO'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Generar un token único para el restablecimiento de contraseña
        $token = bin2hex(random_bytes(32));

        // Guardar el token en la base de datos para este usuario (puedes tener una tabla específica para tokens)

        // Envío del correo electrónico al usuario con el enlace para restablecer la contraseña
        $asunto = "Restablecimiento de Contraseña";
        $mensaje = "Haga clic en este enlace para restablecer su contraseña: http://tudominio.com/restablecer.php?token=$token";
        $cabeceras = "From: tu_correo@example.com";

    

        $mail = new PHPMailer();

        try {
            // Configurar el servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'tu_correo@gmail.com';
            $mail->Password = 'tu_contraseña';
            $mail->Port = 587; // Puerto de Gmail para TLS
            $mail->SMTPSecure = 'tls'; // O 'ssl' si es necesario
        
            // Configuración del correo
            $mail->setFrom('tu_correo@gmail.com', 'Tu Nombre');
            $mail->addAddress($CORREO); // Agrega el destinatario
            $mail->isHTML(true);
            $mail->Subject = 'Restablecimiento de Contraseña';
            $mail->Body = "Haga clic en este enlace para restablecer su contraseña: http://tudominio.com/restablecer.php?token=$token";
        
            // Enviar el correo
            $mail->send();
            echo "Se ha enviado un enlace de restablecimiento a tu correo electrónico.";
        } catch (Exception $e) {
            echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
        }

}}
?>