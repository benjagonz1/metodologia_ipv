<?php
session_start();

// Detectar raíz del proyecto (si estamos en /public o en raíz)
$projectRoot = dirname(__DIR__);
if (!file_exists($projectRoot . '/config/database.php')) {
    $projectRoot = __DIR__;
}

// Cargar conexión PDO
if (file_exists($projectRoot . '/config/database.php')) {
    $pdo = require $projectRoot . '/config/database.php';
} else {
    die('Falta config/database.php');
}

// Autoload simple
spl_autoload_register(function ($class) use ($projectRoot) {
    $paths = [$projectRoot . '/src/controllers/', $projectRoot . '/src/models/'];
    foreach ($paths as $p) {
        $file = $p . $class . '.php';
        if (file_exists($file)) require_once $file;
    }
});

// Routing: /controller/action/id
$basePath = str_replace('\\','/', dirname($_SERVER['SCRIPT_NAME']));
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = preg_replace('#^' . preg_quote($basePath) . '#', '', $uri);
$path = trim($path, '/');
$segments = $path === '' ? [] : explode('/', $path);

$controller = $segments[0] ?? 'dashboard';
$action     = $segments[1] ?? 'index';
$id         = $segments[2] ?? null;

switch ($controller) {
    case '':
    case 'dashboard':
        $file = $projectRoot . '/src/controllers/DashboardController.php';
        if (!file_exists($file)) { http_response_code(404); echo 'DashboardController no encontrado.'; break; }
        require $file;
        $c = new DashboardController($pdo);
        if ($action === 'index') $c->index();
        break;

    case 'inspecciones':
        $file = $projectRoot . '/src/controllers/InspeccionController.php';
        if (!file_exists($file)) { http_response_code(404); echo 'InspeccionController no encontrado.'; break; }
        require $file;
        $c = new InspeccionController($pdo);
        if     ($action === 'index')  $c->index();
        elseif ($action === 'create') $c->create();
        elseif ($action === 'store')  $c->store();
        elseif ($action === 'edit')   $c->edit($id);
        elseif ($action === 'update') $c->update($id);
        elseif ($action === 'delete') $c->delete($id);
        else { http_response_code(404); echo 'Acción no encontrada.'; }
        break;

    case 'usuarios':
        $file = $projectRoot . '/src/controllers/UserController.php';
        if (!file_exists($file)) { http_response_code(404); echo 'UserController no encontrado.'; break; }
        require $file;
        $c = new UserController($pdo);
        if     ($action === 'index')  $c->index();
        elseif ($action === 'create') $c->create();
        elseif ($action === 'store')  $c->store();
        else { http_response_code(404); echo 'Acción no encontrada.'; }
        break;

    case 'observaciones':
        $file = $projectRoot . '/src/controllers/ObservacionController.php';
        if (!file_exists($file)) { http_response_code(404); echo 'ObservacionController no encontrado.'; break; }
        require $file;
        $c = new ObservacionController($pdo);
        if ($action === 'store') $c->store();
        else { http_response_code(404); echo 'Acción no encontrada.'; }
        break;

    default:
        http_response_code(404);
        echo 'Ruta no encontrada: ' . htmlspecialchars($controller);
}
