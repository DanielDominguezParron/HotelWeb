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
<form name="insert-client" action="./respuestaCliente.php" method="POST" id="insert-client">
<!--Form-->
  <div class="form-group">
    <label for="exampleInputDNI">DNI Cliente</label>
    <input type="text" name="dni" class="form-control text-uppercase" id="exampleInputDNI" aria-describedby="DNIHelp" placeholder="Introduce DNI" required>
    <small id="DNIHelp" class="form-text text-muted">Asegurese de introducir correctamente el DNI (01998866D)</small>
  </div>
  <div class="form-group">
    <label for="exampleInputNombre">Nombre Cliente</label>
    <input type="text" name="nombre" class="form-control" id="exampleInputNombre" placeholder="Introduzca Nombre Cliente" required>
  </div>
  <div class="form-group">
    <label for="exampleInputApellido">Apellido Cliente</label>
    <input type="text" name="apellido" class="form-control" id="exampleInputApellido" placeholder="Introduzca Apellido Cliente" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail">Email Cliente</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail" placeholder="Introduzca Email de Cliente" required>
  </div>
  <div class= "p-2  text text-center">
  <button type="submit" class="btn btn-primary">Crear Cliente</button>
  </div>
  <!--End Form-->
</form>
</div>
</div>