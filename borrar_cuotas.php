<?php
// ... (código de conexión a la base de datos)
$servidor = "localhost";
    $usuario_bd = "root";
    $contrasena_bd = "";
    $nombre_bd = "usuariosleon";

    $conexion = new mysqli($servidor, $usuario_bd, $contrasena_bd, $nombre_bd);

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }



if (isset($_GET['usuariodeudor_id'])) {
    $usuariodeudor_id = $conexion->real_escape_string($_GET['usuariodeudor_id']);

    if (!is_numeric($usuariodeudor_id)) {
        echo "<script>alert('ID de usuariodeudor no válido');</script>";
    } else {
        $query_borrar_cuotas = "DELETE FROM cuotas_alquiler WHERE USUARIODEUDOR = $usuariodeudor_id";

        if ($conexion->query($query_borrar_cuotas)) {
            echo "<script>alert('Todas las cuotas borradas para el usuariodeudor');</script>";
        } else {
            echo "<script>alert('Error al borrar las cuotas para el usuariodeudor');</script>";
        }
    }

    echo "<script>window.location.href = 'veradministracion.php';</script>";
}

// ... (código posterior)
$conexion->close(); 
?>
