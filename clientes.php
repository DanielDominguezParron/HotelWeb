<?php
include "bbdd.php";
include 'cabecera.php';
$consultaCliente = mysqli_query(conecta(), "SELECT * FROM clientes");
?>

<div class="row">
    <div class="col-12">
        <h3 class="text text-center mt-5 mb-4">Lista de clientes</h3>
    </div>
    <div>
        <button type="button" class="btn btn-success ">Nuevo cliente</button>
    </div>
    <div class="table-responsive">
        <table id="datos_clientes" class="table table-bordered table-striped">
            <thead>
                <tr class="text text-center">
                    <!-- definimos cabeceras de la tabla -->
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th class="tabledit-toolbar-column"> Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php
                //recorremos resultado de la consulta y añadimos el contenido a la tabla
                $resultset = $consultaCliente or die("error base de datos:" . mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($resultset)) {
                    echo "
                        <tr>
                        <td class='text text-center'>" . $row['DNI'] . "</td>
                        <td class='text text-center'>" . $row['name'] . "</td>
                        <td class='text text-center'>" . $row['surname'] . "</td>
                        <td class='text text-center'>" . $row['mail'] . "</td>
                        </tr>";
                } ?>
            </tbody>
        </table>
    </div>
</div>