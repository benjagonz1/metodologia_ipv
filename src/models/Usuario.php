<?php

class Usuario {

    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function login($usuario, $password) {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1");
        $query->execute(['usuario' => $usuario]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function listar() {
        return $this->db->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear($nombre, $usuario, $password, $rol = 'inspector') {
        $query = $this->db->prepare("
            INSERT INTO usuarios (nombre, usuario, password, rol)
            VALUES (:nombre, :usuario, :password, :rol)
        ");

        return $query->execute([
            'nombre' => $nombre,
            'usuario' => $usuario,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'rol'     => $rol
        ]);
    }
}
