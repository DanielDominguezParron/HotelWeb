<?php
include 'bbdd.php';
 $id = $_POST['id'];
 $cliente = $_POST['cliente'];
 $precio = $_POST['precio'];
 echo $id.'<br>';
 echo $cliente.'<br>';
 echo $precio;
 insertarReserva($id,$cliente,$precio);
?>