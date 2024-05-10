<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocca Time</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
    <header>
        <nav>
        <ul>
            <li><a href="index.php?sec=home">Inicio</a></li>
            <li><a href="index.php?sec=productos">Productos</a></li>
            <li><a href="index.php?sec=contacto">Contacto</a></li>
        </ul></nav>
    </header>

    <main>
        <?PHP 
            // Guardo en la variable vista el valor de sec tomado desde la  URL  
            // $vista = $_GET['sec']; 
            $seccion = isset($_GET ['sec']) ? $_GET['sec'] : 'home';

            // Proporciono una lista de variables válidas para evitar que el usuario pueda cargar otras vistas 
            $secciones_validas = ['home', 'formulario','locales', 'contacto', 'productos', 'detalle', 'filtrados'];

            // in_array() comprueba si existe un valor en el array 
            if (!in_array($seccion, $secciones_validas)){
                $vista = '404';
            } else {
                $vista = $seccion;
            }

        /* Le proporciono el link para que según el sec de la url, se abra la sección correpondiente */
            require_once "views/$vista.php"
        ?>
        
        
    </main>

    <footer>
   

        <div class=redes>
            <h2>Contacto</h2>
            <ul>
                <li><a href="#"><span>Instagram</span></a></li>
                <li><a href="#"><span>Facebook</span></a></li>
                <li><a href="#"><span>Whatsapp</span></a></li>
            </ul>
        </div>

        <div>
        <h2>Locales</h2>
            <ul>
                <li>Av. Callao 1256, CABA</li>
                <li> Florida 500, CABA</li>
                <li>Figueroa Alcorta 2300, CABA</li>  
            </ul>
        </div>
    </footer>
    </div>

</body>
</html>