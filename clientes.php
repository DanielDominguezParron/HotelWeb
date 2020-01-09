<?php
include "bbdd.php";
include 'cabecera.php';
$consultaCliente = mysqli_query(conecta(), "SELECT * FROM clientes");
?>

<div class=" row mt-5">
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="datos_clientes">
            <thead>
                <tr class="text text-center">
                    <!-- definimos cabeceras de la tabla -->
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th class="tabledit-toolbar-column"> Acciones</th>
                    <th> <button type="button" class="btn btn-success ">Nuevo cliente</button></th>
                </tr>
            </thead>

            <tbody>
                <?php
                //recorremos resultado de la consulta y añadimos el contenido a la tabla
                $resultset = $consultaCliente or die("error base de datos:" . mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($resultset)) {
                    echo "
                        <tr>
                            <td>" . $row['DNI'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['surname'] . "</td>
                            <td>" . $row['mail'] . "</td>
                        </tr>";
                } ?>
            </tbody>
        </table>


    </div>
</div>