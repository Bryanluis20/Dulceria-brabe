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
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                    
                                <input type="hidden" name="folio" value="<?php echo $row['folio']  ?>">
                                <input type="text" class="form-control mb-3" name="fecha" placeholder="Fecha" value="<?php echo $row['fecha']  ?>">
                                <input type="text" class="form-control mb-3" name="cantidad" placeholder="Cantidad" value="<?php echo $row['cantidad']  ?>">
                                <input type="text" class="form-control mb-3" name="id_producto" placeholder="Id_producto" value="<?php echo $row['Id_producto']  ?>">
                                <input type="text" class="form-control mb-3" name="id_empleado" placeholder="Id_Empleado" value="<?php echo $row['Id_Empleado']  ?>">
                                <input type="text" class="form-control mb-3" name="id_cliente" placeholder="Id_cliente" value="<?php echo $row['Id_Cliente']  ?>">
                                <input type="text" class="form-control mb-3" name="importe" placeholder="Importe Total" value="<?php echo $row['importe_total']  ?>">
                               
                                <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>