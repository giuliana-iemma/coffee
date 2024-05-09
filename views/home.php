
<?php

echo'
<div id="banner">
    <h1><span>Mocca Time</span></h1>
    <p>Vení a Mocca Time a disfrutar de una rica merienda!</p>
    <a class="button" href="index.php?sec=contacto">Reservar</a>
</div>
<section id="categorias">
<h2>Categorías</h2>
<a href="index.php?sec=productos">Ver todos los productos</a>

<div class="categoriasBox">
<article class="cardCategoria">
    <h3>Café</h3>
    
    <a href="index.php?sec=filtrados&cat=cafe"><img src="./img/cafe/capuchino-ice.jpg" alt="Capuchino helado"></a>

</article>

<article class="cardCategoria">
    <h3>Pastelería</h3>
    
    <a href="index.php?sec=filtrados&cat=pasteleria"><img src="./img/tortas/cheese-cake.jpg" alt="Cheese Cake"></a>
</article>

<article class="cardCategoria">
   <h3>Café Molido</h3>
    
    <a href="index.php?sec=filtrados&cat=cafe-molido"><img src="./img/molido/brazil.png" alt="Bolsa de café molido"></a>
</article>
</div>
</section>';

echo '<section id="cafeMolido"> 
<h2>Cafe Molido</h2>
<p>Llevate nuestro café de autor para desayunar todos los días en casa</p>
<div>';

require_once "clases/Molido.php";
$catalogo = Molido::catalogoMolido();

echo '</div></section>';




//DUDA es necesario que todo este con echo o puedo poner html normal?
/* 

<div id="banner">
<h1>Mocca Time</h1>
<p>Descripción</p>
<button>Ver productos</button>
</div> */
?>
