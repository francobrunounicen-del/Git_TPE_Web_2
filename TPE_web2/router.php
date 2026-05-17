<?php
require_once __DIR__ . '/app/controllers/video.controller.php';
require_once __DIR__ . '/app/controllers/categoria.controller.php';
require_once __DIR__ . '/app/controllers/home.controller.php';
require_once __DIR__ . '/app/controllers/auth.controller.php';
require_once __DIR__ . '/app/middlewares/session.middleware.php';
require_once __DIR__ . '/app/middlewares/guard.middleware.php';

session_start();

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

/**  TABLA DE RUTEO
 *   /home              ->   VideoController::home()
 *   /video/:id         ->   VideoController::mostrarVideo(id)
 *   /categoria/:id     ->   CategoriaController::mostrarCategoria($id)
 **/

// accion por default
$action = 'home';

// leo la accion que viene por parámetro
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: staff/juan --> ['staff', juan]
$params = explode('/', $action);

$req = new StdClass();
$req = (new SessionMiddleware())->run($req);

// rutea según la acción
switch ($params[0]) {
    case 'home':
        $HomeController = new HomeController();
        $HomeController->home();
        break;
    case 'video':
        $id = $params[1] ?? null;
        $controller = new VideoController();
        $controller->mostrarVideo($id);
        break;
    case 'categoria':
        $id = $params[1] ?? null;
        $CategoriaController = new CategoriaController();
        $CategoriaController->mostrarCategoria($id);
        break;

    case 'login_form':
        $controller = new AuthController();
        $controller->showForm($req);
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login($req);
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout($req);
        break;

    case 'form_video':
        $controller = new VideoController();
        $controller->showFormVideo();
        break;
    case 'add_video':
        $controller = new VideoController();
        $controller->agregarVideo();
        break;
    case 'eliminar_video':
        $controller = new VideoController();
        $controller->eliminarVideo($params[1]);
        break;
    case 'editar_video':
        $controller = new VideoController();
        $controller->showEditForm($params[1]);
        break;
    case 'actualizar_video':
        $controller = new VideoController();
        $controller->actualizarVideo($params[1]);
        break;

    case 'form_categoria':
        $controller = new CategoriaController();
        $controller->showFormCategoria();
        break;
    case 'add_categoria':
        $controller = new CategoriaController();
        $controller->agregarCategoria();
        break;
    case 'eliminar_categoria':
        $controller = new CategoriaController();
        $controller->eliminarCategoria($params[1]);
        break;
    case 'editar_categoria':
        $controller = new CategoriaController();
        $controller->showEditFormCategoria($params[1]);
        break;
    case 'actualizar_categoria':
        $controller = new CategoriaController();
        $controller->actualizarCategoria($params[1]);
        break;
    default:
        echo '404 error';
        break;
}