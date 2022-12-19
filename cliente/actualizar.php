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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <title>Actualizar Cliente</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
                <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>-->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
                <div class="container mt-5">
                <div class="row-vh-100 justify-content-center align-items-center">
                <div class="col-auto bg-light p-5">
                    <form id="basic" action="update.php" method="POST">
                    
                                <input type="hidden" name="Id_Cliente" value="<?php echo $row['Id_Cliente']  ?>">
                                <h2>Editar Cliente</h2>
                                <label for="nombres"> Edite Nombres</label>
                                <input type="text" id="nombres" class="form-control mb-3" name="nombres" placeholder="Nombres" value="<?php echo $row['nombres']  ?>">
                                <label for="apellidos"> Edite Apellidos</label>
                                <input type="text" id="apellidos" class="form-control mb-3" name="apellidos" placeholder="Apellidos" value="<?php echo $row['apellidos']  ?>">
                                <label for="telefono"> Editar telefono</label>
                                <input type="text" id="telefono" class="form-control mb-3" name="telefono" placeholder="Telefono" value="<?php echo $row['telefono']  ?>">
                                <label for="direcion"> Editar direccion</label>
                                <input type="text" id="direcion" class="form-control mb-3" name="direcion" placeholder="Direcion" value="<?php echo $row['direcion']  ?>">
                                <label for="municipio"> Editar municipio</label>
                                <input type="text" required class="form-control mb-3" name="municipio" placeholder="Municipio" value="<?php echo $row['municipio']  ?>">

                                <input type="submit" class="btn btn-primary btn-block" value="Actualizar">

                                <a href="cliente.php" class="btn btn-info">Regresar</a>

                                 <script>
                                $(document).ready(function() {
                                  $("#basic").validate({
                                    rules: {
                                      nombres: {
                                        required: true
                                      },
                                      apellidos: {
                                        required: true
                                      },
                                      direcion: {
                                        required: true
                                      },
                                      municipio: {
                                        required: true
                                      },
                                      telefono: {
                                        required: true,
                                        number: true
                                      }
                                    },
                                    messages : {

                                      nombres: {
                                        required: "Por favor ingrese su Nombre "
                                      },
                                      apellidos: {
                                        required: "Por favor ingrese sus apellidos"
                                      },
                                      telefono: {
                                        required: "Por favor ingrese su telefono",
                                        number: "Por favor ingrese su telefono como un valor numérico"
                                      },
                                      direcion: {
                                        required:"Porfavor ingrese su direccion"
                                      },
                                      municipio: {
                                        required: "Ingrese sumunicipio"
                                      },
                                    }
                                  });
                                });
                                </script>

                    </form>
                     </div>
                     </div>
                </div>
    </body>
</html>