function buscarHabitaciones() {
  var busca = document.getElementById("txtBuscar").value;
  location.href="habitaciones.php?busca=" + busca;
}
