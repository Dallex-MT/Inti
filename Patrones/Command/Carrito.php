<?php
    include_once("../Patrones/Singleton/Conexion.php");
    include_once("Comando.php");
    class CarritoCommand implements Command{
        private $producto;
        private $precio;
        private $foto;
        private $usuario;

        public function __construct($producto, $precio, $foto, $usuario)
        {
            $this->producto = $producto;
            $this->precio = $precio;
            $this->foto = $foto;
            $this->usuario = $usuario;
        }
        public function execute()
        {
            // Perform the action here, e.g., insert the data into the database
            $conexion = Conexion::getInstance() -> getConexion();
            $consulta = "INSERT INTO carrito (Usu_Car, Pro_Car, Pre_Car, Ima_Car) VALUES (?, ?, ?, ?)";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute([$this->usuario, $this->producto, $this->precio, $this->foto]);
        }
    }
?>