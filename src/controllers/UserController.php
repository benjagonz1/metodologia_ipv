<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $modelo;
    public function __construct($pdo) { $this->modelo = new User($pdo); }

    public function index() {
        $users = $this->modelo->all();
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/usuarios/lista.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function create() {
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/usuarios/form.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function store() {
        $data = [
            ':nombre' => $_POST['nombre'] ?? '',
            ':email' => $_POST['email'] ?? '',
            ':password' => password_hash($_POST['password'] ?? '123456', PASSWORD_DEFAULT),
            ':rol_id' => $_POST['rol_id'] ?? 2
        ];
        $this->modelo->create($data);
        header('Location: /usuarios');
    }
}

