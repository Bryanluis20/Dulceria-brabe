<?php

include("../conexion.php");
$con=conectar();

$Id_Cliente=$_POST['Id_Cliente'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$telefono=$_POST['telefono'];
$direcion=$_POST['direcion'];
$municipio=$_POST['municipio'];

$sql="UPDATE cliente SET  nombres='$nombres',apellidos='$apellidos',telefono='$telefono',direcion='$direcion',municipio='$municipio' WHERE Id_Cliente='$Id_Cliente'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location:cliente.php");
    }
?>