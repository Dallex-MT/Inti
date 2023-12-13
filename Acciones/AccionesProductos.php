<?php

    require_once("../Patrones/Singleton/Conexion.php");
    require_once("../Patrones/Command/Carrito.php");
    
    class Acciones{

        public static $total = 0;
        
        public static function Mostrar(){
        
            $conexion = Conexion::getInstance() -> getConexion();
            $consulta = "SELECT * FROM productos";
            $resultado = $conexion -> prepare($consulta);
            $resultado -> execute();
            $dato = $resultado->fetchAll(PDO::FETCH_ASSOC);

            $informacion = '';
            $nombre = "";
            $precio = 0;
            $imagen = "";
            $usuario = $_SESSION["usuario"];

            foreach ($dato as $respuesta){
                $informacion.='
                <div class="col-xl-4 col-lg-6 mt-30 beer-container in-all beer-'.$respuesta['Mar_Pro'].'" style="">
                    <div class="cardsStyle pp__item--3 active pt-30 pb-25">
                        <div class="section-heading mr-30 beersFilter headingBeer">
                            <span class="sub-title">'.$respuesta['Mar_Pro'].'</span>
                        </div>
                        <div class="pp__thumbBeers">
                            <img class="beerImages" src="../'.$respuesta['Rut_Pro'].'" alt="">
                        </div>
                        <div class="pp__content">
                            <div class="pp__c-top d-flex align-items-center justify-content-center">
                                <div class="pp__cat">
                                    <span class="beer-properties">'.$respuesta['Car_1_Pro'].' - '.$respuesta['Car_2_Pro'].' - '.$respuesta['Car_3_Pro'].' </span>
                                </div>
                            </div>
                            <h4 class="pp__title">
                                <span class="beer-title">'.$respuesta['Nom_Pro'].'</span>
                            </h4>
                            <div class="pp__price d-flex align-items-center justify-content-center" style="gap: 10px">
                                <div class="d-flex flex-column align-items-center mr-15">
                                    <div class="d-flex justify-content-center" style="height: 40px">
                                        <img class="bitternesImage" src="https://www.cervezaantares.com/assets/images/icons/fullBitterness.svg"/>
                                        <img class="bitternesImage" src="https://www.cervezaantares.com/assets/images/icons/fullBitterness.svg"/>
                                        <img class="bitternesImage" src="https://www.cervezaantares.com/assets/images/icons/fullBitterness.svg"/>
                                        <img class="bitternesImage" src="https://www.cervezaantares.com/assets/images/icons/fullBitterness.svg"/>
                                        <img class="bitternesImage" src="https://www.cervezaantares.com/assets/images/icons/fullBitterness.svg"/>
                                    </div>
                                    <h6 class="label">'.$respuesta['Ama_Pro'].'</h6>
                                    <span class="qualities">Amargor</span>
                                </div>
                                <div class="d-flex flex-column align-items-center justify-content-between" style="height: 85px">
                                    <h6 class="beer-title" style="font-size: 33px">'.$respuesta['Gra_Alc_Pro'].'</h6>
                                    <span class="qualities">Alcohol</span>
                                </div>
                                <div class="d-flex flex-column align-items-center ml-15">
                                    <div class="bodyAmount">
                                        <img class="bodyImage" src="https://www.cervezaantares.com/assets/images/icons/fullBodyBeer.svg"/>
                                        <img class="bodyImage" src="https://www.cervezaantares.com/assets/images/icons/fullBodyBeer.svg"/>
                                        <img class="bodyImage" src="https://www.cervezaantares.com/assets/images/icons/fullBodyBeer.svg"/>
                                        <img class="bodyImage" src="https://www.cervezaantares.com/assets/images/icons/emptyBodyBeer.svg"/>
                                        <img class="bodyImage" src="https://www.cervezaantares.com/assets/images/icons/emptyBodyBeer.svg"/>
                                    </div>
                                    <h6 class="label">'.$respuesta['Cue_Pro'].'</h6>
                                    <span class="qualities">Cuerpo</span>
                                </div>
                            </div>
                        </div>
                        <div class="cardOptions">
                            <div class="imgOptions">
                                <form action="'. $_SERVER['PHP_SELF'] .'" method="POST">
                                    <input type="hidden" name="producto_id" value="'.$respuesta['Cod_Pro'].'">
                                    <button type="submit" name="agregarcarrito" class="botonCarrito">
                                        <img src="https://www.cervezaantares.com/assets/images/icons/shop-cart.svg" style="width: 24px;"/>
                                    </button>
                                </form>
                            </div>
                            <div class="imgOptions">
                                <img src="https://www.cervezaantares.com/assets/images/icons/view-option.svg" data-toggle="modal" data-target="#beerModal'.$respuesta['Cod_Pro'].'" style="width: 24px;"/>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal fade" id="beerModal'.$respuesta['Cod_Pro'].'" tabindex="-1" role="dialog" aria-labelledby="beerModalLabel" aria-hidden="true">
                    <div class="modal-dialog modalAlign" role="document" style="max-width: 604px;">
                        <div class="modal-content">
                            <div class="beer-modal-main-container">
                                <div class="fabric-modal-body" style="width: 604px; height: auto; flex-direction: row;">
                                    <div class="modalBeer">
                                        <img src="../'.$respuesta['Rut_Pro'].'" alt="" style="height: 163px;">
                                        <div class="d-flex mt-20">
                                            <div class="d-flex flex-column align-items-center justify-content-between mr-30">
                                                <h6 class="indicatorNumber">'.$respuesta['IBU'].'</h6>
                                                <span class="qualities">IBU</span>
                                            </div>
                                            <div class="d-flex flex-column align-items-center justify-content-between">
                                                <h6 class="indicatorNumber">'.$respuesta['Gra_Alc_Pro'].'</h6>
                                                <span class="qualities">Grados Alcohol</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="beer-modal-description">
                                        <div class="closeContainer">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="section-heading modalType mr-30">
                                            <span class="sub-title">'.$respuesta['Mar_Pro'].'</span>
                                        </div>
                                        <span class="beer-title mt-10" style="color: #151515;">'.$respuesta['Nom_Pro'].'</span>
                                        <p>
                                        '.$respuesta['Des_Pro'].' 
                                        </p>
                                        <span class="enjoyBeer">¡Disfrutala en nuestros locales o comprala online!</span>
                                        <div class="d-flex justify-content-start mt-20">
                                            <button class="site-btn letter-btn d-flex justify-content-center" style="width: 113px"><a class="linkOption" href="https://www.vinosyspirits.com/cervezas/linea.html">COMPRAR</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if(isset($_POST['producto_id'])){

                        $producto_id = $_POST['producto_id'];
                        
                        $conexion = Conexion::getInstance() -> getConexion();
                        $consulta = "SELECT * FROM productos WHERE Cod_Pro = '$producto_id' ";
                        $resultado = $conexion -> prepare($consulta);
                        $resultado -> execute();
                        $dato = $resultado->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($dato as $respuesta){
                            $nombre = $respuesta['Nom_Pro'];
                            $precio = $respuesta['Pre_Pro'];
                            $imagen = $respuesta['Rut_Pro'];
                        }
                    }
                }
            }
            if(!empty($nombre)){
                $command = new CarritoCommand($nombre, $precio, $imagen, $usuario);   
                $command->execute();
            }
            return $informacion;
        }

        public static function Carrito(){

            $carrito = new Acciones();
    
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrar'])) {
                $id = $_POST['borrar'];
                $carrito->borrarProducto($id);
            }

            $conexion = Conexion::getInstance() -> getConexion();
            $usuario = $_SESSION["usuario"];
            $consulta = "SELECT * from carrito WHERE    Usu_Car='$usuario'";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $r = $resultado->fetchAll();
            $filas = "";
            foreach ($r as $resu) {
                $precio = $resu['Pre_Car'];
                $subtotal = ($precio * 6);
                $filas .= '
                    <tr>
                        <td><img src="../' . $resu['Ima_Car'] . '"></img></td>
                        <td class="text-white">' . $resu['Pro_Car'] . '</td>
                        <td class="text-white">$ ' . $resu['Pre_Car'] . '</td>
                        <td class="text-white">6</td>
                        <td class="text-white"> <strong>$ ' . $subtotal . '</strong></td>
                        <td>
                            <form action="'. $_SERVER['PHP_SELF'] .'" method="POST">
                                <input type="hidden" name="borrar" value="'. $resu['Cod_Car'] .'">
                                <button type="submit" class="botonRemover">
                                    <img src="../Recursos/Imagenes/Logos/x.png" style="width: 24px;"/>
                                </button>
                            </form>
                        </td>
                        <td style="visibility:collapse; display:none;">' . $resu['Cod_Car'] . '</td>
                    </tr>';
                self::$total += $subtotal;
            }
            return $filas;
        }

        public static function Pago(){
            $carrito = new Acciones();
        
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['precioTotal'])) {
                $precioTotal = $_POST['precioTotal'];
                $subTotal = $_POST['subTotal'];
                $carrito -> enviar($precioTotal, $subTotal);
            }
        
            $subtotal = self::$total;
            $iva = $subtotal * 0.12;
            $precioTotal = ($subtotal + $iva);
        
            if ($precioTotal == 0) {
                return '<p>No hay productos en el carrito.</p>';
            }
        
            $pago = '
                <div id="subtotal">
                    <h3>Total en el Carrito: </h3>
                    <table>
                        <tr>
                            <td class="text-primary">Subtotal</td>
                            <td class="text-white">$ ' . $subtotal . '</td>
                        </tr>
                        <tr>
                            <td class="text-primary">IVA</td>
                            <td class="text-white">$ ' . $iva . '</td>
                        </tr>
                        <tr>
                            <td class="text-primary"><strong>Total</strong></td>
                            <td class="text-white"><strong>$ ' . $precioTotal . '</strong></td>
                        </tr>
                    </table>
                    <form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
                        <input type="hidden" name="precioTotal" value="'. $precioTotal.'">
                        <input type="hidden" name="subTotal" value="'. $subtotal.'">
                        <button type="submit" class="btn btn-primary font-weight-bold">Realizar Pedido</button>
                    </form>
                </div>
            ';
        
            return $pago;
        }

        public function borrarProducto($id)
        {
            $conexion = Conexion::getInstance() -> getConexion();
            $consulta3 = "DELETE FROM carrito WHERE Cod_Car = ?";
            $resultado3 = $conexion->prepare($consulta3);
            $resultado3->execute([$id]);

            header("Location: ../Paginas/Servicio.php");
            exit();
        }

        public static function cantidadProductos()
        {
            $usuario = $_SESSION["usuario"];
            $conexion = Conexion::getInstance() -> getConexion();

            $consulta = "SELECT COUNT(*) as total FROM carrito WHERE Usu_Car = :usuario";
            $resultado = $conexion->prepare($consulta);
            $resultado->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $resultado->execute();
            $row = $resultado->fetch(PDO::FETCH_ASSOC);
            $cantidadProductos = $row['total'];

            return $cantidadProductos;
        }


        public function enviar($total, $subtotal){

            $conexion = Conexion::getInstance() -> getConexion();
            //$fecha = date('Y-m-d');
            $fecha = date('Y-m-d H:i:s');
            $usuario = $_SESSION["usuario"];

            //Obtener los productos del carrito
            $consultaCarrito = "SELECT Pro_Car FROM carrito WHERE Usu_Car = '$usuario'";
            $resultadoCarrito = $conexion->prepare($consultaCarrito);
            $resultadoCarrito->execute();
            $productosCarrito = $resultadoCarrito->fetchAll(PDO::FETCH_ASSOC);

            //Crear un array para almacenar los nombres de los productos
            $productosComprados = array();
            $lista='';
            foreach ($productosCarrito as $producto) {
                $productosComprados[] = $producto['Pro_Car'];
                $lista=$lista.$producto['Pro_Car'].', ';
            }

            //Serializar el array en formato JSON
            $productosJSON = json_encode($productosComprados);

            //Insertar los datos en la tabla de compras
            $consulta1 = "INSERT INTO compras (Cli_Com, Pre_Tot_Com, Fec_Com, Pre_Sub_Com, Pro_Com) values ('$usuario',$total,'$fecha', '$subtotal', '$productosJSON')";
            $resultado1 = $conexion->prepare($consulta1);
            $resultado1->execute();

            //Contactar en otra pestaña mediante Whatsapp con el admin
            $texto = urlencode("Hola Erick López Pillajo, quiero comprar".$lista." el total es $".$total);
            $url = "https://wa.me/593985184705?text=$texto";
            //echo "<script>window.open(`$url`, '_blank');</script>";
            header("Location: $url");
            
            //Eliminar los productos del carrito
            $eliminar = "DELETE FROM carrito WHERE Usu_Car='$usuario'";
            $resultado2 = $conexion->prepare($eliminar);
            $resultado2->execute();

            //header("Location: ../Paginas/Servicio.php");
            exit();
            
        }
    }
?>