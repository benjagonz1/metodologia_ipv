<?php
class User {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    public function all() {
        $stmt = $this->pdo->query('SELECT id,nombre,email,rol_id,created_at FROM users ORDER BY id');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO users (nombre,email,password,rol_id) VALUES (:nombre,:email,:password,:rol_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }
}

