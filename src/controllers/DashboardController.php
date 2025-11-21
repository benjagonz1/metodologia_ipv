<?php
class DashboardController {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    public function index() {
        $total      = $this->pdo->query('SELECT COUNT(*) FROM inspecciones')->fetchColumn();
        $aprobadas  = $this->pdo->query("SELECT COUNT(*) FROM inspecciones WHERE estado_id = 1")->fetchColumn();
        $pendientes = $this->pdo->query("SELECT COUNT(*) FROM inspecciones WHERE estado_id = 2")->fetchColumn();
        $rechazadas = $this->pdo->query("SELECT COUNT(*) FROM inspecciones WHERE estado_id = 3")->fetchColumn();

        $inspecciones = $this->pdo->query(
            'SELECT codigo,direccion,fecha_inspeccion,estado_id  FROM inspecciones ORDER BY fecha_inspeccion DESC LIMIT 6'
        )->fetchAll(PDO::FETCH_ASSOC);

        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/dashboard.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }
}
