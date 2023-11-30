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
    $id_epec = $conexion->real_escape_string($_GET['id']);

    if (!is_numeric($id_epec)) {
        echo "<script>alert('ID_EPEC no válido');</script>";
    } else {
        $query_borrar_epec = "DELETE FROM epec WHERE ID_EPEC = $id_epec";

        if ($conexion->query($query_borrar_epec)) {
            echo "<script>alert('Registro de EPEC borrado');</script>";
        } else {
            echo "<script>alert('Error al borrar el registro de EPEC');</script>";
        }
    }

    echo "<script>window.location.href = 'veradministracion.php';</script>";
}

// ... (código posterior)
$conexion->close(); 

?>
