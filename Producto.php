<?php include "carrito.php";
include "bbdd.php";

if (isset($_GET["id"])) {
  $producto = $_GET["id"];
} else {
  header("Location: habitaciones_disponibles.php");
}
$datoProd = recogerHabitacion($producto);
include 'cabecera.php';
?>
<?php if ($mensaje != "") { ?>
  <div class="alert alert-success">
    <?php echo $mensaje; ?>
    <a href="reservas.php" class="badge badge-success">Ver reservas</a>
  </div>
  <?php }

if ($datoProd->num_rows > 0) {
  while ($row = $datoProd->fetch_assoc()) {
    $id = $row['id'];
    $nombre = $row['name'];
    $planta = $row['floor'];
    $numero = $row['number'];
    $precio = $row['price'];
    $descr = $row['description'];
    $img = $row['photo'];
  ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css">
<div class="row">
    <div class='col-12 mb-2 text-center' style="background-color: #7386D5; border-radius:0em 0em 3em 3em;">
      <h1><?php echo strtoupper($nombre) ?></h1>
    </div>
  </div>
    <div class="row">
      <div class="row mt-5">
        <div class="col-12 col-xl-4">
          <img src='<?php echo $img ?>' id="productoimage"style="border-radius: 4em; width: 40em; height:30em" alt='<?php echo $nombre ?>'>
        </div>

        <div class="offset-4 col-4">
          <h3>Descripción:</h3>
          <p class="mb-3"><?php echo $descr ?></p>
          <h4 class="mb-3">Planta: <?php echo $planta . "º" ?></h4>
          <h4>Numero de habitación: <p><?php echo $numero ?></p>
          </h4>
          <h4>Cliente:</h4>
          <select class="custom-select text text-center mb-1" title="Elige un cliente">
            <option selected disabled>Elige un cliente</option>
            <?php
            $consultaCliente = mysqli_query(conecta(), "SELECT DNI FROM clientes");
            $resultset = $consultaCliente or die("error base de datos:" . mysqli_error($conn));
            while ($row = mysqli_fetch_assoc($resultset)) {
              echo "<option value=" . $row['DNI'] . ">" . $row['DNI'] . "</option> ";
            }
            ?>

          </select>

          <script type='text/javascript'>
            $(function() {
                $('.input-daterange').datepicker({
                    autoclose: true
                });
            });
        </script>

            <h4 class="mt-4">Fechas de reserva:</h4>
            <div class="input-daterange input-group" id="datepicker">
                <input type="text" data-date-format="yyyy-mm-dd" class="input form-control" name="from" placeholder="Desde que fecha" />
                <span class="input-group-addon">  </span>
                <input type="text" data-date-format="yyyy-mm-dd" class="input form-control" name="to" placeholder="Hasta que fecha " />
            </div>
          </div>
        <div class="col-3 offset-8 mt-5">
          <h3 class="text text-center" style="border-radius: 2em;background-color:#14ff12; color:light-green;"><?php echo "TOTAL: " . $precio . "€" ?></h3>
        </div>
        <div class="col-3 offset-8">
          <button type="submit" class="btn btn-success btn-lg btn-block">Reservar</button>
        </div>
          </div>
    <?php
  }
} else {
  echo ("ha habido un error 404");
}
    ?>
      </div>
    </div>