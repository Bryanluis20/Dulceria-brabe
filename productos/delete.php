<?php

include("../conexion.php");
$con=conectar();

$Id=$_GET['id'];

$sql="DELETE FROM producto WHERE Id_producto='$Id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location:AgregarProducto.php");
    }
?>
