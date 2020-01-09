<?php include "carrito.php";
include "bbdd.php";
include 'cabecera.php';
?>

<link href="./CSS/estilos.css" rel="stylesheet" type="text/css">
<?php if ($mensaje != "") { ?>

    <div class="alert alert-success">
        <?php echo $mensaje; ?>
        <a href="reservas.php" class="badge badge-success">Ver reservas</a>
    </div>

<?php } ?>
<div class="container d-flex justify-content-center mt-5" id="habitaciones">

    <div class="row">
        <div class="text text-center col-12 mb-3">
            <input id="txtBuscar" type="text" name="txtBuscar" value="" placeholder="Nombre de habitación" class="text text-center" style="border: 3px solid #85C1E9 ; border-radius: 1em; width: 50em; ">
            <button type="button" class="btn btn-outline-primary" style="border-radius: 1em;" name="button" onclick="buscarHabitaciones()">Buscar</button>
        </div>
        <?php if (isset($_GET['busca'])) {
            $habitaciones = recogeBusqueda();
        } else {
            $habitaciones = recogeDatos();
        }
        if ($habitaciones->num_rows > 0) {
            while ($row = $habitaciones->fetch_assoc()) {

                $id = $row['id'];
                $nombre = $row['name'];
                $planta = $row['planta'];
                $precio = $row['price'];
                $descr = $row['description'];
                $img = $row['photo'];

        ?>
                <div class='cajas card'>
                    <a href='./producto.php?id=<?php $id ?>'>
                        <img class='card-img-top' onclick='agranda(this)' src='<?php echo $img ?>' alt='Card image cap' style="height:10em; width:max-width;">
                    </a>
                    <div class='card-body'>
                        <h5 class='card-title text text-center'>
                            <?php echo $nombre ?>
                        </h5>
                        <p class="text text-center"><?php echo $planta . "º planta" ?></p>

                        <!--<form action='' method='post'>
                            <input type='hidden' name='id' id='id' value='<?php echo $id ?>'><br>
                            <input type='hidden' name='nombre' id='nombre' value='<?php echo $nombre ?>'><br>
                            <input type='hidden' name='planta' id='planta' value='<?php echo $planta ?>'><br>
                            <input type='hidden' name='precio' id='precio' value='<?php echo $precio ?>'><br>
                            <input type='hidden' name='descripcion' id='description' value='<?php echo $descr ?>'><br>
                            <input type='hidden' name='cantidad' id='cantidad' value='1'>
                            
                        </form>-->
                        <button class='btn btn-primary mt-2 mb-2' name='btnAccion' value='Agregar' data-toggle="modal" data-target="#modal_reserva" onclick="mostrarModal('<?php echo $img ?>', '<?php echo $nombre; ?>', '<?php echo $precio ?>', '<?php echo $id ?>')" type='submit'>Reservar habitacion</button>
                        <a href='./producto.php?id=<?php echo $id ?>' class='btn btn-warning'>Ver Mas</a>
                    </div>
                </div>
        <?php  }
        } else {
            echo ("No tenemos habitaciones disponibles");
        }
        ?>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_reserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Crear reserva?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div style="margin: auto;" class="modal-body">
                <!-- body del modal -->
                <!-- Contenido generado en js -->
                <img id="modalImg" width="200px" src="<?php echo $img ?>" alt="imgModal">
                <h5 id="modalTitle">Título</h5>
                <p id="modalPrice" style="text-align:right;">0,00 €</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <a id="modalAgregar" class="btn btn-success" href="modal_reservar.php?action=addToCart&id=">Agregar</a>
            </div>
        </div>
    </div>
</div>
<!-- End modal -->

</div>
</div>