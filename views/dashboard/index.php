<?php include_once "dashboard.php"; ?>

<!-- contenedor principal -->
<div class="simple-container grow-1 padding-16 flex-wrap gap-8">
    <!-- lado izquierdo -->
    <div class="simple-container basis-large direction-column gap-8">
        <div class="content-box grow-1 light-color">
            <div class="simple-container justify-between">
                <div class="content-divisor">
                    <span class="headline-medium">Amigos</span>
                </div>
                <div class="content-divisor gap-8">
                    <md-icon-button>
                        <md-icon>notifications</md-icon>
                    </md-icon-button>
                    <md-filled-tonal-icon-button>
                        <md-icon>search</md-icon>
                    </md-filled-tonal-icon-button>
                </div>
            </div>
        </div>
        <div class="content-box grow-1 light-color">
            <div class="simple-container">
                <span class="headline-medium">Chats recientes</span>
            </div>
            <div class="simple-container direction-column gap-8">
                <div class="content-box direction-row align-center card-light">
                    <md-ripple></md-ripple>
                    <md-icon>account_circle</md-icon>
                    <span class="body-large">Willy Rex</span>
                </div>
                <div class="content-box direction-row align-center card-light">
                    <md-ripple></md-ripple>
                    <md-icon>account_circle</md-icon>
                    <span class="body-large">Yahel Tonoto</span>
                </div>
                <div class="content-box direction-row align-center card-light">
                    <md-ripple></md-ripple>
                    <md-icon>account_circle</md-icon>
                    <span class="body-large">Don macario</span>
                </div>
            </div>
            
        </div>
    </div>

    <!-- lado derecho -->
    <div class="simple-container grow-1 basis-large direction-column gap-8">
        <div class="content-box">
            <span class="headline-medium">Publicar</span>
            
        </div>
        <div class="content-box grow-1"></div>
    </div>

</div>