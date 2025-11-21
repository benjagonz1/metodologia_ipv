<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/models/Inspeccion.php';

class InspeccionTest extends TestCase
{
    /** 🔹 Test: obtenerTodas() devuelve un array */
    public function test_listar_inspecciones()
    {
        $pdoMock = $this->createMock(PDO::class);
        $stmtMock = $this->createMock(PDOStatement::class);

        $stmtMock->method('fetchAll')->willReturn([
            ['id'=>1, 'codigo'=>'INS-123', 'direccion'=>'Calle 123']
        ]);

        $pdoMock->method('query')->willReturn($stmtMock);

        $ins = new Inspeccion($pdoMock);
        $data = $ins->obtenerTodas();

        $this->assertIsArray($data);
        $this->assertCount(1, $data);
        $this->assertEquals('INS-123', $data[0]['codigo']);
    }

    /** 🔹 Test: crear() ejecuta prepare y execute */
    public function test_crear_inspeccion()
    {
        $pdoMock = $this->createMock(PDO::class);
        $stmtMock = $this->createMock(PDOStatement::class);

        $stmtMock->expects($this->once())->method('execute');

        $pdoMock->method('prepare')->willReturn($stmtMock);

        $ins = new Inspeccion($pdoMock);

        $data = [
            'codigo'=>'INS-001',
            'direccion'=>'Calle Falsa 123',
            'tipo'=>1,
            'estado'=>2,
            'inspector'=>1,
            'fecha'=>'2025-01-01',
            'obs'=>'Bien'
        ];

        $ins->crear($data);
        $this->assertTrue(true); // si no explota, está todo OK
    }

    /** 🔹 Test: find() devuelve un registro */
    public function test_find_inspeccion()
    {
        $pdoMock = $this->createMock(PDO::class);
        $stmtMock = $this->createMock(PDOStatement::class);

        $stmtMock->method('fetch')->willReturn([
            'id'=>1,
            'codigo'=>'INS-999'
        ]);

        $pdoMock->method('prepare')->willReturn($stmtMock);

        $ins = new Inspeccion($pdoMock);
        $data = $ins->find(1);

        $this->assertIsArray($data);
        $this->assertEquals('INS-999', $data['codigo']);
    }

    /** 🔹 Test: update() ejecuta execute correctamente */
    public function test_update_inspeccion()
    {
        $pdoMock = $this->createMock(PDO::class);
        $stmtMock = $this->createMock(PDOStatement::class);

        $stmtMock->expects($this->once())->method('execute');

        $pdoMock->method('prepare')->willReturn($stmtMock);

        $ins = new Inspeccion($pdoMock);

        $data = [
            'id'=>1,
            'codigo'=>'INS-EDIT',
            'direccion'=>'Calle Modificada',
            'tipo'=>2,
            'estado'=>1,
            'inspector'=>1,
            'fecha'=>'2025-02-10',
            'obs'=>'Actualizado'
        ];

        $ins->update($data);

        $this->assertTrue(true);
    }

    /** 🔹 Test: delete() ejecuta la sentencia */
    public function test_delete_inspeccion()
    {
        $pdoMock = $this->createMock(PDO::class);
        $stmtMock = $this->createMock(PDOStatement::class);

        $stmtMock->expects($this->once())->method('execute');

        $pdoMock->method('prepare')->willReturn($stmtMock);

        $ins = new Inspeccion($pdoMock);
        $ins->delete(4);

        $this->assertTrue(true);
    }
}

//Modelo Inspección
