<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<a href="iniciar_sesion.php?logout=true">Cerrar sesión</a>



<br>
<br>
    <div class="flex-container">
        <?php
        foreach ($datos_usuario as $clave => $valor) {
            if ($clave !== 'CONTRASENA') {
                echo '<div class="user-data">';
                echo '<strong>' . $clave . ':</strong> ' . $valor . '<br>';
                echo '</div>';
            }
        }
        ?>
    </div>



    
</body>
</html>
