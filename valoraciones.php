<?php
include "bbdd.php";
include 'cabecera.php';
$consultaValoracion = recogerResenas();
?>

<div class="row">
    <div class="col-12">
        <h3 class="text text-center mt-5 mb-4">Valoraciones de Clientes</h3>
    </div>
    <div class="table-responsive">
        <table id="datos_valoraciones" class="table table-bordered table-striped">
            <thead>
                <tr class="text text-center">
                    <!-- definimos cabeceras de la tabla en este caso para identificar la valoracion del cliente -->
                    <th>Id Valoracion</th>
                    <th>DNI de cliente</th>
                    <th>Id Reserva</th>
                    <th>Descripcion</th>
                    <th>Opinion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //recorremos resultado de la consulta y añadimos el contenido a la tabla
                // Se mostrara la informacion segun cada cliente y segun su valoracion correspondiente.
                $resultset = $consultaValoracion or die("error base de datos:" . mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($resultset)) {
                    if ($row['Opinion'] == 0) {
                        $opinion = '✔';
                    } else {
                        $opinion = '❌';
                    }
                    echo "
                        <tr>
                            <td class='text text-center'>" . $row['IdValoracion'] . "</td>
                            <td class='text text-center'>" . $row['IdCliente'] . "</td>
                            <td class='text text-center'>" . $row['IdReserva'] . "</td>
                            <td class='text text-center'>" . $row['Description'] . "</td>
							<td class='text text-center'>" . $opinion . "</td>
                        </tr>";
                } ?>
            </tbody>
        </table>
    </div>
</div>