<?php

require_once "clases/Cafe.php";
require_once "clases/Pasteleria.php";
require_once "clases/Molido.php";

if (isset($_GET ['cat'])){
    //Si se paso, la obtengo
    $catProducto = $_GET ['cat'];}



if ($catProducto == 'cafe'){
    echo '<section>';
    echo '<h2>Cafés</h2>';
    echo '<div id="productos">'; 
    $catalogoCafes = Cafe::catalogoCafes();
    echo '</div>';
    echo '</section>';
} else if ($catProducto == 'pasteleria'){
    echo '<section>';
    echo '<h2>Pastelería</h2>';
    
    echo '<div id="productos">'; 
    $catalogoPasteleria = Pasteleria::catalogoPasteleria();
    echo '</section>';
} else if ($catProducto == 'cafe-molido'){
    echo '<section>';
echo '<h2>Café Molido</h2>';
echo '<div id="productos">'; 
$catalogoMolido = Molido::catalogoMolido();
echo '</div>';
echo '</section>';
} else{
    echo '<h2>Lo sentimos mucho!</h2>
    <p>Esta categoría no está disponible por el momento.</p>';
}

echo '<a class="btn" href="index.php?sec=productos">Ver todos los productos</a>';

?>