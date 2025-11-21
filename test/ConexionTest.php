<?php
use PHPUnit\Framework\TestCase;

class ConexionTest extends TestCase
{
    public function test_conexion_sqlite_memory()
    {
        $pdo = new PDO('sqlite::memory:');
        $this->assertInstanceOf(PDO::class, $pdo);
    }
}

//Conexión a la base de datos

