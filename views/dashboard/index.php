<?php include_once "dashboard.php"; ?>

<div class="contenedor contenedor-app">
    <div class="contenedor-izquierda">
        <div class="amigos">
            <div class="amigos-contenedor-superior">
                <h3 class="amigos__texto">
                    Amigos
                </h3>
                <div class="flex">

                    <div class="amigos-imagen__busqueda" id="campana">
                        <picture>
                            <source src="/build/img/campana.webp" type="image/webp">
                            <source src="/build/img/campana.avif" type="image/avif">
                            <source src="/build/img/campana.png" type="image/png">
                            <img src="/build/img/campana.png" alt="busqueda de amigos">
                        </picture>
                    </div>

                    <div class="amigos-imagen__busqueda" id="lupa">
                        <picture>
                            <source src="/build/img/lupa.webp" type="image/webp">
                            <source src="/build/img/lupa.avif" type="image/avif">
                            <source src="/build/img/lupa.png" type="image/png">
                            <img src="/build/img/lupa.png" alt="busqueda de amigos">
                        </picture>
                    </div>
                </div>
            </div>


    </div>

    <div class="chats-recientes">
        <h3 class="chats-recientes__texto">Chats Recientes</h3>
        <div class="chat-reciente">
            <div class="chat-reciente__imagen"></div>
            <p class="chat-reciente__nombre">Willy Rex</p>
        </div>
        <div class="chat-reciente">
            <div class="chat-reciente__imagen"></div>
            <p class="chat-reciente__nombre">Yahel Tonoto</p>
        </div>
        <div class="chat-reciente">
            <div class="chat-reciente__imagen"></div>
            <p class="chat-reciente__nombre">Don Macario</p>
        </div>
    </div>
    </div>

    <div class="contenedor-derecha">
        <div class="publicar">
            <h3 class="publicar__texto">Publicar</h3>
            <div class="publicar__input" id="publicar">
                <div class="publicar__imagen"></div>
                <p class="publicar__texto">Di algo...</p>
            </div>
        </div>

        <div class="publicaciones" id="publicaciones">
        
        </div>
    </div>
    
    <!-- Ventana de busqueda de usuarios -->
    <div class="busqueda" id="busqueda">
        <input type="text" class="busqueda__input" placeholder="Busca a tus amigos por su nickname" id="busqueda__input">
        <div class="busqueda__resultados" id="busqueda__resultados">

        </div>
    </div>

        <!-- Ventana de publicacion del usuario -->
    <div class="publicacion" id="publicacion">
        <textarea id="publicacion__texto" class="publicacion__texto" placeholder="¿En que estas pensando?"></textarea>
        <input type="file" id="publicacion__imagen" class="publicacion__imagen" accept="image/jpeg, image/png">
        <button class="publicacion__boton" id="publicacion__boton">Publicar</button>
    </div>

    <div class="notificaciones" id="notificaciones">
        
    </div>
</div>