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
$router->post("/api/busquedaamigos", [ApiController::class, "busquedaUsuarios"]);
$router->post("/api/agregaamigo", [ApiController::class, "agregaAmigo"]);
$router->post("/api/estadorelacion", [ApiController::class, "relacion"]);
$router->post("/api/notificaciones", [ApiController::class, "notificaciones"]);
$router->post("/api/buscarNombre", [ApiController::class, "buscarNombre"]);
$router->post("/api/agregar", [ApiController::class, "agregar"]);

$router->comprobarRutas();