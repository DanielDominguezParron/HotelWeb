<?php include "carrito.php"; ?>
<?php include "bbdd.php";

$habitaciones = recogeDatos();
include 'cabecera.php';

?>
<link href="./CSS/estilos.css" rel="stylesheet" type="text/css">
<br>
<?php if ($mensaje != "") { ?>
    <div class="alert alert-success">
        <?php echo $mensaje; ?>
        <a href="mostrarcarrito.php" class="badge badge-success">Ver reservas</a>
    </div>
<?php } ?>
<div class="container d-flex justify-content-center">
    <div class="row">

        <?php if ($habitaciones->num_rows > 0) {
            while ($row = $habitaciones->fetch_assoc()) {
                $img = $row['Photo'];
                $descr = $row['Description'];
                $id = $row['Id'];
                $nombre = $row['Name'];
                $precio = $row['Price'];

                echo ("<div class='cajas card'><a href='./Producto.php?id=$id'><img class='card-img-top' onclick='agranda(this)' src='$img'alt=Card image cap'></a><div class='card-body'><h5 class='card-title'> $nombre</h5><p>$descr</p>
                    <form action='' method='post'>
                      <input type='hidden' name='id' id='id' value='$id'><br>
                      <input type='hidden' name='nombre' id='nombre' value='$nombre'><br>
                      <input type='hidden' name='precio' id='precio' value='$precio'><br>
                      <input type='hidden' name='cantidad' id='cantidad' value='1'>
                      <button  class='btn btn-primary' name='btnAccion' value='Agregar' type='submit'>Reservar habitacion</button>
                    </form>
                    <a href='./Producto.php?id=$id' class='btn btn-primary'>Ver Mas</a></div></div>");
            }
        } else {
            echo ("No tenemos habitaciones de esta categoria");
        }
        ?>

    </div>
</div>
</div>
</div>