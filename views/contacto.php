
<?php
echo '
    <section id="contacto">
        <h2>Reservá una mesa</h2>

        <form action="formulario.php"  method="post">
            <label>Nombre</label>
            <input type="text" name="nombre">

            <label>Apellido</label>
            <input type="text" name="apellido">

            <label>Correo electrónico</label>
            <input type="email" name="email">

            <label>Apellido</label>
            <input type="date" name="fecha">

            <label>Sucursal</label>
            <select name="sucursal">
                <option value="Caballito">Caballito</option>
                <option value="Palermo">Palermo</option>
                <option value="Devoto">Devoto</option>
            </select>

            <input type="submit" value="Enviar">
        </form>
    </section>
'

?>
