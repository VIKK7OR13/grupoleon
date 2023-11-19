<?php
 // Conectar a la base de datos (reemplaza con tus propios datos de conexión)
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "usuariosleon";

 $conn = new mysqli($servername, $username, $password, $database);

 if ($conn->connect_error) {
     die("Conexión fallida: " . $conn->connect_error);
 }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $DNI = $_POST['DNI'];
    $CUIL = $_POST['CUIL'];
    $DOMICILIO = $_POST['DOMICILIO'];
    $TELEFONO = $_POST['TELEFONO'];
    $CORREO = $_POST['CORREO'];
    $PROFESION = $_POST['PROFESION'];
    $contrasena = $_POST['contrasena'];

    }

    // Generar el hash de la contraseña
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);


// Realiza la conexión a la base de datos aquí

// Verifica la existencia de 'tipo_registro' en $_POST
if (isset($_POST["tipo_registro"])) {
    $tipo_registro = $_POST["tipo_registro"];
    $sql = ""; // Inicializa la variable $sql

    // Resto de tu lógica condicional
    if ($tipo_registro === "locatario") {
        $sql = "INSERT INTO LOCATARIO (NOMBRE_Y_APELLIDO, DNI, CUIL, DOMICILIO, TELEFONO, CORREO, OCUPACION, CONTRASENA) VALUES ('$nombre_usuario', '$DNI', '$CUIL', '$DOMICILIO', '$TELEFONO', '$CORREO', '$PROFESION','$contrasena_hash')";
    } elseif ($tipo_registro === "locador") {
        $sql = "INSERT INTO LOCADOR (NOMBRE_Y_APELLIDO, DNI, CUIL, DOMICILIO, TELEFONO, CORREO, OCUPACION, CONTRASENA) VALUES ('$nombre_usuario', '$DNI', '$CUIL', '$DOMICILIO', '$TELEFONO', '$CORREO', '$PROFESION','$contrasena_hash')";
    }

    // Verifica si $sql no está vacío antes de ejecutar la consulta
    if (!empty($sql)) {
        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso";
            echo '<br>';
            echo '<br>';
            echo '<a href="iniciosesion.html">IR A INICIAR SESIÓN</a>';
            ;
        } else {
            echo "Error al registrar: " . $conn->error;
        }
    } else {
        echo "Tipo de registro no reconocido";
    }
} else {
    echo "No se recibió información para el registro";
}




    $conn->close();
?>