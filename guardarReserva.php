<?php
include 'bbdd.php';
 $id = $_POST['id'];
 $cliente = $_POST['cliente'];
 $precio = $_POST['precio'];
 insertarReserva($id,$cliente,$precio);
 header("Location: habitaciones_disponibles.php");
?>