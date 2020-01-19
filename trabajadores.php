<?php
include "carrito.php";
if (isset($_SESSION['nombre'])) {
    $cliente = $_SESSION['nombre'];
}
include "bbdd.php";
include 'cabecera.php';
$consultaTrabajadores = mysqli_query(conecta(), "SELECT * FROM trabajadores");

?>

<div class="row">
    <div class="col-12">
        <h3 class="text text-center mt-5 mb-4">Lista de trabajadores</h3>
    </div>
    <div>
    <a href='./nuevoTrabajador.php' class='btn btn-success'>Nuevo Trabajador</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="datos_trabajadores">
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
                $resultset = $consultaTrabajadores or die("error base de datos:" . mysqli_error($conn));
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