<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    // Conexión a la base de datos con MySQLi
    $servidor = "localhost";
    $usuario_bd = "root";
    $contrasena_bd = "";
    $nombre_bd = "usuariosleon";




    // Crear la conexión
    $conexion = new mysqli($servidor, $usuario_bd, $contrasena_bd, $nombre_bd);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Consulta para obtener el hash de la contraseña asociada al nombre de usuario
   //$query = "SELECT CONTRASENA FROM locador WHERE NOMBRE_Y_APELLIDO = '$nombre_usuario'" OR "SELECT CONTRASENA FROM locatario WHERE NOMBRE_Y_APELLIDO = '$nombre_usuario'";
   
    $query = "SELECT CONTRASENA FROM locador WHERE NOMBRE_Y_APELLIDO = '$nombre_usuario' 
    UNION 
    SELECT CONTRASENA FROM locatario WHERE NOMBRE_Y_APELLIDO = '$nombre_usuario'";

   
    $resultado = $conexion->query($query);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $contrasena_hash_obtenido_de_la_base_de_datos = $fila['CONTRASENA'];

        // Comprobar si la contraseña es válida
        if (password_verify($contrasena, $contrasena_hash_obtenido_de_la_base_de_datos)) {
            echo "Inicio de sesión exitoso.";
        } else {
            echo "Nombre de usuario o contraseña incorrectos.";
        }
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }

    $conexion->close(); // Cerrar la conexión a la base de datos
}
?>
