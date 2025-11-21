<?php
class TipoVivienda {
    public static function all($pdo) {
        $stmt = $pdo->query('SELECT * FROM tipos_viviendas ORDER BY id');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
