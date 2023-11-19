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
// agregardeuda.php

// Verifica si está establecido el parámetro usuario_id
if (isset($_GET['usuario_id'])) {
    $usuario_id = $_GET['usuario_id'];

    // Ahora puedes usar $usuario_id para obtener la información del usuario desde la base de datos
    // Agrega tu lógica de conexión y consulta a la base de datos aquí
    // ...

    // Ejemplo: Mostrar el ID del usuario en la página
    echo "<h2>Agregar deuda para el usuario con ID: $usuario_id</h2>";

?>

    <a href="iniciar_sesion.php?logout=true">Cerrar sesión</a>

    <h1>Panel del Administrador</h1>

    <h3>controlador de usuario</h3>

    



    <table>
    <form action="validaciondeuda.php" method="post">
    <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">



        <h2>Agregar deuda</h2>
        

        <tr><td>
        <label for="cuota1">cuota 1</label>
        <input type="text" name="cuota1" id="cuota1"><br><br>
        <label for="cuota2">cuota 2</label>
        <input type="text" name="cuota2" id="cuota2"><br><br>
        <label for="cuota3">cuota 3</label>
        <input type="text" name="cuota3" id="cuota3"><br><br>
        <label for="cuota1">cuota 4</label>
        <input type="text" name="cuota4" id="cuota4"><br><br>
        <label for="cuota1">cuota 5</label>
        <input type="text" name="cuota5" id="cuota5"><br><br>
        <label for="cuota1">cuota 6</label>
        <input type="text" name="cuota6" id="cuota6"><br><br>
        <label for="cuota1">cuota 7</label>
        <input type="text" name="cuota7" id="cuota7"><br><br>
        <label for="cuota1">cuota 8</label>
        <input type="text" name="cuota8" id="cuota8"><br><br>
        <label for="cuota1">cuota 9</label>
        <input type="text" name="cuota9" id="cuota9"><br><br>
        <label for="cuota1">cuota 10</label>
        <input type="text" name="cuota10" id="cuota10"><br><br>
        <label for="cuota1">cuota 11</label>
        <input type="text" name="cuota11" id="cuota11"><br><br>
        <label for="cuota1">cuota 12</label>
        <input type="text" name="cuota12" id="cuota12"><br><br>
</td>
<td>
        <label for="cuota1">cuota 13</label>
        <input type="text" name="cuota13" id="cuota13"><br><br>
        <label for="cuota1">cuota 14</label>
        <input type="text" name="cuota14" id="cuota14"><br><br>
        <label for="cuota1">cuota 15</label>
        <input type="text" name="cuota15" id="cuota15"><br><br>
        <label for="cuota1">cuota 16</label>
        <input type="text" name="cuota16" id="cuota16"><br><br>
        <label for="cuota1">cuota 17</label>
        <input type="text" name="cuota17" id="cuota17"><br><br>
        <label for="cuota1">cuota 18</label>
        <input type="text" name="cuota18" id="cuota18"><br><br>
        <label for="cuota1">cuota 19</label>
        <input type="text" name="cuota19" id="cuota19"><br><br>
        <label for="cuota1">cuota 20</label>
        <input type="text" name="cuota20" id="cuota20"><br><br>
        <label for="cuota1">cuota 21</label>
        <input type="text" name="cuota21" id="cuota21"><br><br>
        <label for="cuota1">cuota 22</label>
        <input type="text" name="cuota22" id="cuota22"><br><br>
        <label for="cuota1">cuota 23</label>
        <input type="text" name="cuota23" id="cuota23"><br><br>
        <label for="cuota1">cuota 24</label>
        <input type="text" name="cuota24" id="cuota24"><br><br>
</td>
<td>
        <label for="cuota1">cuota 25</label>
        <input type="text" name="cuota25" id="cuota25"><br><br>
        <label for="cuota1">cuota 26</label>
        <input type="text" name="cuota26" id="cuota26"><br><br>
        <label for="cuota1">cuota 27</label>
        <input type="text" name="cuota27" id="cuota27"><br><br>
        <label for="cuota1">cuota 28</label>
        <input type="text" name="cuota28" id="cuota28"><br><br>
        <label for="cuota1">cuota 29</label>
        <input type="text" name="cuota29" id="cuota29"><br><br>
        <label for="cuota1">cuota 30</label>
        <input type="text" name="cuota30" id="cuota30"><br><br>
        <label for="cuota1">cuota 31</label>
        <input type="text" name="cuota31" id="cuota31"><br><br>
        <label for="cuota1">cuota 32</label>
        <input type="text" name="cuota32" id="cuota32"><br><br>
        <label for="cuota1">cuota 33</label>
        <input type="text" name="cuota33" id="cuota33"><br><br>
        <label for="cuota1">cuota 34</label>
        <input type="text" name="cuota34" id="cuota34"><br><br>
        <label for="cuota1">cuota 35</label>
        <input type="text" name="cuota35" id="cuota35"><br><br>
        <label for="cuota1">cuota 36</label>
        <input type="text" name="cuota36" id="cuota36"><br><br>
</td>
</tr>

<tr><td colspan="3">
        <input type="submit" value="Agregar montos">
</td ></tr>


    </form>
    

</table>








    <a href="veradministracion.php">Volver atras</a>

<?php
    echo '<footer>
        <div class="footer-section">
            <h3>SÍGUENOS</h3>
            <br>
            <p><i class="fa-brands fa-facebook fa-beat-fade fa-2xl"></i> &nbsp;
                <i class="fa-brands fa-linkedin fa-beat-fade fa-2xl"></i> &nbsp; 
                <a href="https://instagram.com/grupoleon.inmobiliaria?igshid=MTUwN2J1dDl3OWp0aA==">           
                    <i class="fa-brands fa-instagram fa-beat-fade fa-2xl"></i> 
                </a>
            </p>
        </div>
        <div class="footer-section">
            <h3>Sección 2</h3>
            <p>Contenido de la sección 2 del pie de página.</p>
        </div>
        <div class="footer-section">
            <h3>CONTACTO</h3>
            <i class="fa-regular fa-envelope fa-lg"></i> &nbsp;
            <a href="mailto:info@passadoreyasoc.com.ar">grupoleoncba@gmail.com</a>
            <p> <i class="fa-brands fa-whatsapp fa-lg" style="color: #3aaa0e;"></i>
                +54 9 351 3469310
            </p>
            <p><i class="fa-solid fa-location-dot fa-lg"></i> &nbsp; San Martin 165. 2 piso of 206. Còrdoba,Argentina</p>
            <a href="https://maps.app.goo.gl/j6idanoqvvZas7U68" target="_blank">Ver en Mapa</a>
        </div>
        <div class="footer-row">
            <p>&copy; 2023 Grupo Leon. Todos los derechos reservados.</p>
        </div>
    </footer>';
} else {
    // Redirige o maneja el caso en el que usuario_id no está establecido
    echo "Usuario no especificado.";
}
?>

</body>

</html>
