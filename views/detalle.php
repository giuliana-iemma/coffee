<?php
require_once "clases/Cafe.php";
require_once "clases/Pasteleria.php";


//echo '<a class="btn" href="index.php?sec=productos">Volver a productos</a>';
if (isset($_GET ['id'])){
  //Si se pas+o, la obtengo
  $idProducto = $_GET ['id'];}
  //Compruebo que está correctamente cargado el ID
//echo '<p>'. $idProducto . '</p>';

//Obtengo el producto de café
$cafe = Cafe::productoX ($idProducto);
//Obtengo el producto de Pastelería
$pasteleria = Pasteleria::productoX($idProducto);
//Obtengo el producto de Molido

if ($cafe !=null){
    echo '<section id="detalle-producto">';
      echo '<img alt="'. $cafe->getNombre() . '"src="' . $cafe->getImagen(). '">';
    
      echo '<div>';      
          echo '<div>'; 
          
            echo '<h2>' . $cafe->getNombre()  . '</h2>';
            echo '<p>' . $cafe->getDescripcion() . '</p>';
            echo '<p><span>Peso:</span> ' . $cafe->getTamano() . '</p>';
            echo '<p><span>Intensidad:</span> ' . $cafe->getIntensidad() . '</p>';
            echo '<p><span>Origen:</span> ' . $cafe->getOrigen() . '</p>';
            echo '<p><span>Tipo de grano:</span> ' . $cafe->getTipoDeGrano() . '</p>';

          echo '</div>';
        echo '<p>Precio: $' . $cafe->getPrecio() . '</p>';
        echo '<button>Agregar al carrito</button>';
      echo '</div>';
    echo'</section>';
} else if ($pasteleria){
  echo '<section id="detalle-producto">';
    echo '<img alt="'. $pasteleria->getNombre() . '"src="' . $pasteleria->getImagen(). '">';
      echo '<div>'; 
        
        echo '<div>'; 
          echo '<h2>' . $pasteleria->getNombre() . '</h2>';
          echo '<p>' . $pasteleria->getDescripcion() . '</p>';
          echo '<p><span>Peso:</span> ' . $pasteleria->getPeso() . '</p>';
        
          echo '<div class="especificaciones">'; 

            if ($pasteleria->getCeliacos() == true){
                echo '<p class="aptoCeliacos">' . '<span>Apto celíacos</span></p>';
            } 

            if ($pasteleria->getVegano() == true){
                echo '<p class="vegano">' . '<span>Producto vegano</span></p>';
            } 

          echo '</div>';

        echo '</div>';
        echo '<p>Precio: $' . $pasteleria->getPrecio() . '</p>';
        echo '<button>Agregar al carrito</button>';
    echo '</div>';
   echo'</section>';

} else {
  echo '
  <h2>Te pedimos disculpas!</h2>
  <p>En este momento nos encontramos preparando más cosas ricas para sorprenderte. Intenta nuevamente en unos minutos</p>';
}
  //  print_r ($producto);
?>