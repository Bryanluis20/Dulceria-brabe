<?php

include("../conexion.php");
$con=conectar();
$folio=$_POST['folio'];
$fecha=$_POST['fecha'];
$cantidad=$_POST['cantidad'];
$id_g=$_POST['id_producto'];
$id_e=$_POST['id_empleado'];
$id_c=$_POST['id_cliente'];
$total=$_POST['importe'];

$sql="UPDATE venta SET  fecha='$fecha',cantidad='$cantidad',Id_producto='$id_g',
Id_Empleado='$id_e',Id_Cliente='$id_c',importe_total='$total' WHERE folio=$folio";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location:venta.php");
    }
?>