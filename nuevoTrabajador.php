<?php
include "bbdd.php";
include 'cabecera.php';
?>
<div class="container p-4" id="tittle">
    <div class="d-flex justify-content-center">
        <div>
            <h2>Registrar Trabajador.</h2>
        </div>
    </div>
</div>
<div class="container" id="nuevoCliente">
<div class="d-flex justify-content-center">
<!--Form-->
<form name="insert-person" action="./respuestaTrabajador.php" method="POST" id="insert-person">
  <div class="form-group">
    <label for="exampleInputDNI">DNI Trabajador</label>
    <input type="text" name="dni" class="form-control" id="exampleInputDNI" aria-describedby="DNIHelp" placeholder="Introduce DNI" required>
    <small id="DNIHelp" class="form-text text-muted text-uppercase">Asegurese de introducir correctamente el DNI (01998866D)</small>
  </div>
  <div class="form-group">
    <label for="exampleInputNombre">Nombre Trabajador</label>
    <input type="text" name="nombre" class="form-control" id="exampleInputNombre" placeholder="Introduzca Nombre Trabajador" required>
  </div>
  <div class="form-group">
    <label for="exampleInputApellido">Apellido Trabajador</label>
    <input type="text" name="apellido" class="form-control" id="exampleInputApellido" placeholder="Introduzca Apellido Trabajador" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail">Email Trabajador</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail" placeholder="Introduzca Email de Trabajador" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword">Password Trabajador</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Introduzca Password de Trabajador" required>
  </div>
  <div class= "p-2  text text-center">
  <button type="submit" class="btn btn-primary">Crear Trabajador</button>
  </div>
  <!--End Form-->
</form>
</div>
</div>