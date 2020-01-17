<html>
<body>

    <?php
    include 'bbdd.php';

    if (isset($_POST["nombre"]) && isset($_POST["contra"])) {
        $nomUsu = $_POST["nombre"];
        $contra = $_POST["contra"];
        $con = conecta();
        $query = "Select * from trabajadores where name='$nomUsu' && password='$contra' ";
        echo  $nomUsu;
        echo "</br>";
        echo  $contra;
        $result = $con->query($query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            session_start();

            $_SESSION["nombre"] = $nomUsu;
            header("Location: calendar.php");
        } else {
            header("Location: index.php?error=notOk");
        }
    } else {

        header("Location: index.php?error=noform");
    }
    ?>