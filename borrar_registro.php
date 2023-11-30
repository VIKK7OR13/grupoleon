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
    $id = $_GET['id'];
    $query_borrar = "DELETE FROM inmuebles WHERE ID_INMUEBLES = $id";
    $resultado_borrar = $conexion->query($query_borrar);

    if ($resultado_borrar) {
        echo "<script>alert('Registro borrado');</script>";
    } else {
        echo "<script>alert('Error al borrar el registro');</script>";
    }

    // Redirigir a la misma página después de borrar el registro
    echo "<script>window.location.href = 'veradministracion.php';</script>";
}

// ... (código posterior)


 //Cerrar la conexión a la base de datos
 $conexion->close(); 

?>





