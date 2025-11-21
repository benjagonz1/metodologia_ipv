<?php
require_once __DIR__ . '/../models/Observacion.php';

class ObservacionController {
    private $modelo;
    public function __construct($pdo) { $this->modelo = new Observacion($pdo); }

    public function store() {
        $data = [
            ':inspeccion_id' => $_POST['inspeccion_id'] ?? null,
            ':texto' => $_POST['texto'] ?? '',
            ':autor_id' => $_POST['autor_id'] ?? null
        ];
        $this->modelo->create($data);
        header('Location: /inspecciones');
    }
}

