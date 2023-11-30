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
    // Obtener el ID del usuario desde el formulario
    $id_usuario = $_POST['usuario_id'];


    // Obtener los valores de las cuotas desde el formulario
    $cuotas = array();
    for ($i = 1; $i <= 36; $i++) {
        $cuota = $_POST["cuota$i"];
        array_push($cuotas, $cuota);
    }

    // Preparar la consulta con parámetros
    $sql = "INSERT INTO cuotas_alquiler (CUOTA_1, CUOTA_2, CUOTA_3, CUOTA_4, CUOTA_5, CUOTA_6, CUOTA_7, CUOTA_8, CUOTA_9, CUOTA_10, CUOTA_11, CUOTA_12, CUOTA_13, CUOTA_14, CUOTA_15, CUOTA_16, CUOTA_17, CUOTA_18, CUOTA_19, CUOTA_20, CUOTA_21, CUOTA_22, CUOTA_23, CUOTA_24, CUOTA_25, CUOTA_26, CUOTA_27, CUOTA_28, CUOTA_29, CUOTA_30, CUOTA_31, CUOTA_32, CUOTA_33, CUOTA_34, CUOTA_35, CUOTA_36,USUARIODEUDOR)
            VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, $id_usuario)";

$stmt = $conn->prepare($sql);

// Vincular parámetros
$types = str_repeat('d', 36); // 36 'd' para los valores de las cuotas
$stmt->bind_param($types, ...$cuotas);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "REGISTRO EXITOSO DE LAS DEUDAS";
    echo '<br>';
    echo '<br>';
    echo '<script>';
    echo 'alert("Registro exitoso de las deudas");';
    echo 'window.location.href = "veradministracion.php";';
    echo '</script>';
} else {
    echo "Error al registrar en la tabla cuotas_alquiler: " . $stmt->error;
}





    

    // Cerrar la conexión y liberar recursos
    $stmt->close();
} else {
    echo "No se recibió información para el registro";
}

$conn->close();
?>


