
<?php

echo'
<div id="banner">
    <h1><span>Mocca Time</span></h1>
    <p>Vení a Mocca Time a disfrutar de una rica merienda!</p>
    <a class="button" href="index.php?sec=contacto">Reservar</a>
</div>


<section id="historia">
<div>
<h2>¿Por qué Mocca Time?</h2>
<p>Imagina entrar y ser recibido por el <em>irresistible aroma del café recién hecho y la dulzura tentadora de nuestros pasteles y bocadillos frescos</em>. En Mocca Time, nos enorgullecemos de ofrecer una selección cuidadosamente elaborada de bebidas calientes y frías, <strong>desde el espresso perfectamente preparado hasta batidos refrescantes</strong>.</p>

<p>Nuestro ambiente es acogedor y moderno, ideal para disfrutar de una tarde tranquila solo o en compañía de amigos. <em>Ya sea que busques un lugar para una cita, una reunión informal o simplemente un momento de relax, Mocca Time es el lugar perfecto.</em> </p>
</div>

</section>
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
    
    <a href="index.php?sec=filtrados&cat=molido"><img src="./img/molido/brazil.png" alt="Bolsa de café molido"></a>
</article>
</div>
</section>



<section>
<div class="creator">
<h2>Alumna</h2>
<img src="img/giuliana.png" alt="developer2">
<p>Giuliana Iemma</p>
<p>31 años</p>
<p>giuliana.iemma@davinci.edu.ar</p>
</div>
</section>
';

/* echo '<section id="cafeMolido"> 
<h2>Cafe Molido</h2>
<p>Llevate nuestro café de autor para desayunar todos los días en casa</p>
<div>';

var_dump ($productos);
echo '<div id="detalle-producto">'; 
echo '<img src= "'. $producto->imagen. '">'; 
echo '<h2>' . $producto->nombre . '</h2>';
echo '<p>' . $producto->descripcion . '</p>';
echo '<p>Origen: ' . $producto->origen . '</p>';
echo '<p>Tamaño: ' . $producto->tamano . '</p>';
echo '<p>Intensidad: ' . $producto->intensidad . '</p>';
echo '<p>Tipo de Grano: ' . $producto->tipoDeGrano . '</p>';
echo '<p>Precio: $' . $producto->precio . '</p>';
echo '</div>';  
echo '</div></section>';  */




//DUDA es necesario que todo este con echo o puedo poner html normal?
/* 

<div id="banner">
<h1>Mocca Time</h1>
<p>Descripción</p>
<button>Ver productos</button>
</div> */
?>
