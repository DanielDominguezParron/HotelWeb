<?php
$mensaje="";
session_start();

if (isset($_POST['btnAccion'])){
    $accion =$_POST['btnAccion'];
   
    switch ($accion) {
        case 'Agregar':
        if (is_numeric($_POST['id'])) {
        $ID = $_POST['id'];
        $mensaje.="Ok Id correcto".$ID."<br/>";
        }
        else{
            $mensaje.="Id incorrecto".$ID."<br/>";
            break;
        }
        if (is_string($_POST['nombre'])) {
            $Nombre = $_POST['nombre'];
            $mensaje.="Ok nombre correcto".$Nombre."<br/>";
        }
        else{
            $mensaje.="Nombre incorrecto".$Nombre."<br/>";
            break;
        }
        if (is_numeric($_POST['cantidad'])) {
            $Cantidad = $_POST['cantidad'];
            $mensaje.="Ok cantidad correcto".$Cantidad."<br/>";
        }
        else{
            $mensaje.="Cantidad incorrecto".$Cantidad."<br/>";
            break;
        }
        if (is_numeric($_POST['precio'])) {
            $Precio = $_POST['precio'];
            $mensaje.="Ok precio correcto".$Precio."<br/>";
        }
        else{
            $mensaje.="precio incorrecto".$Precio."<br/>";
            break;
        }
        if (!isset($_SESSION['Carrito'])) {
            $producto = array(
                'id' => $ID,
                'Nombre' => $Nombre,
                'Cantidad' => $Cantidad,
                'Precio' => $Precio
            );
            $_SESSION['Carrito'][0] = $producto;
            $mensaje="Producto agregado al carrito";
        } else {
            $idProductos=array_column($_SESSION['Carrito'],"id");
            if (in_array($ID,$idProductos)) {

                
                $key = array_search($ID,$idProductos);
                $producto = $_SESSION['Carrito'][$key]['Nombre'];
                echo "<script>alert('$producto')</script>";
               

                $cantidad =intval($_SESSION['Carrito'][$key]['Cantidad'])+1;
                $_SESSION['Carrito'][$key]['Cantidad']= strval($cantidad);

                $mensaje = "Producto agregado al carrito";
                
            } else {

            $NumeroProductos = count($_SESSION['Carrito']);
            $producto = array(
                'id' => $ID,
                'Nombre' => $Nombre,
                'Cantidad' => $Cantidad,
                'Precio' => $Precio
            );
            $_SESSION['Carrito'][$NumeroProductos] = $producto;
            $mensaje = "Producto agregado al carrito";
        }
        }
    // $mensaje=print_r($_SESSION,true);

            break;
        case "Eliminar":
       
            if (is_numeric($_POST['id'])) {
                $ID = $_POST['id'];
                foreach ($_SESSION['Carrito'] as $indice=>$producto) {
                    if ($producto['id'] == $ID) {
                        unset($_SESSION['Carrito'][$indice]);
                    }
                }
            } else {
                $mensaje .= "Id incorrecto" . $ID . "<br/>";
            }
            break;
}
}
?>