<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","hotel_erp");

$sqlQuery = "SELECT COUNT(IdReserva) AS NumReservas FROM `reserva_habitaciones` WHERE MONTH(reserva_habitaciones.BookingDate)=MONTH(CURRENT_DATE())";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>