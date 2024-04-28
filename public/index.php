<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\ApiController;
use MVC\Router;
use Controllers\AuthController;
use Controllers\DashboardController;

$router = new Router();


// Login 
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);

// dashboard
$router->get("/dashboard/inicio", [DashboardController::class, "index"]);

// apis
$router->post("/api/busquedaamigos", [ApiController::class, "busquedaUsuarios"]); // api que busca a los usuarios en el buscador de usuarios
$router->post("/api/agregaamigo", [ApiController::class, "agregaAmigo"]); // api para mandar solicitud de amistad
$router->post("/api/estadorelacion", [ApiController::class, "relacion"]); // api que busca la relacion entre dos usuarios, si son amigos, si se han enviado solicitud o no
$router->post("/api/notificaciones", [ApiController::class, "notificaciones"]); // api que busca las solicitudes de amistas
$router->post("/api/agregar", [ApiController::class, "agregar"]); // cambia la relacion entre dos usuarios a 1 osea que son amigos
$router->post("/api/publicar", [ApiController::class, "publicar"]); // api para crear publicaciones

$router->comprobarRutas();