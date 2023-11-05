<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $nueva_contrasena = $_POST['nueva_contrasena'];
    $confirmar_contrasena = $_POST['confirmar_contrasena'];

    // Verificar si el token es válido y no ha expirado en la base de datos

    if ($nueva_contrasena === $confirmar_contrasena) {
        // Actualizar la contraseña en la base de datos y eliminar el token
        // Mostrar un mensaje de éxito y permitir al usuario iniciar sesión con la nueva contraseña
    } else {
        // Mostrar un mensaje de error si las contraseñas no coinciden
    }
}
?>
