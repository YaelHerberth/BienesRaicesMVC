
<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php
    if($resultado){
        $mensaje = mostrarNotificacion(intval($resultado));
         if ($mensaje) { ?>
        <p class="alerta exito"><?= s($mensaje) ?></p>
        <?php } 
    }
    ?>

    <a href="/propiedades/crear" class="boton boton-verde">Nueva Propiedad</a>
    <a href="/vendedores/crear" class="boton boton-azul">Nuevo Vendedor</a>
    <h2>Propiedades</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($propiedades as $propiedad) : ?>
                <tr>
                    <td><?= $propiedad->id ?></td>
                    <td><?= $propiedad->titulo ?></td>
                    <td><img class="imagen-tabla" src="/imagenes/<?= $propiedad->imagen ?>" alt="Casa en la playa"></td>
                    <td><?= $propiedad->precio ?></td>
                    <td>
                        <form class="w-100" method="POST" action="/propiedades/eliminar">
                            <input type="hidden" name="id" value="<?= $propiedad->id ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="propiedades/actualizar?id=<?= $propiedad->id ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <h2>Vendedores</h2>

    <table class="vendedores">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendedores as $vendedor) : ?>
                <tr>
                    <td><?= $vendedor->id ?></td>
                    <td><?= $vendedor->nombre . ' ' . $vendedor->apellido ?></td>
                    <td><?= $vendedor->telefono ?></td>
                    <td>
                        <form class="w-100" method="POST" action="/vendedores/eliminar">
                            <input type="hidden" name="id" value="<?= $vendedor->id ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="vendedores/actualizar?id=<?= $vendedor->id ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>