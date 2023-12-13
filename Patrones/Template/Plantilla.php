<?php
    abstract class Plantilla{

        public abstract function crearHeader();
        public abstract function crearMain();
        public abstract function crearFooter();
        
        public function verificarSesionPaginas(){
            if (session_status() == PHP_SESSION_NONE) session_start();

            if (isset($_SESSION['usuario'])){
                $_SESSION['usuario'];
            }else{
                header('Location: Logeo.php');
                die() ;
            }
        }

        public function verificarSesionIndex(){
            if (session_status() == PHP_SESSION_NONE) session_start();

            if (isset($_SESSION['usuario'])){
                $_SESSION['usuario'];
            }else{
                header('Location: Paginas/Logeo.php');
                die() ;
            }
        }

        function verificarTipoUsuario($origen,$ruta){
            if (isset($_SESSION['usuario'])) {
                if($_SESSION['rol'] == 'admin'){
                    if($origen) return;
                    header('Location: '.$ruta.'Admin.php');
                }else{
                    if($origen) header('Location: '.$ruta.'index.php');
                }
            }
        }

        public function crearPagina(){
            $this -> crearHeader();
            $this -> crearMain();
            $this -> crearFooter();
        }
    }

?>
