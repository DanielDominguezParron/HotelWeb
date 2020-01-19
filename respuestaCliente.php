<?php
include "bbdd.php";
include 'cabecera.php';
?>
<div class="container p-4" id="tittle">
    <div class="d-flex justify-content-center">
        <div>
            <h2>Cliente Creado:</h2>
        </div>
    </div>
</div>
<div class="container" id="nuevoCliente">
    <div class="d-flex justify-content-center">
        <?php
        $dni = $_POST["dni"];
        $dnivalidate = strtoupper($dni);
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $insertClient = mysqli_query(conecta(), "INSERT INTO clientes (DNI, name, surname, mail) VALUES ('" . $dnivalidate . "','" . $nombre . "', '" . $apellido . "', '" . $email . "')");
        $resultset = $insertClient or die("error base de datos:" . mysqli_error($conn));
        ?>
        <pre>
            <p class="font-weight-bold font-italic text-success" for="dni"><?php echo "-DNI creado: $dnivalidate"; ?></p>
            <p class="font-weight-bold font-italic text-success" for="nombre"><?php echo "-Nombre creado: $nombre"; ?></p>
            <p class="font-weight-bold font-italic text-success" for="apellido"><?php echo "-Apellido creado: $apellido"; ?></p>
            <p class="font-weight-bold font-italic text-success" for="email"><?php echo "-Email creado: $email"; ?></p>
            <a href="clientes.php"><button type="button" class="btn btn-outline-success">Volver a clientes</button></a>
        </pre>
    </div>
</div>