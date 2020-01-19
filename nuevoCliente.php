<?php
include "bbdd.php";
include 'cabecera.php';
?>
<div class="container">
  <div class="row" id="tittle">
    <div class="col-12 mt-5 text text-center">
      <h2>Registrar Cliente</h2>

    </div>
  </div>
  <div class="row" id="nuevoCliente">
    <div class="col-12 col-md-6 col-xl-6 offset-xl-3">
      <form name="insert-client" action="./respuestaCliente.php" method="POST" id="insert-client">
        <!--Form-->
        <div class="form-group">
          <label for="exampleInputDNI">DNI:</label>
          <input type="text" name="dni" class="form-control" id="exampleInputDNI" aria-describedby="DNIHelp" placeholder="Introduzca DNI" required>
          <small id="DNIHelp" class="form-text text-muted">*Asegurese de introducir correctamente el DNI (01998866D)</small>
        </div>
        <div class="form-group">
          <label for="exampleInputNombre">Nombre:</label>
          <input type="text" name="nombre" class="form-control" id="exampleInputNombre" placeholder="Introduzca Nombre Cliente" required>
        </div>
        <div class="form-group">
          <label for="exampleInputApellido">Apellidos:</label>
          <input type="text" name="apellido" class="form-control" id="exampleInputApellido" placeholder="Introduzca Apellido Cliente" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail">Email:</label>
          <input type="text" name="email" class="form-control" id="exampleInputEmail" placeholder="Introduzca Email de Cliente" required>
        </div>
        </form>
      <!--End Form-->
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-12 col-md-6 col-xl-3 offset-xl-3 text text-left">
      <a href="clientes.php"><button type="button" class="btn btn-warning btn-block">Volver a clientes</button></a>
    </div>
    <div class="col-12 col-md-6 col-xl-3 text text-right">
      <button type="submit" class="btn btn-success btn-block">Crear cliente</button>
    </div>
  </div>
</div>