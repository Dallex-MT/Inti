<?php

    include_once("IStrategy.php");
    include_once("../Patrones/Singleton/Sesion.php");

    class Authenticator
    {
        private $authStrategy;

        public function setAuthStrategy(AuthenticationStrategy $authStrategy)
        {
            $this->authStrategy = $authStrategy;
        }

        public function authenticateUser($user, $password)
        {
            $this->authStrategy->authenticate($user, $password);
        }

        public function closeSession()
        {
            Sesion::getInstance()->cerrarSesion();
            header('Location: Logeo.php');
        }
    }

?>