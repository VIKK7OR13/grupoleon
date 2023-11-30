<?php
session_start();

// Obtener el usuario_id de la URL
if (isset($_GET['usuario_id'])) {
    $usuario_id = $_GET['usuario_id'];
} else {
    // Manejar el caso en el que no se proporciona el usuario_id
    echo "Error: No se proporcionó un ID de usuario.";
    exit;
}

// Inicializar la variable de notificación
$notificacion = '';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_y_apellido_garante = $_POST['nombre_y_apellido_garante'];
    $dni_garante = $_POST['dni_garante'];
    $cuil_garante = $_POST['cuil_garante'];
    $domicilio_garante = $_POST['domicilio_garante'];
    $telefono_garante = $_POST['telefono_garante'];
    $correo_garante = $_POST['correo_garante'];
    $ocupacion_garante = $_POST['ocupacion_garante'];

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

    // Insertar el garante en la tabla
    $query_insertar_garante = "INSERT INTO garante 
        (nombre_y_apellido, dni, cuil, domicilio, telefono, correo, ocupacion, usuariovinculado) 
        VALUES ('$nombre_y_apellido_garante', $dni_garante, '$cuil_garante', 
        '$domicilio_garante', '$telefono_garante', '$correo_garante', '$ocupacion_garante', $usuario_id)";

    if ($conexion->query($query_insertar_garante) === TRUE) {
        $notificacion = "Garante asignado exitosamente.";
    } else {
        $notificacion = "Error al asignar el garante: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="icon" href="leonpestaña.ico">
    <script src="https://kit.fontawesome.com/db443e806b.js" crossorigin="anonymous"></script>

    <title>Asignar Garante</title>
    <!-- Agregar script para mostrar notificación en pantalla -->
    <script>
        // Función para mostrar la notificación
        function mostrarNotificacion() {
            var notificacion = "<?php echo $notificacion; ?>";
            if (notificacion !== '') {
                alert(notificacion);
            }
        }
    </script>
</head>
<body onload="mostrarNotificacion();">




<form action="" method="post">
<h2>Asignar Garante</h2>
    <label for="nombre_y_apellido_garante">Nombre y Apellido del Garante:</label>
    <input type="text" name="nombre_y_apellido_garante" required>
    <br><br>
    <label for="dni_garante">DNI del Garante:</label>
    <input type="text" name="dni_garante" required>
    <br><br>
    <label for="cuil_garante">CUIL del Garante:</label>
    <input type="text" name="cuil_garante" required>
    <br><br>
    <label for="domicilio_garante">Domicilio del Garante:</label>
    <input type="text" name="domicilio_garante" required>
    <br><br>
    <label for="telefono_garante">Teléfono del Garante:</label>
    <input type="text" name="telefono_garante" required>
    <br><br>
    <label for="correo_garante">Correo del Garante:</label>
    <input type="email" name="correo_garante" required>
    <br><br>
    <label for="ocupacion_garante">Ocupación del Garante:</label>
    <input type="text" name="ocupacion_garante" required>
    <br><br>
    <!-- Incluir el usuario_id en un campo oculto -->
    <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

    <input type="submit" value="Asignar Garante">
</form>



<a href="veradministracion.php">Volver atras</a>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<footer>
        <div class="footer-section">
        
            <h3>SEGUINOS</h3>
            <br>

            <p><i class="fa-brands fa-facebook fa-beat-fade fa-2xl"></i> &nbsp;
                <i class="fa-brands fa-linkedin fa-beat-fade fa-2xl"></i> &nbsp; 
                <a href="https://instagram.com/grupoleon.inmobiliaria?igshid=MTUwN2J1dDl3OWp0aA==">           
            <i class="fa-brands fa-instagram fa-beat-fade fa-2xl"></i> 
                </a>
            </p>
        </div>
        <div class="footer-section">
            <p> <img src="footerleon.png" alt="logo"></p>
        </div>
        <div class="footer-section">
            <h3>CONTACTO</h3>
            <i class="fa-regular fa-envelope fa-lg"></i> &nbsp;
            <a href="mailto:info@passadoreyasoc.com.ar">grupoleoncba@gmail.com</a>

           <p> <i class="fa-brands fa-whatsapp fa-lg" style="color: #3aaa0e;"></i>
            +54 9 351 3469310</p>
            
            <p><i class="fa-solid fa-location-dot fa-lg"></i> &nbsp; San Martin 165. 2 piso of 206. Còrdoba,Argentina</p>
            <a href="https://maps.app.goo.gl/j6idanoqvvZas7U68" target="_blank">Ver en Mapa</a>
        </div>
        <div class="footer-row">
            &copy; 2023 Grupo Leon. Todos los derechos reservados.
        </div>
    </footer>



</body>
</html>
