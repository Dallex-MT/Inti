<?php

$claveActualFormulario = $_POST['contrasena'];
$claveNueva=$_POST['rcontrasena'];
if ($claveActualGuardada === $claveActualFormulario) { 
    echo "SI";
} else {
    echo "NO";
}

?>