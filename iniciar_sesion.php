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



<?php
session_start();

// Verificar si se ha enviado el parámetro logout y cerrar sesión si es así
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    // Eliminar todas las variables de sesión
    session_unset();

    // Destruir la sesión
    session_destroy();

    // Redirigir a la página de inicio de sesión o a donde desees después de cerrar sesión
    header("Location: index.html");
    exit;
}

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





    $query = "SELECT u.CONTRASENA, u.ID_LOCADOR, 'LOCADOR' AS tipo_usuario, i.*
  FROM locador u
  LEFT JOIN inmuebles i ON u.ID_LOCADOR = i.usuariovinculado
WHERE u.NOMBRE_Y_APELLIDO = '$nombre_usuario' 
  UNION 
    SELECT u.CONTRASENA, u.ID_LOCATARIO, 'LOCATARIO' AS tipo_usuario, i.*
   FROM locatario u
   LEFT JOIN inmuebles i ON u.ID_LOCATARIO = i.usuariovinculado
   WHERE u.NOMBRE_Y_APELLIDO = '$nombre_usuario'";





  





   

    $resultado = $conexion->query($query);


    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $contrasena_hash_obtenido_de_la_base_de_datos = $fila['CONTRASENA'];
        $id_usuario = $fila['ID_LOCADOR']; // Puedes usar ID_LOCATARIO si es un locatario
    
        // Comprobar si la contraseña es válida
        if (password_verify($contrasena, $contrasena_hash_obtenido_de_la_base_de_datos)) {
            echo "Inicio de sesión exitoso.";
    
            // Consulta para obtener datos del usuario, cuotas de alquiler e inmueble
            $query_datos_usuario = "SELECT locador.*
                FROM locador 
                WHERE locador.ID_LOCADOR = $id_usuario 
                UNION 
                SELECT locatario.*
                FROM locatario 
                WHERE locatario.ID_LOCATARIO = $id_usuario";
    
            $resultado_datos_usuario = $conexion->query($query_datos_usuario);
    
            if ($resultado_datos_usuario->num_rows > 0) {
                $datos_usuario = $resultado_datos_usuario->fetch_assoc();
    
                // Mostrar todos los datos del usuario
               include 'user_details.php'; // Incluir el archivo con la estructura HTML
    
                // Obtener el ID del usuario
                $id_usuario = $datos_usuario['ID_LOCADOR']; // Puedes usar ID_LOCATARIO si es un locatario
    









                // Consultar datos de cuotas de alquiler del usuario
$query_cuotas_alquiler = "SELECT * FROM cuotas_alquiler WHERE USUARIODEUDOR = $id_usuario";
$resultado_cuotas_alquiler = $conexion->query($query_cuotas_alquiler);

// Verificar si hay datos de cuotas de alquiler
if ($resultado_cuotas_alquiler->num_rows > 0) {
    echo "<h2>Cuotas de Alquiler:</h2>";

    // Obtener todas las cuotas
    $cuotas = $resultado_cuotas_alquiler->fetch_assoc();

    echo "<table border='1'>";


    // Mostrar las cuotas en tres columnas de 12 con etiquetas y montos
    for ($i = 1; $i <= 12; $i++) {
        echo "<tr>";
        
        // Mostrar etiquetas y montos de cuotas para cada columna
        for ($j = $i; $j <= 36; $j += 12) {
            echo "<td>";
            echo "Cuota $j: $ " . $cuotas['CUOTA_' . $j];
            echo "</td>";
        }

        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No hay datos de cuotas de alquiler.</p>";
}












               
                
            



// Consulta para obtener datos del inmueble vinculado al usuario
$query_inmueble = "SELECT * FROM inmuebles WHERE usuariovinculado = $id_usuario";
$resultado_inmueble = $conexion->query($query_inmueble);

if ($resultado_inmueble->num_rows > 0) {
    $inmueble = $resultado_inmueble->fetch_assoc();

    // Mostrar la fila del inmueble en la tabla
    echo "<h2>Inmueble Vinculado:</h2>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Dirección</th>
            <th>Código Postal</th>
            <th>Barrio</th>
            <th>Ciudad</th>
          </tr>";
    echo "<tr>";
    echo "<td>" . $inmueble['DIRECCION'] . "</td>";
    echo "<td>" . $inmueble['CODIGO_POSTAL'] . "</td>";
    echo "<td>" . $inmueble['BARRIO'] . "</td>";
    echo "<td>" . $inmueble['CIUDAD'] . "</td>";
    echo "</tr>";
    echo "</table>";
} else {
    echo "<p>No hay datos del inmueble vinculado.</p>";
}

























// Consultar datos del garante vinculado al usuario
$query_garante = "SELECT * FROM garante WHERE usuariovinculado = $id_usuario";
$resultado_garante = $conexion->query($query_garante);

if ($resultado_garante->num_rows > 0) {
    echo "<h2>Garante Vinculado:</h2>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Nombre y Apellido</th>
            <th>DNI</th>
            <th>CUIL</th>
            <th>Domicilio</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Ocupación</th>
          </tr>";

    while ($fila_garante = $resultado_garante->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila_garante['nombre_y_apellido'] . "</td>";
        echo "<td>" . $fila_garante['dni'] . "</td>";
        echo "<td>" . $fila_garante['cuil'] . "</td>";
        echo "<td>" . $fila_garante['domicilio'] . "</td>";
        echo "<td>" . $fila_garante['telefono'] . "</td>";
        echo "<td>" . $fila_garante['correo'] . "</td>";
        echo "<td>" . $fila_garante['ocupacion'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No hay datos del garante vinculado.</p>";
}

  
  







         



















































// ... (código anterior) ...

// Consultar datos de ECOGAS vinculados al usuario
$query_ecogas = "SELECT * FROM ecogas WHERE usuariovinculado = $id_usuario";
$resultado_ecogas = $conexion->query($query_ecogas);

if ($resultado_ecogas->num_rows > 0) {
    echo "<h2>ECOGAS:</h2>";
    echo "<table border='1'>";
    echo "<tr>
            
            <th>Precio $</th>
            <th>Mes</th>
            <th>Año</th>
            <th>Número de Cuenta</th>
          </tr>";

    while ($fila_ecogas = $resultado_ecogas->fetch_assoc()) {
        echo "<tr>";
        
        echo "<td>$" . $fila_ecogas['PRECIO'] . "</td>";
        echo "<td>" . $fila_ecogas['MES'] . "</td>";
        echo "<td>" . $fila_ecogas['ANIO'] . "</td>";
        echo "<td>" . $fila_ecogas['NUMERO_DE_CUENTA'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No hay datos de ECOGAS vinculados.</p>";
}

// Consultar datos de AGUAS_CORDOBESAS vinculados al usuario
$query_aguas_cordobesas = "SELECT * FROM aguas_cordobesas WHERE usuariovinculado = $id_usuario";
$resultado_aguas_cordobesas = $conexion->query($query_aguas_cordobesas);

if ($resultado_aguas_cordobesas->num_rows > 0) {
    echo "<h2>AGUAS CORDOBESAS:</h2>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Precio</th>
            <th>Mes</th>
            <th>Año</th>
            <th>Unidad</th>
            <th>Facturación</th>
          </tr>";

    while ($fila_aguas_cordobesas = $resultado_aguas_cordobesas->fetch_assoc()) {
        echo "<tr>";
        echo "<td>$" . $fila_aguas_cordobesas['PRECIO'] . "</td>";
        echo "<td>" . $fila_aguas_cordobesas['MES'] . "</td>";
        echo "<td>" . $fila_aguas_cordobesas['ANIO'] . "</td>";
        echo "<td>" . $fila_aguas_cordobesas['UNIDAD'] . "</td>";
        echo "<td>" . $fila_aguas_cordobesas['FACTURACION'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No hay datos de AGUAS CORDOBESAS vinculados.</p>";
}

// Consultar datos de EPEC vinculados al usuario
$query_epec = "SELECT * FROM epec WHERE usuariovinculado = $id_usuario";
$resultado_epec = $conexion->query($query_epec);

if ($resultado_epec->num_rows > 0) {
    echo "<h2>EPEC:</h2>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Precio</th>
            <th>Mes</th>
            <th>Año</th>
            <th>Número de Cliente</th>
            <th>Número de Contrato</th>
          </tr>";

    while ($fila_epec = $resultado_epec->fetch_assoc()) {
        echo "<tr>";
        echo "<td> $" . $fila_epec['PRECIO'] . "</td>";
        echo "<td>" . $fila_epec['MES'] . "</td>";
        echo "<td>" . $fila_epec['ANIO'] . "</td>";
        echo "<td>" . $fila_epec['NUMERO_DE_CLIENTE'] . "</td>";
        echo "<td>" . $fila_epec['NUMERO_DE_CONTRATO'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No hay datos de EPEC vinculados.</p>";
}











































































                if ($datos_usuario['DNI'] == 34989754) {
                    // Redirigir a la página para cargar deudas
                    header("Location: veradministracion.php");
                    exit; 
                }
            }
        } else {
            echo "Nombre de usuario o contraseña incorrectos.";
        }
    } else {
        echo "No se encontraron datos del usuario.";
    }
    
    $conexion->close(); // Cerrar la conexión a la base de datos
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