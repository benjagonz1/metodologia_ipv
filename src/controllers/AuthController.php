<?php
session_start();

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../models/Usuario.php';

// Crear conexión PDO
$config = require __DIR__ . '/../../config/config.php';

$pdo = new PDO(
    "mysql:host={$config['db']['host']};dbname={$config['db']['name']}",
    $config['db']['user'],
    $config['db']['pass']
);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$usuarioModel = new Usuario($pdo);

$action = $_GET['action'] ?? '';

switch ($action) {

    case 'login':
        $usuario = $_POST['usuario'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $usuarioModel->login($usuario, $password);

        if ($user) {
            $_SESSION['usuario'] = $user;
            header('Location: /ipvsistema_php_puro/public/');
        } else {
            echo "Usuario o contraseña incorrectos";
        }
        break;

    case 'logout':
        session_destroy();
        header('Location: /ipvsistema_php_puro/public/login.php');
        break;

    default:
        echo "Acción no válida";
}
