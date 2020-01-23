<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","hotel_erp");

$sqlQuery = "SELECT MONTHNAME(BookingDate) as MES, COUNT(IdReserva) as NumReservas FROM reserva_habitaciones GROUP BY MONTH(BookingDate)";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>