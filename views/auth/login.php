
<main class="contenedor-sm">
    <form method="POST" class="formulario-auth">
        <h1 class="formulario-auth__titulo">Login</h1>
        <div class="formulario-auth__campo">
            <label for="email" class="formulario-auth__campo--label">Correo</label>
            <input type="email" id="email" name="email" class="formulario-auth__campo--input">
        </div>
        <div class="formulario-auth__campo">
            <label for="password" class="formulario-auth__campo--label">Password</label>
            <input type="password" id="password" name="password" class="formulario-auth__campo--input">
        </div>

        <input type="submit" class="formulario-auth__submit" value="Sign in">
    </form>
    <div class="acciones">
        <a href="/olvide" class="acciones__enlace">¿Olvidaste tu contraseña?</a>
        <a href="/registrar" class="acciones__enlace">¿No tienes una cuenta?</a>
    </div>
</main>


