<?php

    use PHPUnit\Framework\TestCase;

    // Incluye la clase que deseas probar
    include_once("Sesion.php");

    class TestSesion extends TestCase {
        public function testSetAndGetSesion() {
            // Crea una instancia de la clase Sesion
            $sesion = Sesion::getInstance();

            // Establece una sesión y verifica que se pueda obtener
            $sesion->setSesion("usuario", "juan");
            $this->assertEquals("juan", $sesion->getSesion("usuario"));
            
            // Verifica que una sesión no establecida devuelva nulo
            $this->assertNull($sesion->getSesion("no_existe"));

            // Establece otra sesión y verifica que se pueda obtener
            $sesion->setSesion("rol", "admin");
            $this->assertEquals("admin", $sesion->getSesion("rol"));
        }

        public function testCerrarSesion() {
            // Crea una instancia de la clase Sesion
            $sesion = Sesion::getInstance();

            // Establece algunas sesiones
            $sesion->setSesion("usuario", "maria");
            $sesion->setSesion("rol", "cliente");

            // Cierra la sesión y verifica que esté vacía
            $sesion->cerrarSesion();
            $this->assertEmpty($_SESSION);
        }
    }

?>