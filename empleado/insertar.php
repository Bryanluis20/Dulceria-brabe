<?php
include("../conexion.php");
$con=conectar();

$Id_Empleado=$_POST['Id_Empleado'];
$rfc=$_POST['rfc'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$Telefono=$_POST['telefono'];


$sql="INSERT INTO empleado VALUES('$Id_Empleado','$rfc','$nombres','$apellidos','$Telefono')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: empleado.php");
    
}else {
}
?>