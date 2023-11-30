<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="icon" href="leonpestaña.ico">
    <script src="https://kit.fontawesome.com/db443e806b.js" crossorigin="anonymous"></script>


    <title>Iniciar Sesión</title>
</head>
<body>


 
<a href="iniciar_sesion.php?logout=true">Cerrar sesión</a>
        

        <h1>Panel del Administrador</h1>
    
       
        <h3>controlador de usuario</h3>



        <form action="" method="post">
            <h2>Agregar Inmueble</h2>
            
            <?php

    // Obtener el usuario_id de la URL
    $usuario_id = isset($_GET['usuario_id']) ? $_GET['usuario_id'] : '';

    // Mostrar el usuario_id en un campo oculto
    echo '<input type="hidden" name="usuario_id" value="' . $usuario_id . '">';
    ?>



            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion"><br><br>
        
            <label for="codigo_postal">Código Postal:</label>
            <input type="text" name="codigo_postal" id="codigo_postal"><br><br>
        
            <label for="barrio">Barrio:</label>
            <input type="text" name="barrio" id="barrio"><br><br>
        
            <label for="ciudad">Ciudad:</label>
            <input type="text" name="ciudad" id="ciudad"><br><br>
        
            <input type="submit" value="Agregar Inmueble">
        </form>

        <a href="veradministracion.php">Volver atras</a>

    

        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID del usuario desde el formulario
    $usuario_id = $_POST['usuario_id'];

    // Obtener los valores del formulario
    $direccion = $_POST['direccion'];
    $codigo_postal = $_POST['codigo_postal'];
    $barrio = $_POST['barrio'];
    $ciudad = $_POST['ciudad'];

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

    // Preparar la consulta para insertar el inmueble en la base de datos
    $query_inmueble = "INSERT INTO inmuebles (direccion, codigo_postal, barrio, ciudad, usuariovinculado) VALUES ('$direccion', '$codigo_postal', '$barrio', '$ciudad', '$usuario_id')";

    // Verificar si $conexion está definida y no es nula
    if ($conexion && $conexion->query($query_inmueble) === TRUE) {
        echo "Inmueble agregado correctamente";

    
    } else {
        echo "Error al agregar el inmueble: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}






?>







   








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