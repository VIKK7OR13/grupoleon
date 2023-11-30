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
        <label for="tipo_usuario"><h2> Seleccionar tipo de cliente: </h2></label>
        
        <select name="tipo_usuario" id="tipo_usuario">
            <option value="locatario">Locatario</option>
            <option value="locador">Locador</option>
        </select>
        
        <br> <br>
        <input type="submit" value="Mostrar usuarios">
    </form>




    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tipo_usuario = $_POST['tipo_usuario'];

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


        

        // Consulta para obtener información detallada de usuarios del tipo seleccionado
        $query = "SELECT * FROM " . $tipo_usuario;

        // Ejecutar la consulta
        $resultado = $conexion->query($query);

        if ($resultado && $resultado->num_rows > 0) {
            echo "<h2>Usuarios de tipo $tipo_usuario:</h2>";
            echo "<table border='1'>";
            echo "<tr>
            <th>ID</th>
            <th>Nombre y Apellido</th>
            <th>DNI</th>
            <th>CUIT</th>
            <th>DOMICILIO</th>
            <th>TELEFONO</th>
            <th>MAIL</th>
            <th>OCUPACION</th>
            <th></th>
            </tr>
            ";
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila['ID_' . strtoupper($tipo_usuario)] . "</td>";
                echo "<td>" . $fila['NOMBRE_Y_APELLIDO'] . "</td>";
                echo "<td>" . $fila['DNI'] . "</td>";
                echo "<td>" . $fila['CUIL'] . "</td>";
                echo "<td>" . $fila['DOMICILIO'] . "</td>";
                echo "<td>" . $fila['TELEFONO'] . "</td>";
                echo "<td>" . $fila['CORREO'] . "</td>";
                echo "<td>" . $fila['OCUPACION'] . "</td>";

            
                echo "<td>";
             

               
echo '<a href="agregardeuda.php?usuario_id=' . $fila['ID_' . strtoupper($tipo_usuario)] . '">Agregar Deuda</a>';
echo '<br>';
echo '<br>';               
echo '<a href="agregar_garante.php?usuario_id=' . $fila['ID_' . strtoupper($tipo_usuario)] . '">Asignar garante</a>';
echo '<br>';
echo '<br>';
echo '<a href="agregar_servicio.php?usuario_id=' . $fila['ID_' . strtoupper($tipo_usuario)] . '">Agregar deuda servicio</a>';
echo '<br>';
echo '<br>';
echo '<a href="agregar_inmuebles.php?usuario_id=' . $fila['ID_' . strtoupper($tipo_usuario)] . '">Agregar inmueble</a>';
echo '<br>';
echo '<br>';
echo '<a href="VERTODOCLIENTE.php?usuario_id=' . $fila['ID_' . strtoupper($tipo_usuario)] . '">VER TODO</a>';
echo '<br>';
echo '<br>';


               echo "</td>";


                echo "</tr>";
            }
            echo "</table>";
            echo "<br>";
            echo "<br>";

        } else {
            echo "No se encontraron usuarios de tipo $tipo_usuario.";
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
    }
    ?>

<br><br><br><br><br><br><br><br><br><br><br><br>

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





