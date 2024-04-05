
<main class="contenedor-sm">
    <form method="POST" class="formulario-auth">
        <h1 class="formulario-auth__titulo">Recuperar Contraseña</h1>
        <p class="formulario-auth__descripcion">Ingresa tu correo para enviarle intrucciones</p>
        <div class="formulario-auth__campo">
            <label for="email" class="formulario-auth__campo--label">Email</label>
            <input type="email" id="email" name="email" class="formulario-auth__campo--input">
        </div>
        <input type="submit" class="formulario-auth__submit" value="Send">
    </form>
    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Tienes una cuenta? Inicia Sesion</a>
        <a href="/registro" class="acciones__enlace">¿No tienes una cuenta?</a>
    </div>
</main>


