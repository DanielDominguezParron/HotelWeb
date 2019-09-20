<?php include "carrito.php";?>
   <?php include "bbdd.php";
    	if(isset($_GET["id"])){
        	$producto= $_GET["id"];
        
    	}else {
        	header("Location: Principal.php");
    	}
    	$datoProd = producto($producto);

	  	if(isset($_GET["categoria"])){
    	$cat= $_GET["categoria"];
	  	}else {
    	$cat= "todos";
	  	}
	  $productos = recogeDatos($cat);
	  include 'cabecera.php';
	  ?>
	  <?php if($mensaje!=""){?>
    	<div class="alert alert-success">
      <?php echo $mensaje;?>
        <a href="mostrarcarrito.php" class="badge badge-success">Ver carrito</a>
    		</div>
      <?php }?>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	  <link href="./CSS/estilos.css" rel="stylesheet" type="text/css">

    <title>Pcore!</title>
  </head>
  <body>
    
		<div class="d-flex flex-row">

    <?php if($datoProd->num_rows > 0){
        while($row= $datoProd->fetch_assoc()){
            $img = $row['Imagen'];
            $descr = $row['DescrLong'];
			$descrS = $row['DescrShort'];
            $id= $row['idProductos'];
            $nombre= $row['Nombre'];
			$categoria= $row['Categoria'];
           echo "<div class='p-2 text-center'><h1> $nombre</h1>";
           echo "<img src='$img' alt='$nombre'></div>";
		   echo "<div class='p-2'><h1 class='text-center'>$categoria</h1></br>$descrS</br></br> $descr</div><div class='d-flex flex-row'>
		  <div class='p-2'><button  class='btn btn-light'><a  href='./index.php'>Volver</a></button></div>
	  </div>";
        }

    }
    else{
        echo ("ha habido un error 404");
    }
    ?>
    </div>
<?php include 'footer.php'; ?>
    </body>
</html>