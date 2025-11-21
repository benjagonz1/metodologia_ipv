<?php
class Inspeccion {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    public function obtenerTodas() {
        $stmt = $this->pdo->query("SELECT i.id,i.codigo,i.direccion,i.fecha_inspeccion,i.observaciones,
            t.nombre as tipo, e.nombre as estado, u.nombre as inspector
            FROM inspecciones i
            LEFT JOIN tipos_viviendas t ON i.tipo_vivienda_id = t.id
            LEFT JOIN estados_inspeccion e ON i.estado_id = e.id
            LEFT JOIN users u ON i.inspector_id = u.id
            ORDER BY i.fecha_inspeccion DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear($data) {
        $sql = "INSERT INTO inspecciones (codigo,direccion,tipo_vivienda_id,estado_id,inspector_id,fecha_inspeccion,observaciones)
                VALUES (:codigo,:direccion,:tipo,:estado,:inspector,:fecha,:obs)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM inspecciones WHERE id = :id");
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data) {
        $sql = "UPDATE inspecciones SET codigo=:codigo,direccion=:direccion,tipo_vivienda_id=:tipo,estado_id=:estado,inspector_id=:inspector,fecha_inspeccion=:fecha,observaciones=:obs WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM inspecciones WHERE id = :id");
        $stmt->execute([':id'=>$id]);
    }
}