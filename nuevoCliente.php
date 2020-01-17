<?php
include "bbdd.php";
include 'cabecera.php';
?>
<div class="container p-4" id="tittle">
    <div class="d-flex justify-content-center">
        <div>
            <h2>Registrar Cliente.</h2>
        </div>
    </div>
</div>

<div class="container" id="nuevoCliente">
<div class="d-flex justify-content-center">
<form>
  <div class="form-group">
    <label for="exampleInputDNI">DNI Cliente</label>
    <input type="dni" class="form-control" id="exampleInputDNI" aria-describedby="DNIHelp" placeholder="Introduce DNI">
    <small id="DNIHelp" class="form-text text-muted">Asegurese de introducir correctamente el DNI (01998866D)</small>
  </div>
  <div class="form-group">
    <label for="exampleInputNombre">Nombre Cliente</label>
    <input type="nombre" class="form-control" id="exampleInputNombre" placeholder="Introduzca Nombre Cliente">
  </div>
  <div class="form-group">
    <label for="exampleInputApellido">Apellido Cliente</label>
    <input type="apellido" class="form-control" id="exampleInputApellido" placeholder="Introduzca Apellido Cliente">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail">Email Cliente</label>
    <input type="email" class="form-control" id="exampleInputEmail" placeholder="Introduzca Email de Cliente">
  </div>
  <div class= "p-2  text text-center">
  <button type="submit" class="btn btn-primary">Crear Cliente</button>
  </div>
</form>
</div>
</div>