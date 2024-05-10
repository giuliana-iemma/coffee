<?php

require_once "clases/Cafe.php";
require_once "clases/Pasteleria.php";



if (isset($_GET ['cat'])){
    //Si se paso, la obtengo
    $catProducto = $_GET ['cat'];}
    
    echo'<div class="navCategorias">
    <ul>
        <li><a href="index.php?sec=filtrados&cat=cafe">Café</a></li>
        <li><a href="index.php?sec=filtrados&cat=pasteleria">Pastelería</a></li>
        <li><a href="index.php?sec=filtrados&cat=molido">Café Molido</a></li>
        <li><a href="index.php?sec=productos">Ver todos</a></li>       
         </ul>
    </div>';

echo '<section id= "filtrados">'; 

if ($catProducto == 'cafe'){
   echo ' <h2>Cafés</h2>';
    echo '<div>';
    echo '<div class="productos">'; 
    $catalogoCafes = Cafe::catProducto();
    echo '</div>';
    echo '</div>';
} else if ($catProducto == 'pasteleria'){
    echo ' <h2>Pastelería</h2>';

    echo '<div>';    
    echo '<div class="productos">'; 
    $catalogoPasteleria = Pasteleria::catalogoPasteleria();
    echo '</div>';
} else if ($catProducto == 'molido'){
    echo ' <h2>Café Molido</h2>';

    echo '<div>';
   echo '<div class="productos">'; 
    $catalogoCafes = Cafe::catProducto();
    echo '</div>';
    echo '</div>';
} else{
    echo '<h2>Lo sentimos mucho!</h2>
    <p>Esta categoría no está disponible por el momento.</p>';
}

echo'</section>';
echo '<a class="btn" href="index.php?sec=productos">Ver todos los productos</a>';

?>