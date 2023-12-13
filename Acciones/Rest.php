<?php
include_once("AccionesAdmin.php");

$accion = $_SERVER['REQUEST_METHOD'];
switch ($accion) {
    case 'POST':
        $opcion = $_POST['opcion'];

        switch ($opcion) {
            case 1:
                $usuario = $_POST['usuarioI'];
                $contrasena = $_POST['claveI'];
                $email = $_POST['emailI'];
                $telefono = $_POST['telefonoI'];
                Acciones::InsertarUsuario($usuario, $contrasena, $email, $telefono);
                break;

            case 2:
                $usuario = $_POST['usuario_valor'];
                $contrasena = $_POST['claveE'];
                $email = $_POST['emailE'];
                $telefono = $_POST['telefonoE'];
                $rol = $_POST['rolE'];
                Acciones::ActualizarUsuario($usuario, $contrasena, $email, $telefono, $rol);
                break;

            case 3:
                $usuario = $_POST['usuario_val'];
                Acciones::EliminarUsuaio($usuario);
                break;

            case 4:
                $usuario = $_POST['usuario'];
                $contrasena = $_POST['contrasena'];
                $rcontrasena = $_POST['rcontrasena'];
                $email = $_POST['email'];
                $telefono = $_POST['telefono'];
                Acciones::Insertar($usuario, $contrasena, $email, $telefono);
                break;

            case 5:
                $cliente = $_POST['clienteI'];
                $subtotal = $_POST['subtotal'];
                $total = $_POST['totalI'];
                $producto = $_POST['productoI'];
                Acciones::InsertarCompra($cliente, $subtotal, $total, $producto);
                break;

            case 6:
                $codigo = $_POST['codigo_valor'];
                $usuario = $_POST['usuarioE'];
                $subtotal = $_POST['subtotalE'];
                $total = $_POST['totalE'];
                $producto = $_POST['productoE'];
                Acciones::ActualizarCompra($usuario, $subtotal, $total, $producto, $codigo);
                break;

            case 7:
                $codigo = $_POST['codigo_val'];
                Acciones::EliminarCompra($codigo);
                break;

            case 8:
                $producto = $_POST['productoI'];
                $marca = $_POST['marcaI'];
                $grado = $_POST['gradoI'];
                $ibu = $_POST['ibuI'];
                $ingrediente1 = $_POST['ingrediente1I'];
                $ingrediente2 = $_POST['ingrediente2I'];
                $ingrediente3 = $_POST['ingrediente3I'];
                $precio = $_POST['precioI'];
                $descripcion = $_POST['descripcionI'];
                $amargo = $_POST['amargoI'];
                $cuerpo = $_POST['cuerpoI'];

                $ruta = "Recursos/Imagenes/Productos/";
                $nombreImagen = trim($_FILES['imagenI']['name']);

                $imagen = $ruta . $nombreImagen;
                Acciones::InsertarProductos($producto, $marca, $grado, $ibu, $ingrediente1, $ingrediente2, $ingrediente3, $amargo, $cuerpo, $precio, $descripcion, $imagen);
                break;

            case 9:
                $codigo = $_POST['producto_valor'];
                $producto = $_POST['productoE'];
                $marca = $_POST['marcaE'];
                $grado = $_POST['gradoE'];
                $ibu = $_POST['ibuE'];
                $ingrediente1 = $_POST['ingrediente1E'];
                $ingrediente2 = $_POST['ingrediente2E'];
                $ingrediente3 = $_POST['ingrediente3E'];
                $precio = $_POST['precioE'];
                $descripcion = $_POST['descripcionE'];
                $amargo = $_POST['amargoE'];
                $cuerpo = $_POST['cuerpoE'];

                $ruta = "Recursos/Imagenes/Productos/";
                $nombreImagen = $_POST['imagenE'];

                $imagen = $ruta . $nombreImagen;
                Acciones::ActualizarProductos($producto, $marca, $grado, $ibu, $ingrediente1, $ingrediente2, $ingrediente3, $amargo, $cuerpo, $precio, $descripcion, $imagen, $codigo);
                break;

            case 10:
                $codigo = $_POST['producto_val'];
                Acciones::EliminarProductos($codigo);
                break;

            case 11:
                $usuario = $_POST['usuarioI'];
                $email = $_POST['emailI'];
                $motivo = $_POST['motivoI'];
                $mensaje = $_POST['mensajeI'];
                Acciones::insertarTestimonio($usuario, $email, $motivo, $mensaje);
                break;

            default:
                header("location:../Paginas/Usuarios.php");
                break;
        }
        break;
}
?>