<?php
function conectar(){
    $host="localhost";
    $user="root";
    $pass="";

    $bd="dulceria-brabe";
    //$bd="sistema1";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$bd);

    return $con;
}
?>
