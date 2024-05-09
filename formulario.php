<?php



//Le agrego los datos obtenidos del form a una variable
$datos_formulario = $_POST;

//DUDA: POrque hacemos este if?
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//Almaceno cada dato en una variable
$nombre = $_POST ['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$fecha = $_POST['fecha'];
$sucursal = $_POST['sucursal'];

echo '<h1>Reserva realizada!</h1>';
echo '<p>A nombre de: ' . $nombre . ' '. $apellido .'</p>';
echo '<p>Correo electrónico: ' . $email . '</p>';
echo '<p>Fecha de la reserva: ' . $fecha . '</p>';
echo '<p>Sucursal: ' . $sucursal . '</p>';


}

?>