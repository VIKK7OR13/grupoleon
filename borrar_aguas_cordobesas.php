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





if (isset($_GET['id'])) {
    $id_aguas_cordobesas = $conexion->real_escape_string($_GET['id']);

    if (!is_numeric($id_aguas_cordobesas)) {
        echo "<script>alert('ID_AGUAS_CORDOBESAS no válido');</script>";
    } else {
        $query_borrar_aguas_cordobesas = "DELETE FROM aguas_cordobesas WHERE ID_AGUAS_CORDOBESAS = $id_aguas_cordobesas";

        if ($conexion->query($query_borrar_aguas_cordobesas)) {
            echo "<script>alert('Registro de Aguas Cordobesas borrado');</script>";
        } else {
            echo "<script>alert('Error al borrar el registro de Aguas Cordobesas');</script>";
        }
    }

    echo "<script>window.location.href = 'veradministracion.php';</script>";
}

// ... (código posterior)
$conexion->close(); 
?>
