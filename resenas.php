<?php
include "bbdd.php";
include 'cabecera.php';
$consultaValoracion = mysqli_query(conecta(), "SELECT * FROM reseñas");
?>

<div class="row">
    <div class="col-12">
        <h3 class="text text-center mt-5 mb-4">Valoraciones de Clientes</h3>
    </div>
    <div class="table-responsive">
        <table  id="datos_valoraciones" class="table table-bordered table-striped">
            <thead>
                <tr class="text text-center">
                    <!-- definimos cabeceras de la tabla en este caso para identificar la valoracion del cliente -->
                    <th>Id Reseña</th>
                    <th>Id Cliente</th>
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
                    echo "
                        <tr>
                            <td>" . $row['IdReseña'] . "</td>
                            <td>" . $row['IdCliente'] . "</td>
                            <td>" . $row['IdReserva'] . "</td>
                            <td>" . $row['Description'] . "</td>
							<td>" . $row['Opinion'] . "</td>
                        </tr>";
                } ?>
            </tbody>
        </table>


    </div>
</div>