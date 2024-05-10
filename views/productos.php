<?php
require_once "clases/Cafe.php";
require_once "clases/Pasteleria.php";

echo '<section id="catalogoCompleto">';

    echo'<div class="navCategorias">
        <ul>
            <li><a href="index.php?sec=filtrados&cat=cafe">Café</a></li>
            <li><a href="index.php?sec=filtrados&cat=pasteleria">Pastelería</a></li>
            <li><a href="index.php?sec=filtrados&cat=molido">Café Molido</a></li>
            <li><a href="index.php?sec=productos">Ver todos</a></li>       
             </ul>
    </div>';
    echo '<h2>Todos los productos</h2>';

    echo '<div>';
        echo '<div class="productos">'; 
            $catalogoCafes = Cafe::catalogoCafes();
        echo '</div>';
    echo '</div>';

    echo '<div>';
        echo '<div class="productos">'; 
            $catalogoPasteleria = Pasteleria::catalogoPasteleria();
        echo '</div>';
    echo '</div>';
/* 
    echo '<div>';
        echo '<h2>Café Molido</h2>';
        echo '<div id="productos">'; 
          //  $catalogoMolido = Molido::catalogoMolido();
        echo '</div>';
    echo '</div>';
echo '</section>'; */
?>


