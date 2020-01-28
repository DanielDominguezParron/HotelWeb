<?php
include 'carrito.php';
include 'cabecera.php';
?>

<h3 class="text text-center mt-5 mb-4">Lista de habitaciones para reservadas</h3>
<div class="col-12">
    <?php
    if (isset($_SESSION['nombre'])) {
        $cliente = $_SESSION['nombre'];
    }
    if (isset($_SESSION['carrito'])) {
        if ($_SESSION['carrito'] != null) { ?>

            <table class="table table-light table-bordered">
                <tbody>
                    <tr>
                        <th width="40%" class="text-center">Id de Reserva</th>
                        <th width="40%" class="text-center">Nombre de Reserva</th>
                        <th width="15%" class="text-center">Habitacion</th>
                        <th width="20%" class="text-center">Precio por habitación</th>
                        <th width="20%" class="text-center">Cantidad</th>
                        <th width="20%" class="text-center">Total</th>
                        <th width="5%"> <button class="btn btn-danger" name="btnAccion" value="EliminarTodo" type="submit">Eliminar Todo</button></th>
                    </tr>
                    <?php $total = 0;
                    $arrProductos = array();
                    ?>
                    <?php foreach ($_SESSION['carrito'] as $reserva) { ?>
                        <tr>
                            <?php
                            $arrProductos[] = $reserva['nombre'];
                            ?>
                            <td width="40%" class="text-center"><?php echo $reserva['id'] ?></td>
                            <td width="15%" class="text-center"><?php echo "Falta por hacer" ?></td>
                            <td width="40%" class="text-center"><?php echo $reserva['nombre'] ?></td>

                            <td width="20%" class="text-center"><?php echo $reserva['precio'] ?></td>
                            <td width="20%" class="text-center"><?php echo $reserva['cantidad'] ?></td>
                            <td width="20%" class="text-center"><?php echo number_format($reserva['precio'] * $reserva['cantidad'], 2) ?></td>
                            <td width="5%">
                                <form action="" method="post">
                                    <input type='hidden' name='id' id='id' value="<?php echo $reserva['id'] ?>"><br>
                                    <button class="btn btn-danger" name="btnAccion" value="Eliminar" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php $total = $total + ($reserva['precio'] * $reserva['cantidad']);
                    } ?>
                    <tr>
                        <td colspan="5" class="text text-right">
                            <h3>Total:</h3>
                        </td>
                        <td class="text text-right">
                            <h3>$<?php echo number_format($total, 2) ?></h3>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
</div>
<div class="col-12 col-xl-3">
    <select class="custom-select text text-center" title="Elige un cliente">
        <option selected disabled>Elige un cliente</option>
        <?php
            $consultaCliente = mysqli_query(conecta(), "SELECT DNI FROM clientes");
            $resultset = $consultaCliente or die("error base de datos:" . mysqli_error($conn));
            print($resultset);
            while ($row = mysqli_fetch_assoc($resultset)) {
                echo "<option>" . $row['DNI'] . "</option> ";
            }
        ?>
    </select>
</div>

<?php
            $productoss = implode(",", $arrProductos);
            if (isset($_SESSION['nombre'])) {
                $cliente = $_SESSION['nombre'];
?>
    <form action="carrito.php" method="post">
        <input type='hidden' name='cliente' id='cliente' value="<?php echo $cliente ?>"><br>
        <input type='hidden' name='nombre' id='Nombre' value="<?php echo $productoss ?>"><br>
        <input type='hidden' name='precio' id='precio' value="<?php echo $total ?>"><br>
        <button class="btn btn-success" name="btnCompra" value="Comprar" type="submit">Reservar</button>
    </form>
<?php
            }
?>
<?php
        }
    } else {
?>

<div class="alert alert-success">
    No hay habitaciones para reservar pendientes
</div>


<?php } ?>