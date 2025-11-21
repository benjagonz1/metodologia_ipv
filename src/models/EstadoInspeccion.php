<?php
class EstadoInspeccion {
    public static function all($pdo) {
        $stmt = $pdo->query('SELECT * FROM estados_inspeccion ORDER BY id');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
