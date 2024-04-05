
<main class="contenedor-sm">
    <form method="POST" class="formulario-auth">
        <h1 class="formulario-auth__titulo">Reestablecer Contraseña</h1>
        <p class="formulario-auth__descripcion">Escriba su contraseña nueva dos veces</p>
        <div class="formulario-auth__campo">
            <label for="password" class="formulario-auth__campo--label">Password</label>
            <input type="password" id="password" name="password" class="formulario-auth__campo--input">
        </div>
        
        <div class="formulario-auth__campo">
            <label for="password" class="formulario-auth__campo--label">Repite tu password</label>
            <input type="password" id="password" name="password2" class="formulario-auth__campo--input">
        </div>

        <input type="submit" class="formulario-auth__submit" value="Save">
    </form>
    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Tienes una cuenta? Inicia Sesion</a>
        <a href="/registro" class="acciones__enlace">¿No tienes una cuenta?</a>
    </div>
</main>


