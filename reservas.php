<?php
include 'carrito.php';
include 'cabecera.php';
include 'bbdd.php';
?>

<h3 class="text text-center mt-5 mb-4">Multiples habitaciones para reservadas</h3>
<div class="col-12">
    <?php
    if (isset($_SESSION['carrito'])) {
        if ($_SESSION['carrito'] != null) { ?>

            <table class="table-hover table table-striped table-responsive-md btn-table">
                <tbody>
                    <tr>
                        <th width="10%" class="text-center">Id de Reserva</th>
                        <th width="40%" class="text-center">Habitacion</th>
                        <th width="20%" class="text-center">Precio por habitación</th>
                        <th width="20%" class="text-center">Cantidad</th>
                        <th width="20%" class="text-center">Total</th>
                        <th width="5%"> <button class="btn btn-danger" name="btnAccion" value="EliminarTodo" type="submit">Eliminar Todo</button></th>
                    </tr>
                    <?php $total = 0;
                    $cantidad = 0;
                    $count = 0;
                    $arrHabitaciones = array();
                    ?>
                    <?php foreach ($_SESSION['carrito'] as $reserva) { ?>
                        <tr>
                            <?php
                            $arrHabitaciones[] = $reserva['nombre'];
                            $count++;
                            $id = $count;
                            ?>

                            <td width="5%" class="text-center"><?php echo $id ?></td>
                            <td class="text-center"><?php echo $reserva['nombre'] ?></td>
                            <td class="text-center"><?php echo $reserva['precio'] ?>€ </td>
                            <td class="text-center"><?php echo $reserva['cantidad'] ?></td>
                            <td class="text-center"><?php echo number_format($reserva['precio'] * $reserva['cantidad'], 2) ?>€</td>
                            <?php
                            echo "<td class='text text-center'><a href='borrarHabitacionReservas.php?id=" . $id . "'><i class='fa fa-trash' style='font-size: 1.3em; color:red;'></i></a></td>";
                            ?>
                            </td>
                        </tr>

                    <?php

                        $total = $total + ($reserva['precio'] * $reserva['cantidad']);
                        $cantidad +=  $reserva['cantidad'];
                    }
                    ?>
                    <tr>
                        <td colspan="5" class="text text-right">
                            <h3>Total:</h3>
                        </td>
                        <td class="text text-right">
                            <h3><?php echo number_format($total, 2) ?>€</h3>
                        </td>
                    </tr>
                </tbody>
            </table>
</div>

<div class="col-12 col-xl-3">
    <form action="#" method="post">
        <select class="custom-select text text-center" name="client" title="Elige un cliente">
            <option selected disabled>Elige un cliente</option>
            <?php
            $consultaCliente = mysqli_query(conecta(), "SELECT DNI FROM clientes");
            $resultset = $consultaCliente or die("error base de datos:" . mysqli_error($conn));
            while ($row = mysqli_fetch_assoc($resultset)) {
                echo "<option value=" . $row['DNI'] . ">" . $row['DNI'] . "</option> ";
            }
            ?>
        </select>
        <input type="submit"  class="btn btn-danger" name="submit" value="Confirmar cliente" />
    </form>
</div>

<?php 
            $selected_val="";
            if (isset($_POST['submit'])) {
                $selected_val = $_POST['client'];  // Storing Selected Value In Variable
                //echo "You have selected :" . $selected_val;  // Displaying Selected Value
            }
            $habitaciones = implode(",", $arrHabitaciones);

?>
<div class=col-12>
    <form action="guardarReserva.php" method="post">
        <input type='hidden' name='cliente' id='cliente' value="<?php echo $selected_val ?>"><br>
        <input type='hidden' name='id' id='id' value="<?php echo $id ?>"><br>
        <input type='hidden' name='cantidad' id='cantidad' value="<?php echo $cantidad ?>"><br>
        <input type='hidden' name='precio' id='precio' value="<?php echo $total ?>"><br>
        <button class="btn btn-success" name="btnReservar" value="Agregar" type="submit">Reservar</button>
    </form>
</div>
<?php

?>
<?php
        }
    } else {
?>

<div class="alert alert-success">
    <h6>No hay habitaciones para pendientes reservar</h6>
</div>


<?php } ?>