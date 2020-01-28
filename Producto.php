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


    <div class='col-12 mb-2 text-center' style="background-color: #7386D5; border-radius:0em 0em 3em 3em;">
      <h1><?php echo strtoupper($nombre) ?></h1>
    </div>
    <div class="row">
      <div class="row mt-5">
        <div class="col-12 col-xl-4">
          <img src='<?php echo $img ?>' style="border-radius: 4em; width: 40em; height:30em" alt='<?php echo $nombre ?>'>
        </div>

        <div class="offset-4 col-4">
          <h3>Descripción:</h3>
          <p class="mb-3"><?php echo $descr ?></p>
          <h4 class="mb-3"><?php echo $planta . "º planta" ?></h4>
          <h4>Numero de habitación: <p><?php echo $numero ?></p>
          </h4>

          <select class="custom-select text text-center" title="Elige un cliente">
            <option selected disabled>Elige un cliente</option>
            <?php
            $consultaCliente = mysqli_query(conecta(), "SELECT DNI FROM clientes");
            $resultset = $consultaCliente or die("error base de datos:" . mysqli_error($conn));
            while ($row = mysqli_fetch_assoc($resultset)) {
              echo "<option value=" . $row['DNI'] . ">" . $row['DNI'] . "</option> ";
            }
            ?>
          </select>

        </div>


        <div class="col-3 offset-8">
          <h3 class="text text-center" style="border-radius: 2em;background-color:#14ff12; color:light-green;"><?php echo "TOTAL: " . $precio . "€" ?></h3>
        </div>
        <div class="col-3 offset-8">
          <button type="submit" class="btn btn-success btn-lg btn-block">Reservar</button>
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