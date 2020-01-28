<?php
include "bbdd.php";
include 'cabecera.php';
$consultaReservas = recogerHabitacionesReservadas();
?>

<div class="row">
    <div class="col-12">
        <h3 class="text text-center mt-5 mb-4">Valoraciones de Clientes</h3>
    </div>
    <div class="table-responsive">
        <table id="datos_valoraciones" class="table table-bordered table-hover">
            <thead>
                <tr class="text text-center">
                    <!-- definimos cabeceras de la tabla en este caso para identificar la valoracion del cliente -->
                    <th>Reserva</th>
                    <th>DNI de cliente</th>
                    <th>Habitación</th>
                    <th>Fecha Ocupación</th>
                    <th>Fecha Habitación Libre</th>
                    <th>Precio Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //recorremos resultado de la consulta y añadimos el contenido a la tabla
                // Se mostrara la informacion segun cada cliente y segun su valoracion correspondiente.
                $resultset = $consultaReservas or die("error base de datos:" . mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($resultset)) {
                    echo "
                        <tr>
                            <td class='text text-center'>" . $row['IdReserva'] . "</td>
                            <td class='text text-center'>" . $row['IdCliente'] . "</td>
                            <td class='text text-center'>" . $row['IdHabitacion'] . "</td>
                            <td class='text text-center'>" . $row['BookingDate'] . "</td>
                            <td class='text text-center'>" . $row['LeavingDate'] . "</td>
                            <td class='text text-center'>" . $row['TotalPrice'] . " €</td>
                        </tr>";
                } ?>
            </tbody>
        </table>
    </div>
</div>