<?php include "carrito.php";
include "bbdd.php";

if (isset($_GET["id"])) {
  $producto = $_GET["id"];
} else {
  header("Location: habitaciones.php");
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
    $planta = $row['planta'];
    $numero = $row['number'];
    $precio = $row['price'];
    $descr = $row['description'];
    $img = $row['photo'];
  ?>

    <div class="row">
      <div class='col-12 mt-5 mb-2 text-center'>
        <h1><?php echo $nombre ?></h1>
      </div>
      <div class="row mt-5">
        <div class="col-12 col-xl-4">
          <img class="img-rounded" src='<?php echo $img ?>' style="width: 40em; height:30em" alt='<?php echo $nombre ?>'>
        </div>

        <div class="offset-4 col-4">
          <h3>Descripción:</h3>
          <p class="mb-3"><?php echo $descr ?></p>
          <h4 class="mb-3"><?php echo $planta . "º planta" ?></h4>
          <h4>Numero de habitación: <p><?php echo $numero ?></p>
          </h4>

        </div>

        <div class="col-3 offset-8">
          <h3 class="text text-center" style="border-radius: 2em;background-color:#14ff12; color:light-green;"><?php echo "TOTAL: " . $precio . "€" ?></h3>
        </div>

    <?php
  }
} else {
  echo ("ha habido un error 404");
}
    ?>
      </div>
    </div>
    </body>

    </html>