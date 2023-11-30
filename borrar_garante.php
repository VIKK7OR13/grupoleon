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
    $id = $conexion->real_escape_string($_GET['id']);

    if (!is_numeric($id)) {
        echo "<script>alert('ID no válido');</script>";
    } else {
        $query_borrar = "DELETE FROM garante WHERE idgarante = $id";

        if ($conexion->query($query_borrar)) {
            echo "<script>alert('Registro del garante borrado');</script>";
        } else {
            echo "<script>alert('Error al borrar el registro del garante');</script>";
        }
    }

    echo "<script>window.location.href = 'veradministracion.php';</script>";
}

// ... (código posterior)
$conexion->close(); 
?>
