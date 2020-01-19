<?php
include "bbdd.php";
include 'cabecera.php';
?>
<div class="container p-4" id="tittle">
    <div class="d-flex justify-content-center">
        <div>
            <h2>Trabajador Creado:</h2>
        </div>
    </div>
</div>
<div class="container" id="nuevoTrabajador">
    <div class="d-flex justify-content-center">
        <?php
        $dni = $_POST["dni"];
        $dnivalidate = strtoupper($dni);
        echo $dnivalidate;
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $insertWorker = mysqli_query(conecta(), "INSERT INTO trabajadores (name, surname, mail, password, DNI) VALUES ('" . $nombre . "','" . $apellido . "', '" . $email . "',  '" . $password . "', '" . $dnivalidate . "')");
        $resultset = $insertWorker or die("error base de datos:" . mysqli_error($conn));
        ?>
        <pre>
            <p class="font-weight-bold font-italic text-success" for="dni"><?php echo "-DNI creado: $dnivalidate"; ?></p>
            <p class="font-weight-bold font-italic text-success" for="nombre"><?php echo "-Nombre creado: $nombre"; ?></p>
            <p class="font-weight-bold font-italic text-success" for="apellido"><?php echo "-Apellido creado: $apellido"; ?></p>
            <p class="font-weight-bold font-italic text-success" for="email"><?php echo "-Email creado: $email"; ?></p>
            <p class="font-weight-bold font-italic text-success" for="password"><?php echo "-Password creado: $password"; ?></p>
           <a href="trabajadores.php"><button type="button" class="btn btn-outline-success">Volver a trabajadores</button></a>
        </pre>
    </div>
</div>