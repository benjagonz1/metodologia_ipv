<?php
class Observacion {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    public function create($data) {
        $sql = "INSERT INTO observaciones (inspeccion_id,texto,autor_id) VALUES (:inspeccion_id,:texto,:autor_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }
}
