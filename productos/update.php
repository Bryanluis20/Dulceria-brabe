<?php

include("../conexion.php");
$con=conectar();

$Id_P=$_POST['Id_producto'];
$precio_C=$_POST['precio_compra'];
$precio_V=$_POST['precio_venta'];
$tipo=$_POST['tipo'];
$cantidad=$_POST['cantidad'];
$fecha=$_POST['Fecha_vencimiento'];


$sql="UPDATE producto SET  precio_compra='$precio_C',precio_venta='$precio_V',tipo='$tipo',cantidad='$cantidad', Fecha_vencimiento='$fecha' WHERE Id_producto='$Id_P'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location:AgregarProducto.php");
    }
?>