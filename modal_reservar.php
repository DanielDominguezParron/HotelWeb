<?php
  include "bbdd.php";
  session_start();

  if(isset($_SESSION['nombre'])){
    if(isset($_GET["action"]) && isset($_GET["id"])){
      $query = modalReserva();

      if($query->num_rows > 0){
          while($row = $query->fetch_assoc()){
            $id = $row["id"];
            $name = $row["name"];
            $price = $row["price"];
            $descripcion = $row["description"];
            $photo = "IMG/" . $row["photo"];
          }
      }

      $existe = false;
      $pos = 0;
      foreach ($_SESSION['carrito'] as $key => $val) {
             if($val['id'] === $id){
               $existe = true;
               $_SESSION['carrito'][$pos]['cantidad']++;
             }
          $pos++;
      }

      $numProductos = $_SESSION['numProductos'];
      if(!$existe){
        $numProductos = $_SESSION['numProductos']++;
        $arrProducto = [
    			"id" => $id,
    			"nombre" => $name,
    			"precio" => $price,
    			"descripcion" => $descripcion,
          "foto" => $photo,
          "cantidad" => 1
    	  ];
    	  $_SESSION['carrito'][count($_SESSION['carrito'])] = $arrProducto;
      }
    }
    header("Location: reservas.php");
  } else{
    header("Location: index.php?error=notSession");
  }
