<html>

<body>

    <?php
    include 'bbdd.php';

    if (isset($_POST["DNI"]) && isset($_POST["contra"])) {
        $DNI = $_POST["DNI"];
        $contra = $_POST["contra"];
        $con = conecta();
        $query = "Select * from trabajadores where DNI='$DNI' && password='$contra' ";
        echo  $DNI;
        echo "</br>";
        echo  $contra;
        $result = $con->query($query);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            session_start();

            $_SESSION["DNI"] = $DNI;
            header("Location: calendar.php");
        } else {
            header("Location: index.php?error=notOk");
        }
    } else {

        header("Location: index.php?error=noform");
    }
    ?>