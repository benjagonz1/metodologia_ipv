<?php
require_once __DIR__ . '/../models/Inspeccion.php';
require_once __DIR__ . '/../models/TipoVivienda.php';
require_once __DIR__ . '/../models/EstadoInspeccion.php';

class InspeccionController {
    private $modelo;
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->modelo = new Inspeccion($pdo);
    }

    public function index() {
        $inspecciones = $this->modelo->obtenerTodas();
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/inspecciones/lista.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function create() {
        $tipos = TipoVivienda::all($this->pdo);
        $estados = EstadoInspeccion::all($this->pdo);
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/inspecciones/form.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function store() {
        $data = [
            ':codigo' => $_POST['codigo'] ?? '',
            ':direccion' => $_POST['direccion'] ?? '',
            ':tipo' => $_POST['tipo_vivienda_id'] ?? null,
            ':estado' => $_POST['estado_id'] ?? null,
            ':inspector' => $_POST['inspector_id'] ?? null,
            ':fecha' => $_POST['fecha_inspeccion'] ?? null,
            ':obs' => $_POST['observaciones'] ?? null
        ];
        $this->modelo->crear($data);
        header('Location: /inspecciones');
    }

    public function edit($id) {
        $ins = $this->modelo->find($id);
        $tipos = TipoVivienda::all($this->pdo);
        $estados = EstadoInspeccion::all($this->pdo);
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/inspecciones/edit.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }

    public function update($id) {
        $data = [
            ':id' => $id,
            ':codigo' => $_POST['codigo'] ?? '',
            ':direccion' => $_POST['direccion'] ?? '',
            ':tipo' => $_POST['tipo_vivienda_id'] ?? null,
            ':estado' => $_POST['estado_id'] ?? null,
            ':inspector' => $_POST['inspector_id'] ?? null,
            ':fecha' => $_POST['fecha_inspeccion'] ?? null,
            ':obs' => $_POST['observaciones'] ?? null
        ];
        $this->modelo->update($data);
        header('Location: /inspecciones');
    }

    public function delete($id) {
        $this->modelo->delete($id);
        header('Location: /inspecciones');
    }
}
