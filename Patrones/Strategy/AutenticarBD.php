<?php

    include("../Patrones/Singleton/Conexion.php");
    include_once("IStrategy.php");
    include("../Patrones/Singleton/Sesion.php");

    class AuthenticateDatabase implements AuthenticationStrategy
    {
        private $conexion;

        public function __construct()
        {
            $this->conexion = Conexion::getInstance()->getConexion();
        }

        public function authenticate($user, $password)
        {
            $consulta = "SELECT * FROM usuarios WHERE usuario = '$user' AND clave = '$password'";
            $stmt = $this->conexion->prepare($consulta);
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            //credenciales
            $rol = '';
            $correo = '';

            if ($data) {
                Sesion::getInstance()->setSesion("usuario", $data["usuario"]);
                //echo "Inicio de sesion Existoso " . $data["usuario"];
                $rol = $data['rol'];
                $correo = $data['email'];
                $_SESSION['rol'] = $rol;
                $_SESSION['correo'] = $correo;
            } else {
                header("location:error.php");
            }
        }
    }

?>