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
    $id_ecogas = $conexion->real_escape_string($_GET['id']);

    if (!is_numeric($id_ecogas)) {
        echo "<script>alert('ID_ECOGAS no válido');</script>";
    } else {
        $query_borrar_ecogas = "DELETE FROM ecogas WHERE ID_ECOGAS = $id_ecogas";

        if ($conexion->query($query_borrar_ecogas)) {
            echo "<script>alert('Registro de Ecogas borrado');</script>";
        } else {
            echo "<script>alert('Error al borrar el registro de Ecogas');</script>";
        }
    }

    echo "<script>window.location.href = 'veradministracion.php';</script>";
}
$conexion->close(); 


?>
