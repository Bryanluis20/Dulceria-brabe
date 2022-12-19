<?php

include("../conexion.php");
$con=conectar();

$Id=$_GET['id'];

$sql="DELETE FROM venta WHERE folio='$Id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location:venta.php");
    }
?>
