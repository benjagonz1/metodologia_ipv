<?php

require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {

    private $model;

    public function __construct($pdo) {
        $this->model = new Usuario($pdo);
    }

    public function login() {
        $usuario = $_POST['usuario'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->model->login($usuario, $password);

        if ($user) {
            $_SESSION['usuario'] = $user;
            header('Location: /ipvsistema_php_puro/public/');
            exit;
        } else {
            echo "Usuario o contraseña incorrectos";
        }
    }
}
