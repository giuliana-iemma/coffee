
<?php
echo '
    <section id="contacto">
        <h2>Reservá una mesa</h2>

        <form action="formulario.php"  method="post">
            <label>Nombre</label>
            <input required  type="text" name="nombre">

            <label>Apellido</label>
            <input  required type="text" name="apellido">

            <label>Correo electrónico</label>
            <input  required type="email" name="email">

            <label>Apellido</label>
            <input  required type="date" name="fecha">

            <label>Sucursal</label>
            <select  required name="sucursal">
                <option value="" >Selecciona una sucursal</option>
                <option value="Caballito">Microcentro</option>
                <option value="Palermo">Palermo</option>
                <option value="Devoto">Devoto</option>
            </select>

            <input type="submit" value="Enviar">
        </form>
    </section>
'

?>
