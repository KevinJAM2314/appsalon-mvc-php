<h1 class="nombre-pagina">Olvide Password</h1>
<p class="descripcion-pagina">Reestablece tu password escribiendo tu email a continuación</p>

<?php 
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form action="/olvide" class="formulario" method="POST">
    <div class="campo">
        <label for="email">E-mail</label>
        <input 
            type="email"
            id="email"
            name="email"
            placeholder="Tu email"
        >
    </div>

    <input type="submit" class="boton" value="Enviar instrucciones">
</form>

<div class="acciones">
    <a href="/">Ya tienes una cuenta? Inicia sesión</a>
    <a href="/crear-cuenta">Aun no tienes una cuenta? Crear una</a>
</div>