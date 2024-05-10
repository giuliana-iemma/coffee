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

if ($cafe){
  //print_r ($cafe);
  $producto = Cafe::idProducto();
} else if ($pasteleria){
  //Podría llamar a esta función obtenerProducto siempre, no?
  $producto = Pasteleria::idProducto();
  //print_r ($pasteleria);
} 
else {
  echo 'No encontramos nada, Sorry';
}
  //  print_r ($producto);
?>