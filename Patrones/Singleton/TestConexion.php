<?php
    use PHPUnit\Framework\TestCase;
    require 'Conexion.php'; // Asegúrate de importar la clase que deseas probar

    class TestConexion extends PHPUnit\Framework\TestCase {

        public function testConexionSingleton() {
            // Verifica que la conexión sea una instancia única
            $conexion1 = Conexion::getInstance();
            $conexion2 = Conexion::getInstance();
            
            $this->assertSame($conexion1, $conexion2);
        }

        public function testConexionPDO() {
            // Verifica que la conexión PDO esté configurada correctamente
            $conexion = Conexion::getInstance();
            $pdo = $conexion->getConexion();
            
            $this->assertInstanceOf(PDO::class, $pdo);
        }

        public function testConexionExitosa() {
            // Verifica si la conexión a la base de datos se realiza con éxito
            $conexion = Conexion::getInstance();
            $pdo = $conexion->getConexion();
            
            $this->assertInstanceOf(PDO::class, $pdo);
            
            $this->assertEquals(PDO::ERRMODE_EXCEPTION, $pdo->getAttribute(PDO::ATTR_ERRMODE));
        }
    }

?>