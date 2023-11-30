<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="icon" href="leonpestaña.ico">
    <script src="https://kit.fontawesome.com/db443e806b.js" crossorigin="anonymous"></script>

    <title>Agregar Servicio</title>
</head>


<body>

<h2>Agregar Servicio</h2>

<?php


// Procesar el formulario cuando se envíe
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo_servicio = $_POST['tipo_servicio'];
    $precio = $_POST['precio'];
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];

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

    // Obtener el usuario_id del enlace
    $usuario_id = $_GET['usuario_id'];

    // Insertar datos en la tabla correspondiente según el tipo de servicio
    switch ($tipo_servicio) {
        case 'ecogas':
            $numero_cuenta = $_POST['numero_cuenta'];
            $query = "INSERT INTO ecogas (usuariovinculado, precio, mes, anio, numero_de_cuenta) VALUES ('$usuario_id', '$precio', '$mes', '$anio', '$numero_cuenta')";
            break;

        case 'epec':
            $numero_cliente = $_POST['numero_cliente'];
            $numero_contrato = $_POST['numero_contrato'];
            $query = "INSERT INTO epec (usuariovinculado, precio, mes, anio, numero_de_cliente, numero_de_contrato) VALUES ('$usuario_id', '$precio', '$mes', '$anio', '$numero_cliente', '$numero_contrato')";
            break;

        case 'aguas_cordobesas':
            $unidad = $_POST['unidad'];
            $facturacion = $_POST['facturacion'];
            $query = "INSERT INTO aguas_cordobesas (usuariovinculado, precio, mes, anio, unidad, facturacion) VALUES ('$usuario_id', '$precio', '$mes', '$anio', '$unidad', '$facturacion')";
            break;

        default:
            echo "Tipo de servicio no válido.";
            exit;
    }

    // Ejecutar la consulta
    if ($conexion->query($query) === TRUE) {
        echo "Datos de servicio agregados correctamente.";
    } else {
        echo "Error al agregar datos de servicio: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>

<!-- ... (código anterior) ... -->




















<form action="" method="post">
    <label for="tipo_servicio">Tipo de Servicio:</label>
    <select name="tipo_servicio" id="tipo_servicio">
        <option value="ecogas">EcoGas</option>
        <option value="epec">EPEC</option>
        <option value="aguas_cordobesas">Aguas Cordobesas</option>
    </select>
    <br>
    <br>
    <label for="precio">Precio:</label>
    <input type="text" name="precio" required>
    <br>
    <br>
    <label for="mes">Mes:</label>
    <input type="text" name="mes" required>
    <br>
    <br>
    <label for="anio">Año:</label>
    <input type="text" name="anio" required>
    <br>
    <br>
    <!-- Campos específicos para cada servicio -->
    <div id="ecogas_campos" style="display: none;">
        <label for="numero_cuenta">Número de Cuenta (EcoGas):</label>
        <input type="text" name="numero_cuenta">
        <br>
        <br>
    </div>

    <div id="epec_campos" style="display: none;">
        <label for="numero_cliente">Número de Cliente (EPEC):</label>
        <input type="text" name="numero_cliente">
        <br>
        <br>
        <label for="numero_contrato">Número de Contrato (EPEC):</label>
        <input type="text" name="numero_contrato">
        <br>
        <br>
    </div>

    <div id="aguas_cordobesas_campos" style="display: none;">
        <label for="unidad">Unidad (Aguas Cordobesas):</label>
        <input type="text" name="unidad">
        <br>
        <br>

        <label for="facturacion">Facturación (Aguas Cordobesas):</label>
        <input type="text" name="facturacion">
        <br>
        <br>
    </div>

    <script>
        // Mostrar campos específicos según el tipo de servicio seleccionado
        document.getElementById('tipo_servicio').addEventListener('change', function() {
            var tipoServicio = this.value;
            document.getElementById('ecogas_campos').style.display = tipoServicio === 'ecogas' ? 'block' : 'none';
            document.getElementById('epec_campos').style.display = tipoServicio === 'epec' ? 'block' : 'none';
            document.getElementById('aguas_cordobesas_campos').style.display = tipoServicio === 'aguas_cordobesas' ? 'block' : 'none';
        });
    </script>

    <input type="submit" value="Agregar Servicio">
</form>


<a href="veradministracion.php">Volver atras</a>


<br><br><br><br><br><br><br><br><br><br><br><br><br>
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
