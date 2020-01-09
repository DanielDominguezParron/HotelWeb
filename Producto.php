<?php include "carrito.php";
 include "bbdd.php";

if (isset($_GET["id"])) {
  $producto = $_GET["id"];
} else {
  header("Location: habitaciones.php");
}
$datoProd = producto($producto);

if (isset($_GET["categoria"])) {
  $cat = $_GET["categoria"];
} else {
  $cat = "todos";
}
$productos = recogeDatos($cat);
include 'cabecera.php';
?>
<?php if ($mensaje != "") { ?>
  <div class="alert alert-success">
    <?php echo $mensaje; ?>
    <a href="reservas.php" class="badge badge-success">Ver carrito</a>
  </div>
<?php } ?>
  <div class="d-flex flex-row">

    <?php if ($datoProd->num_rows > 0) {
      while ($row = $datoProd->fetch_assoc()) {
        $id = $row['idProductos'];
        $img = $row['Imagen'];
        $descr = $row['DescrLong'];

        $nombre = $row['Nombre'];
        $categoria = $row['Categoria'];
        echo "<div class='p-2 text-center'><h1> $nombre</h1>";
        echo "<img src='$img' alt='$nombre'></div>";
        echo "<div class='p-2'><h1 class='text-center'>$categoria</h1></br> $descr</div><div class='d-flex flex-row'>
		  <div class='p-2'><button  class='btn btn-light'><a  href='./habitaciones.php'>Volver</a></button></div>
	  </div>";
      }
    } else {
      echo ("ha habido un error 404");
    }
    ?>
  </div>
</body>

</html>