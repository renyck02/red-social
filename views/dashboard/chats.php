<?php include_once "dashboard.php"; ?>

<div class="contenedor contenedor-app">
    <div class="amigos height-90">
    <h3 class="amigos__texto">
                    Amigos
                </h3>
    </div>

    <div class="chat-activo">
        <div class="chat-activo__mensajes" id="mensajes"></div>
        <div class="chat-activo__mensaje">
            <input type="text" class="chat-activo__mensaje-input" id="mensaje">
            <button class="chat-activo__mensaje-enviar" id="enviarmensaje">Enviar</button>
        </div>
    </div>
</div>