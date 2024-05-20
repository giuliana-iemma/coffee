<?php

require_once "clases/Cafe.php";
require_once "clases/Pasteleria.php";
$catalogoCafes = Cafe::productoXcat();



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

if ($catProducto == 'cafe' ){
    echo ' <h1>Cafés</h1>';
    echo '<div>';
        echo '<div class="productos">'; 

        if (!empty($catalogoCafes)) {
            foreach ($catalogoCafes as $producto)
            {
                echo '<article class="card">';
                //detalle.php?id=' . $cafe->id. Esto crea un enlace dinámico que lleva al usuario a la página detalle.php, pasando el ID del producto como parámetro en la URL.
                    echo '<a class="btnDetalle" href="index.php?sec=detalle&id='. $producto->getID().'"><span>Ver</span></a>';
                // echo '<a class="btnDetalle" href="index.php?sec=detalle&id='. $cafe->id .'><span>Ver producto</span></a>';
                    echo '<img alt="'.$producto->getNombre().'" src= "'. $producto->getImagen(). '">';
                        echo '<div class="info-tarjeta">'; 
                            echo '<h3>' . $producto->getNombre() . '</h3>';

                            echo '<p class="descripcion">' . $producto->getDescripcion() . '</p>';
                                echo '<div class="info-extra">'; 
                                    echo '<ul>';
                                    echo '<li>' . '<span>Origen </span>'. $producto->getOrigen() . '</li>';
                                    echo '<li>' . '<span>Tamaño </span>'. $producto->getTamano() . '</li>';
                                    echo '<li>' . '<span>Intensidad </span>'. $producto->getIntensidad() . '</li>';      
                                    echo '<li>' . '<span> Tipo de grano </span>'. $producto->getTipoDeGrano() . '</li>';
                                    echo'</ul>';
                                echo '</div>';

                            echo '<p class="precio">$ ' . $producto->getPrecio() . '</p>';
                            echo '<button '.'>Añadir al carrito</button>';
                        echo '</div>';
                echo '</article>';
            }
        } else {
            echo '<p>Producto no encontrado</p>';   
        }
        echo '</div>';
    echo '</div>';

} else if ($catProducto == 'pasteleria'){
    echo ' <h1>Pastelería</h1>';
    echo '<div>';    
        echo '<div class="productos">'; 
        $catalogoPasteleria = Pasteleria::obtenerPasteleria();

        foreach ($catalogoPasteleria as $pasteleria){
            echo '<article class="card">';
                //detalle.php?id=' . $cafe->id. Esto crea un enlace dinámico que lleva al usuario a la página detalle.php, pasando el ID del producto como parámetro en la URL.
                echo '<a class="btnDetalle" href="index.php?sec=detalle&id='. $pasteleria->getID().'"><span>Ver</span></a>';
               // echo '<a class="btnDetalle" href="index.php?sec=detalle&id='. $cafe->id .'><span>Ver producto</span></a>';
                echo '<img src="' . $pasteleria->getImagen() .'" alt="'. $pasteleria->getNombre() . '">';

                    echo '<div class="info-tarjeta">'; 
                        echo '<h3>' . $pasteleria->getNombre() . '</h3>';

                        echo '<p class="descripcion">' . $pasteleria->getDescripcion() . '</p>';
                            echo '<div class="info-extra">'; 
                                echo '<ul>';
                                echo '<li><span>Peso </span>'. $pasteleria->getPeso() . '</li>';
                                if ($pasteleria->getCeliacos() == true){
                                    echo '<li class="aptoCeliacos">' . '<span>Apto celíacos</span></li>';
                                } 

                                if ($pasteleria->getVegano() == true){
                                    echo '<li class="vegano">' . '<span>Producto vegano</span></li>';
                                } 
                                echo'</ul>';
                            echo '</div>';

                        echo '<p class="precio">$ ' . $pasteleria->getPrecio() . '</p>';
                        echo '<button '.'>Añadir al carrito</button>';
                  //  echo '</div>';
            echo '</article>';
            //echo '</div>';
        }
} else if ($catProducto == 'molido'){
    echo ' <h1>Café Molido</h1>';

    echo '<div>';
    echo '<div class="productos">'; 
    if (!empty($catalogoCafes)) {
        foreach ($catalogoCafes as $producto)
        {
            echo '<article class="card">';
            //detalle.php?id=' . $cafe->id. Esto crea un enlace dinámico que lleva al usuario a la página detalle.php, pasando el ID del producto como parámetro en la URL.
                echo '<a class="btnDetalle" href="index.php?sec=detalle&id='. $producto->getID().'"><span>Ver</span></a>';
            // echo '<a class="btnDetalle" href="index.php?sec=detalle&id='. $cafe->id .'><span>Ver producto</span></a>';
                echo '<img alt="'.$producto->getNombre().'" src= "'. $producto->getImagen(). '">';
                    echo '<div class="info-tarjeta">'; 
                        echo '<h3>' . $producto->getNombre() . '</h3>';

                        echo '<p class="descripcion">' . $producto->getDescripcion() . '</p>';
                            echo '<div class="info-extra">'; 
                                echo '<ul>';
                                echo '<li>' . '<span>Origen </span>'. $producto->getOrigen() . '</li>';
                                echo '<li>' . '<span>Tamaño </span>'. $producto->getTamano() . '</li>';
                                echo '<li>' . '<span>Intensidad </span>'. $producto->getIntensidad() . '</li>';      
                                echo '<li>' . '<span> Tipo de grano </span>'. $producto->getTipoDeGrano() . '</li>';
                                echo'</ul>';
                            echo '</div>';

                        echo '<p class="precio">$ ' . $producto->getPrecio() . '</p>';
                        echo '<button '.'>Añadir al carrito</button>';
                    echo '</div>';
            echo '</article>';
        }
    } else {
        echo '<p>Producto no encontrado</p>';   
    }
   
      

        
} else{
    echo '<h1>Lo sentimos mucho!</h1>
    <p>Esta categoría no está disponible por el momento.</p>';
}

echo'</section>';
echo '<a class="btn" href="index.php?sec=productos">Ver todos los productos</a>';

?>