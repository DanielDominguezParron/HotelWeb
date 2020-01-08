<?php
include 'carrito.php';
include 'cabecera.php';
?>
<br>

<h3>Lista de habitaciones reservadas</h3>

<?php	
if(isset($_SESSION['nombre'])){
   $cliente= $_SESSION['nombre'];
}
if (isset($_SESSION['carrito'])){
if ($_SESSION['carrito']!=null){?>

 <table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th width="40%">Descripción</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%">--</th>
        </tr>
        <?php $total=0; 
        $arrProductos=array();
        ?>
        <?php foreach ($_SESSION['carrito'] as $producto) {?>
        <tr>
        <?php
            $arrProductos[]=$producto['Nombre'];
            ?>
            <td width="40%"><?php echo $producto['Nombre'] ?></td>
            <td width="15%" class="text-center"><?php echo $producto['Cantidad'] ?></td>
            <td width="20%" class="text-center"><?php echo $producto['Precio'] ?></td>
            <td width="20%" class="text-center"><?php echo number_format($producto['Precio']*$producto['Cantidad'],2)?></td>
            <td width="5%">
             <form action="" method="post">
                 <input type='hidden' name='id' id='id' value="<?php echo $producto['id']?>"><br>
                 <button class="btn btn-danger" name="btnAccion" value="Eliminar"  type="submit">Eliminar</button>
             </form>
            </td>
        </tr>
        <?php $total=$total+($producto['Precio']*$producto['Cantidad']);?>
        <?php }?>
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3>$<?php echo number_format($total,2)?></h3></td>
            <td></td>
        </tr>
    </tbody>
</table>
<?php
$productoss = implode(",", $arrProductos);
if(isset($_SESSION['nombre'])){
    $cliente= $_SESSION['nombre'];
 ?>
<form action="carrito.php" method="post">
    <input type='hidden' name='cliente' id='cliente' value="<?php echo $cliente?>"><br>
    <input type='hidden' name='nombre' id='Nombre' value="<?php echo $productoss?>"><br>
    <input type='hidden' name='precio' id='precio' value="<?php echo $total?>"><br>
    <button class="btn btn-success" name="btnCompra" value="Comprar"  type="submit">Reservar</button>
</form>
<?php
}
?>
<?php
}} else{
?>

    <div class="alert alert-success">
    No hay reservas
</div>
    

<?php } ?>


