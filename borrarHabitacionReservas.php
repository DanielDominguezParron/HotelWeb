<?php
include "bbdd.php";
session_start();

if (isset($_GET['id'])) {
    if (count($_SESSION['carrito']) < 2) {
        $_SESSION["carrito"] = array();
    } else {
        // Obtenemos su posición
        $pos = 0;
        foreach ($_SESSION["carrito"] as $producto) {
            if ($producto['id'] === $_GET['id']) {
                // Borramos el producto del array
                unset($_SESSION["carrito"][$pos]);
            }
            $pos++;
        }
    }
}
header("Location: reservas.php");
