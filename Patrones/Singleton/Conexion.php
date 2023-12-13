<?php
    class Conexion{

        private static $instance;
        private $conexion;

        private function __construct(){
            $host = "localhost";
            $user = "root";
            $password = "";
            $database = "moviles";

            try{
                $this -> conexion = new PDO("mysql:host=".$host."; dbname=".$database,$user,$password);
                $this -> conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                die("Error al conectar a la base de datos: ".$e -> getMessage());
            }
        }

        public static function getInstance(){
            if(!self::$instance){
                self::$instance = new Conexion();
            }
            return self::$instance;
        }

        public function getConexion(){
            return $this -> conexion;
        }
    }
?>