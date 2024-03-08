<h1 class="nombre-pagina">Actualizar Servicio</h1>
<p class="descripcion-pagina">Modifica los valores del formualario</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form method="POST" class="formulario"> <!-- Cuado enviamos parametros por la url quitqmos el action  para que este no pierda la referencia, al no tener el action se envia la slocitud a la misma pagina-->
    <?php
        include_once __DIR__ . '/formulario.php'
    ?>
    <input type="submit" class="boton" value="Actualizar Servicio">
</form>
