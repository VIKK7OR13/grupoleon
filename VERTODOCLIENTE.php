<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Todo del Cliente</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="icon" href="leonpestaña.ico">
    <script src="https://kit.fontawesome.com/db443e806b.js" crossorigin="anonymous"></script>
    <script>
    function confirmarBorrado() {
        return confirm("¿Estás seguro de que quieres borrar este registro?");
    }
</script>

</head>
<body>

<a href="iniciar_sesion.php?logout=true">Cerrar sesión</a>

<?php

if (isset($_GET['usuario_id'])) {
    $usuario_id = $_GET['usuario_id'];

    // Tu código de conexión a la base de datos
    $servidor = "localhost";
    $usuario_bd = "root";
    $contrasena_bd = "";
    $nombre_bd = "usuariosleon";

    $conexion = new mysqli($servidor, $usuario_bd, $contrasena_bd, $nombre_bd);

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Consulta para obtener datos del inmueble vinculado al usuario
    $query_inmueble = "SELECT * FROM inmuebles WHERE usuariovinculado = $usuario_id";
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
                <th></th>
              </tr>";
        echo "<tr>";
        echo "<td>" . $inmueble['DIRECCION'] . "</td>";
        echo "<td>" . $inmueble['CODIGO_POSTAL'] . "</td>";
        echo "<td>" . $inmueble['BARRIO'] . "</td>";
        echo "<td>" . $inmueble['CIUDAD'] . "</td>";
        echo "<td><a href='borrar_registro.php?id=" . $inmueble['ID_INMUEBLES'] . "' onclick='return confirmarBorrado();'>Borrar registro</a></td>";
        echo "</tr>";
        echo "</table>";
    } else {
        echo "<p>No hay datos del inmueble vinculado.</p>";
    }

  



// Consulta para obtener datos del garante vinculado al usuario
$query_garante = "SELECT * FROM garante WHERE usuariovinculado = $usuario_id";
$resultado_garante = $conexion->query($query_garante);

if ($resultado_garante->num_rows > 0) {
    $garante = $resultado_garante->fetch_assoc();

    // Mostrar la información del garante en una tabla
    echo "<h2>Garante Vinculado:</h2>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Nombre y Apellido</th>
            <th>DNI</th>
            <th>Cuil</th>
            <th>Domicilio</th>
            <th>telefono</th>
            <th>correo</th>
            <th>ocupacion</th>
            <th></th>
          </tr>";
    echo "<tr>";
    echo "<td>" . $garante['nombre_y_apellido'] . "</td>";
    echo "<td>" . $garante['dni'] . "</td>";
    echo "<td>" . $garante['cuil'] . "</td>";
    echo "<td>" . $garante['domicilio'] . "</td>";
    echo "<td>" . $garante['telefono'] . "</td>";
    echo "<td>" . $garante['correo'] . "</td>";
    echo "<td>" . $garante['ocupacion'] . "</td>";
    echo "<td><a href='borrar_garante.php?id=" . $garante['idgarante'] . "' onclick='return confirmarBorrado();'>Borrar registro</a></td>";


    // Agrega más campos según sea necesario
    echo "</tr>";
    echo "</table>";
} else {
    echo "<p>No hay datos del garante vinculado.</p>";
}






















// Consulta para obtener datos de la deuda del usuariodeudor
$query_deuda = "SELECT * FROM cuotas_alquiler WHERE USUARIODEUDOR = $usuario_id";
$resultado_deuda = $conexion->query($query_deuda);

if ($resultado_deuda->num_rows > 0) {
    echo "<h2>Cuotas adeudadas:</h2>";
    echo "<div class='row'>";
    $count = 0; // Contador de columnas

    while ($deuda = $resultado_deuda->fetch_assoc()) {
        if ($count % 3 == 0) {
            echo "</div><div class='row'>"; // Inicia una nueva fila cada 3 elementos
        }

        echo "<div class='column'>";
        echo "<table border='1'>";
        echo "<tr>

        <th>Cuotas 1</th>
        <th>Cuotas 2</th>
        <th>Cuotas 3</th>
        <th>Cuotas 4</th>
        <th>Cuotas 5</th>
        <th>Cuotas 6</th>
        <th>Cuotas 7</th>
        <th>Cuotas 8</th>
        <th>Cuotas 9</th>
        <th>Cuotas 10</th>
        <th>Cuotas 11</th>
        <th>Cuotas 12</th></tr>
<tr>";
        echo "<td>" . $deuda['CUOTA_1'] . "</td>";
        echo "<td>" . $deuda['CUOTA_2'] . "</td>";
        echo "<td>" . $deuda['CUOTA_3'] . "</td>";
        echo "<td>" . $deuda['CUOTA_4'] . "</td>";
        echo "<td>" . $deuda['CUOTA_5'] . "</td>";
        echo "<td>" . $deuda['CUOTA_6'] . "</td>";
        echo "<td>" . $deuda['CUOTA_7'] . "</td>";
        echo "<td>" . $deuda['CUOTA_8'] . "</td>";
        echo "<td>" . $deuda['CUOTA_9'] . "</td>";
        echo "<td>" . $deuda['CUOTA_10'] . "</td>";
        echo "<td>" . $deuda['CUOTA_11'] . "</td>";
        echo "<td>" . $deuda['CUOTA_12'] . "</td>";

        echo "</tr><tr>

        <th>Cuotas 13</th>
        <th>Cuotas 14</th>
        <th>Cuotas 15</th>
        <th>Cuotas 16</th>
        <th>Cuotas 17</th>
        <th>Cuotas 18</th>
        <th>Cuotas 19</th>
        <th>Cuotas 20</th>
        <th>Cuotas 21</th>
        <th>Cuotas 22</th>
        <th>Cuotas 23</th>
        <th>Cuotas 24</th>
</tr>        
<tr>";

        echo "<td>" . $deuda['CUOTA_13'] . "</td>";
        echo "<td>" . $deuda['CUOTA_14'] . "</td>";
        echo "<td>" . $deuda['CUOTA_15'] . "</td>";
        echo "<td>" . $deuda['CUOTA_16'] . "</td>";
        echo "<td>" . $deuda['CUOTA_17'] . "</td>";
        echo "<td>" . $deuda['CUOTA_18'] . "</td>";
        echo "<td>" . $deuda['CUOTA_19'] . "</td>";
        echo "<td>" . $deuda['CUOTA_20'] . "</td>";
        echo "<td>" . $deuda['CUOTA_21'] . "</td>";
        echo "<td>" . $deuda['CUOTA_22'] . "</td>";
        echo "<td>" . $deuda['CUOTA_23'] . "</td>";
        echo "<td>" . $deuda['CUOTA_24'] . "</td>";

        echo "</tr><tr>
        






        <th>Cuotas 25</th>
        <th>Cuotas 26</th>
        <th>Cuotas 27</th>
        <th>Cuotas 28</th>
        <th>Cuotas 29</th>
        <th>Cuotas 30</th>
        <th>Cuotas 31</th>
        <th>Cuotas 32</th>
        <th>Cuotas 33</th>
        <th>Cuotas 34</th>
        <th>Cuotas 35</th>
        <th>Cuotas 36</th>
       
              </tr>";
        echo "<tr>";
        
        // Puedes agregar más campos según sea necesario
        

        echo "<td>" . $deuda['CUOTA_25'] . "</td>";
        echo "<td>" . $deuda['CUOTA_26'] . "</td>";
        echo "<td>" . $deuda['CUOTA_27'] . "</td>";
        echo "<td>" . $deuda['CUOTA_28'] . "</td>";
        echo "<td>" . $deuda['CUOTA_29'] . "</td>";
        echo "<td>" . $deuda['CUOTA_30'] . "</td>";
        echo "<td>" . $deuda['CUOTA_31'] . "</td>";
        echo "<td>" . $deuda['CUOTA_32'] . "</td>";
        echo "<td>" . $deuda['CUOTA_33'] . "</td>";
        echo "<td>" . $deuda['CUOTA_34'] . "</td>";
        echo "<td>" . $deuda['CUOTA_35'] . "</td>";
        echo "<td>" . $deuda['CUOTA_36'] . "</td>";
        // Agrega más campos según tu estructura de la tabla "cuotas_alquiler"
        echo "</tr>";
        echo "<td><a href='borrar_cuotas.php?usuariodeudor_id=" . $usuario_id . "' onclick='return confirmarBorrado();'>Borrar todas las cuotas</a></td>";

        echo "</table>";
        echo "</div>";

        $count++;
    }
   

    
    echo "</div>";
} else {
    echo "<p>No hay datos de la deuda del usuariodeudor.</p>";
}


















































$query_ecogas = "SELECT * FROM ecogas WHERE usuariovinculado = $usuario_id";
$resultado_ecogas = $conexion->query($query_ecogas);

if ($resultado_ecogas->num_rows > 0) {
    echo "<h2>Datos de Ecogas:</h2>";
    echo "<div class='row'>";
    $count = 0; // Contador de columnas

    while ($servicio_ecogas = $resultado_ecogas->fetch_assoc()) {
        if ($count % 3 == 0) {
            echo "</div><div class='row'>"; // Inicia una nueva fila cada 3 elementos
        }

        echo "<div class='column'>";
        echo "<table border='1'>";
        echo "<tr>
                <th>ID_ECOGAS</th>
                <th>Número de Cuenta</th>
                <th>Precio</th>
                <th>Mes</th>
                <th>Año</th>
                <th></th>
              </tr>";
        echo "<tr>";
        echo "<td>" . $servicio_ecogas['ID_ECOGAS'] . "</td>";
        echo "<td>" . $servicio_ecogas['NUMERO_DE_CUENTA'] . "</td>";
        echo "<td>" . $servicio_ecogas['PRECIO'] . "</td>";
        echo "<td>" . $servicio_ecogas['MES'] . "</td>";
        echo "<td>" . $servicio_ecogas['ANIO'] . "</td>";
        echo "<td><a href='borrar_ecogas.php?id=" . $servicio_ecogas['ID_ECOGAS'] . "' onclick='return confirmarBorrado();'>Borrar registro</a></td>";
       
        echo "</tr>";
        echo "</table>";
        echo "</div>";

        $count++;
    }

    echo "</div>";
} else {
    echo "<p>No hay datos de Ecogas para este usuario.</p>";
}






























// Consulta para obtener datos de EPEC
$query_epec = "SELECT * FROM epec WHERE usuariovinculado = $usuario_id";
$resultado_epec = $conexion->query($query_epec);

if ($resultado_epec->num_rows > 0) {
    echo "<h2>Datos de EPEC:</h2>";
    echo "<div class='row'>";
    $count = 0; // Contador de columnas

    while ($servicio_epec = $resultado_epec->fetch_assoc()) {
        if ($count % 3 == 0) {
            echo "</div><div class='row'>"; // Inicia una nueva fila cada 3 elementos
        }

        echo "<div class='column'>";
        echo "<table border='1'>";
        echo "<tr>
                <th>ID_EPEC</th>
                <th>Número de Cliente</th>
                <th>Número de Contrato</th>
                <th>Precio</th>
                <th>Mes</th>
                <th>Año</th>
                <th></th>
              </tr>";
        echo "<tr>";
        echo "<td>" . $servicio_epec['ID_EPEC'] . "</td>";
        echo "<td>" . $servicio_epec['NUMERO_DE_CLIENTE'] . "</td>";
        echo "<td>" . $servicio_epec['NUMERO_DE_CONTRATO'] . "</td>";
        echo "<td>" . $servicio_epec['PRECIO'] . "</td>";
        echo "<td>" . $servicio_epec['MES'] . "</td>";
        echo "<td>" . $servicio_epec['ANIO'] . "</td>";
        echo "<td><a href='borrar_epec.php?id=" . $servicio_epec['ID_EPEC'] . "' onclick='return confirmarBorrado();'>Borrar registro</a></td>";

        echo "</tr>";
        echo "</table>";
        echo "</div>";

        $count++;
    }

    echo "</div>";
} else {
    echo "<p>No hay datos de EPEC para este usuario.</p>";
}

// Consulta para obtener datos de Aguas Cordobesas
$query_aguas_cordobesas = "SELECT * FROM aguas_cordobesas WHERE usuariovinculado = $usuario_id";
$resultado_aguas_cordobesas = $conexion->query($query_aguas_cordobesas);

if ($resultado_aguas_cordobesas->num_rows > 0) {
    echo "<h2>Datos de Aguas Cordobesas:</h2>";
    echo "<div class='row'>";
    $count = 0; // Contador de columnas

    while ($servicio_aguas_cordobesas = $resultado_aguas_cordobesas->fetch_assoc()) {
        if ($count % 3 == 0) {
            echo "</div><div class='row'>"; // Inicia una nueva fila cada 3 elementos
        }

        echo "<div class='column'>";
        echo "<table border='1'>";
        echo "<tr>
                <th>ID_AGUAS_CORDOBESAS</th>
                <th>Unidad</th>
                <th>Facturación</th>
                <th>Precio</th>
                <th>Mes</th>
                <th>Año</th>
                <th></th>
              </tr>";
        echo "<tr>";
        echo "<td>" . $servicio_aguas_cordobesas['ID_AGUAS_CORDOBESAS'] . "</td>";
        echo "<td>" . $servicio_aguas_cordobesas['UNIDAD'] . "</td>";
        echo "<td>" . $servicio_aguas_cordobesas['FACTURACION'] . "</td>";
        echo "<td>" . $servicio_aguas_cordobesas['PRECIO'] . "</td>";
        echo "<td>" . $servicio_aguas_cordobesas['MES'] . "</td>";
        echo "<td>" . $servicio_aguas_cordobesas['ANIO'] . "</td>";
        echo "<td><a href='borrar_aguas_cordobesas.php?id=" . $servicio_aguas_cordobesas['ID_AGUAS_CORDOBESAS'] . "' onclick='return confirmarBorrado();'>Borrar registro</a></td>";
        echo "</tr>";
        echo "</table>";
        echo "</div>";

        $count++;
    }

    echo "</div>";
} else {
    echo "<p>No hay datos de Aguas Cordobesas para este usuario.</p>";
}






































    

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    echo "ID de usuario no proporcionado.";
}
?>

<br>
<br>
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