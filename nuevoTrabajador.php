<?php
include "bbdd.php";
include 'cabecera.php';
?>
<div class="container">
  <div class="row" id="tittle">
    <div class="col-12 mt-5 text text-center">
      <h2>Registrar Trabajador</h2>

    </div>
  </div>
  <div class="row" id="nuevoTrabajador">
    <div class="col-12 col-md-6 col-xl-6 offset-xl-3">
      <!--Form-->
      <form name="insert-person" action="./respuestaTrabajador.php" method="POST" id="insert-person">
        <div class="form-group">
          <label for="exampleInputDNI">DNI:</label>
          <input type="text" name="dni" class="form-control" id="exampleInputDNI" aria-describedby="DNIHelp" placeholder="Introduzca DNI" required>
          <small id="DNIHelp" class="form-text text-muted">*Asegurese de introducir correctamente el DNI (01998866D)</small>
        </div>
        <div class="form-group">
          <label for="exampleInputNombre">Nombre:</label>
          <input type="text" name="nombre" class="form-control" id="exampleInputNombre" placeholder="Introduzca Nombre Trabajador" required>
        </div>
        <div class="form-group">
          <label for="exampleInputApellido">Apellidos:</label>
          <input type="text" name="apellido" class="form-control" id="exampleInputApellido" placeholder="Introduzca Apellido Trabajador" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail">Email:</label>
          <input type="text" name="email" class="form-control" id="exampleInputEmail" placeholder="Introduzca Email de Trabajador" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword">Password:</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Introduzca Password de Trabajador" required>
        </div>
        <button type="submit" class="btn btn-success btn-block">Crear trabajador</button>
      </form>
      <!--End Form-->
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-12 col-md-6 col-xl-3 offset-xl-3 text text-left">
      <a href="trabajadores.php"><button type="button" class="btn btn-warning btn-block">Volver a trabajadores</button></a>
    </div>
    <div class="col-12 col-md-6 col-xl-3 text text-right">

    </div>
  </div>
</div>