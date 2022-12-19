<?php 
    include("../conexion.php");
    $con=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM cliente WHERE Id_Cliente='$id'";
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
        <title>Actualizar Cliente</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
                <div class="container mt-5">
                <div class="row-vh-100 justify-content-center align-items-center">
                <div class="col-auto bg-light p-5">
                    <form action="update.php" method="POST">
                    
                                <input type="hidden" name="Id_Cliente" value="<?php echo $row['Id_Cliente']  ?>">
                                <h2>Editar Cliente</h2>
                                <p>Editar Nombre </p>
                                <input type="text" required class="form-control mb-3" name="nombres" placeholder="Nombres" value="<?php echo $row['nombres']  ?>">
                                <p>Editar Apellidos</p>
                                <input type="text" required class="form-control mb-3" name="apellidos" placeholder="Apellidos" value="<?php echo $row['apellidos']  ?>">
                                <p>Editar Telefono </p>
                                <input type="text" required class="form-control mb-3" name="telefono" placeholder="Telefono" value="<?php echo $row['telefono']  ?>">
                                <p>Editar Dirección </p>
                                <input type="text" required class="form-control mb-3" name="direcion" placeholder="Direcion" value="<?php echo $row['direcion']  ?>">
                                <p>Editar Municipio</p>
                                <input type="text" required class="form-control mb-3" name="municipio" placeholder="Municipio" value="<?php echo $row['Municipio']  ?>">

                                <input type="submit" class="btn btn-primary btn-block" value="Actualizar">

                                <a href="cliente.php" class="btn btn-info">Regresar</a>

                    </form>
                     </div>
                     </div>
                </div>
    </body>
</html>