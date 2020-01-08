<?php
if (isset($_SESSION['nombre'])) {
    $cliente = $_SESSION['nombre'];
}
include "bbdd.php";
include 'cabecera.php';
$consultaTrabajadores = mysqli_query(conecta(), "SELECT * FROM trabajadores");

?>

<div class="mt-5">
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="datos_trabajadores">
            <thead>
                <tr>
                    <!-- definimos cabeceras de la tabla -->
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Contraseña</th>
                    <th>DNI</th>
                </tr>
            </thead>

            <tbody>
                <?php
                //recorremos resultado de la consulta y añadimos el contenido a la tabla
                $resultset = $consultaTrabajadores or die("error base de datos:" . mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($resultset)) {
                    echo "
                        <tr>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['surname'] . "</td>
                            <td>" . $row['mail'] . "</td>
                            <td>" . $row['password'] . "</td>
                            <td>" . $row['DNI'] . "</td>
                        </tr>";
                } ?>
            </tbody>
        </table>


    </div>
</div>