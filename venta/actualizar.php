<?php 
    include("../conexion.php");
    $con=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM venta WHERE folio='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
           
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <style>/* estilos */

tr, th{
    text-align: center;
    align-items: center;
  }
/* estilos para los mensajes de JQuery*/
label.error {
    color: red;
    font-size: 1.5rem;
    display: block;
    margin-top: 5px;
}
input, textarea {
  border-radius: 5px;
  border: 1px solid #ccc;
  padding: 4px;
  font-family: 'Lato';
  width: 275  px;
  margin-top: 10px;
}

input.error, textarea.error {
    border: 1px dashed red;
    font-weight: 300;
    color: red;
}

  </style> 
    </head>
    <body>
    <div class="container mt-5"style="width: 40%; height: 600px;">
    <form id="form-blp"action="update.php" method="POST">
    <h1 style="font-size:300% ;color:#000099;text-align: center;">Modificar datos de la Venta</h1>              
                                <input type="hidden" name="folio" value="<?php echo $row['folio']  ?>">
                                <label for="fecha">FECHA</label>
                                <input type="text" class="form-control mb-3" name="fecha" placeholder="Fecha" value="<?php echo $row['fecha']  ?>" style="border:2px solid Tomato; ">
                                <label for="cantidad">CANTIDAD</label>
                                <input type="text" class="form-control mb-3" name="cantidad" placeholder="Cantidad" value="<?php echo $row['cantidad']  ?>" style="border:2px solid DodgerBlue;" >
                                <label for="id_producto">ID PRODUCTO</label>
                                <input type="text" class="form-control mb-3" name="id_producto" placeholder="Id_producto" value="<?php echo $row['Id_producto']  ?>" style="border:2px solid Violet;">
                                <label for="id_empleado">ID EMPLEADO</label>
                                <input type="text" class="form-control mb-3" name="id_empleado" placeholder="Id_Empleado" value="<?php echo $row['Id_Empleado']  ?>" style="border:2px solid orange;">
                                <label for="id_cliente">ID CLIENTE</label>
                                <input type="text" class="form-control mb-3" name="id_cliente" placeholder="Id_cliente" value="<?php echo $row['Id_Cliente']  ?>" style="border:2px solid pink;">
                                <label for="importe">IMPORTE</label>
                                <input type="text" class="form-control mb-3" name="importe" placeholder="Importe Total" value="<?php echo $row['importe_total']  ?>" style="border:2px solid purple;">
                               
                                
                               <input type="submit" class="btn btn-primary btn-block" value="Actualizar"style="background-color:purple;">
                               <a href="venta.php" class="btn btn-primary btn-block"style="background-color:pink;width: 567px; padding: 6px; margin-top: 10px;border-radius: 5px;">Regresar</a>
                            </form>
                    
                </div>
    </body>
</html>