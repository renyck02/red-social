<main class="contenedor-sm">
    <form method="POST" class="formulario-auth">
        <h1 class="formulario-auth__titulo">Registrate</h1>

        <div class="formulario-auth__campo">
            <label for="nombre" class="formulario-auth__campo--label">Nombre</label>
            <input type="text" id="text" name="nombre" class="formulario-auth__campo--input">
        </div>

        <div class="formulario-auth__campo">
            <label for="nickname" class="formulario-auth__campo--label">Nickname</label>
            <input type="text" id="nickname" name="nickname" class="formulario-auth__campo--input">
        </div>

        <div class="formulario-auth__campo">
            <label for="email" class="formulario-auth__campo--label">Email</label>
            <input type="email" id="email" name="email" class="formulario-auth__campo--input">
        </div>

        <div class="formulario-auth__campo">
            <label for="numero" class="formulario-auth__campo--label">Numero</label>
            <input type="number" id="numero" name="numero" class="formulario-auth__campo--input" >
        </div>

        <div class="formulario-auth__campo">
            <label for="nacimiento" class="formulario-auth__campo--label">Fecha nacimiento</label>
            <input type="date" id="nacimiento" name="fecha_de_nacimiento" class="formulario-auth__campo--input" >
        </div>

        <div class="formulario-auth__campo">
            <label for="password" class="formulario-auth__campo--label">Password</label>
            <input type="password" id="password" name="password" class="formulario-auth__campo--input">
        </div>

        <div class="formulario-auth__campo">
            <label for="password2" class="formulario-auth__campo--label">Repite tu password</label>
            <input type="password" id="password2" name="password2" class="formulario-auth__campo--input">
        </div>

        <input type="submit" class="formulario-auth__submit" value="Sign in">
    </form>
    <div class="acciones">
        <a href="/olvide" class="acciones__enlace">¿Olvidaste tu contraseña?</a>
        <a href="/registro" class="acciones__enlace">¿No tienes una cuenta?</a>
    </div>
</main>

