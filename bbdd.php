<?php

function conecta()
{
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbname = "hotel_erp";
    $conn = new mysqli($servername, $user, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Error: " . $conn->connect_error);
    }
    return $conn;
}

function conteo()
{
    $con = conecta();
    $query = "SELECT COUNT(*) AS numero FROM habitaciones ";

    $datoProd =  $con->query($query);


    while ($row = $datoProd->fetch_assoc()) {
        $num = $row["numero"];
    }
    return $num;
}
function recogeDatos()
{
    $con = conecta();
    $query = "SELECT * FROM habitaciones WHERE status LIKE '0'";
    $result = $con->query($query);

    return $result;
}

function recogeBusqueda()
{
    $con = conecta();
    $query = "SELECT * FROM habitaciones WHERE status LIKE '0'  AND name LIKE '%" . $_GET['busca'] . "%'";
    $result = $con->query($query);

    return $result;
}

function modalReserva()
{
    $con = conecta();
    $query = "SELECT * FROM habitaciones WHERE id = " . $_GET["id"];
    $result = $con->query($query);

    return $result;
}
function recogerReservas()
{
    $con = conecta();
    $query = "SELECT IdCliente,reservas.IdHabitacion,BookingDate,LeavingDate FROM reservas JOIN reserva_habitaciones ON reservas.IdReserva=reserva_habitaciones.IdReserva";

    $result = $con->query($query);

    return $result;
}
function diaReserva()
{
    $con = conecta();
    $query = "SELECT BookingDate FROM reserva_habitaciones ORDER BY BookingDate LIMIT 1";

    $result = $con->query($query);

    return $result;
}
function recogerHabitacion($id)
{
    $con = conecta();
    $query = "Select * from habitaciones where Id = $id";

    $result = $con->query($query);

    return $result;
}

function recogerResenas()
{
    $con = conecta();
    $query = "Select * from valoraciones";

    $result = $con->query($query);

    return $result;
}
?>