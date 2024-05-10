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

    //Obtengo el array devuelto por la función obtenerCafes
    $listaCafes = Cafe::obtenerCafes();
    //Recorro el array para armar cada card. Coloco los Getters para obtener los datos

    foreach ($listaCafes as $cafe){
        // print_r ($cafe);
        echo '<article class="card">';
            //detalle.php?id=' . $cafe->id. Esto crea un enlace dinámico que lleva al usuario a la página detalle.php, pasando el ID del producto como parámetro en la URL.
            echo '<a class="btnDetalle" href="index.php?sec=detalle&id='. $cafe->getID().'"><span>Ver</span></a>';
            // echo '<a class="btnDetalle" href="index.php?sec=detalle&id='. $cafe->id .'><span>Ver producto</span></a>';
            echo '<img alt="'.$cafe->getNombre().'"src= "'. $cafe->getImagen(). '">';
                echo '<div class="info-tarjeta">'; 
                    echo '<h2>' . $cafe->getNombre() . '</h2>';

                    echo '<p class="descripcion">' . $cafe->getDescripcion() . '</p>';
                        echo '<div class="info-extra">'; 
                            echo '<ul>';
                            echo '<li>' . '<span>Origen </span>'. $cafe->getOrigen() . '</li>';
                            echo '<li>' . '<span>Tamaño </span>'. $cafe->getTamano() . '</li>';
                            echo '<li>' . '<span>Intensidad </span>'. $cafe->getIntensidad() . '</li>';      
                            echo '<li>' . '<span> Tipo de grano </span>'. $cafe->getTipoDeGrano() . '</li>';
                            echo'</ul>';
                        echo '</div>';

                    echo '<p class="precio">$ ' . $cafe->getPrecio() . '</p>';
                    echo '<button '.'>Añadir al carrito</button>';
                echo '</div>';
        echo '</article>';
    }

    echo '</div>';
    
        echo '</div>';

    echo '<div>';
        echo '<div class="productos">'; 
        $listaPasteleria = Pasteleria::obtenerPasteleria();

        foreach ($listaPasteleria as $pasteleria){
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
                   // echo '</div>';
            echo '</article>';
        }
           // $catalogoPasteleria = Pasteleria::catalogoPasteleria();
        echo '</div>';
    echo '</div>';
echo '</section>'
?>


