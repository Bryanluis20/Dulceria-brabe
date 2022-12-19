<?php
include("../conexion.php");
$con=conectar();
$precio_compra=$_POST['precio_compra'];
$precio_venta=$_POST['precio_venta'];
$tipo=$_POST['tipo'];
$cantidad=$_POST['cantidad'];
$Fecha_vencimiento=$_POST['Fecha_vencimiento'];




$sql="INSERT INTO producto VALUES(default,'$precio_compra','$precio_venta','$tipo','$cantidad','$Fecha_vencimiento')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: AgregarProducto.php");
    
}else {
}
?>