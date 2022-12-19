<?php
include("../conexion.php");
$con=conectar();

$Id_Cliente=$_POST['Id_Cliente'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$telefono=$_POST['telefono'];
$direcion=$_POST['direcion'];
$municipio=$_POST['municipio'];


$sql="INSERT INTO cliente VALUES('$Id_Cliente','$nombres','$apellidos','$telefono','$direcion','$municipio')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: cliente.php");
    
}else {
}
?>