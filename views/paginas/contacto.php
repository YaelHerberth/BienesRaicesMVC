<?php
$respuesta = $_GET['respuesta'] ?? null;

if (intval($respuesta) == 1) {
    echo "<script>alertEmailSuccess();</script>";
} elseif (intval($respuesta) == 2) {
    echo "<script>alertEmailError();</script>";
}

?>

<main class="contenedor seccion">
    <h1 class="m-5">Contacto</h1>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen de contacto">
    </picture>

    <h2 class="m-5">Llene el formulario de contacto</h2>

    <form class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Información personal</legend>

            <label for="nombre">Nombre:</label>
            <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>

            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la Propiedad</legend>

            <label for="opciones">Vende o Compra</label>

            <select name="contacto[tipo]" id="opciones" required>
                <option value="" disabled selected>--Seleccione--</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>

            <input type="number" id="presupuesto" placeholder="Tu Precio o Presupuesto" name="contacto[precio]" required>
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado:</p>
            <div class="forma-contacto">
                <label for="">Telefono</label>
                <input type="radio" value="Telefono" id="contactar-telefono" name="contacto[contacto]" required>

                <label for="">E-Mail</label>
                <input type="radio" value="Email" id="contactar-email" name="contacto[contacto]" required>
            </div>

            <div id="contacto">

            </div>

            
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>