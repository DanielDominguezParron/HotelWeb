function busqueda() {
  var busca = document.getElementById("txtBuscar").value;
  location.href="habitaciones_disponibles.php?busca=" + busca;
}
