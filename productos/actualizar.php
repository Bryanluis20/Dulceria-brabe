<?php 
    include("../conexion.php");
    $con=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM producto WHERE Id_producto='$id'";
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    </head>
    <style>
    body{
       background-color: rgba(1, 0, 13, 0.607);
    }
        .f1{
            background: rgba(12, 4, 94, 0.521);
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
  width: 300px;
  margin-top: 10px;
}

input.error, textarea.error {
    border: 1px dashed red;
    font-weight: 300;
    color: red;
}

    </style>
    <body>
                <div class="container mt-5 f1" style="width: 40%; height: 650px;">
                    <form action="update.php" id="form-blp" method="POST" style="margin: 20px; padding: 15px;">
                                <h1 style="color: black; font-size: 30px; font-family: cursive; text-align: center; padding: 5px; background: rgba(218,218,17,0.5690651260504201);"><b>Actualizar datos del producto</b></h1>
                                <input type="hidden" name="Id_producto" value="<?php echo $row['Id_producto']  ?>">

                                <label for="precio_compra" style="color: white; font-size: 19px;"><b>Precio de compra</b></label>
                                <input type="text" id="precio_compra" class="form-control mb-3" name="precio_compra" placeholder="Precio de compra" value="<?php echo $row['precio_compra']  ?>">

                                <label for="precio_venta" style="color: white;">Precio de venta </label>
                                <input type="text" id="precio_venta" class="form-control mb-3" name="precio_venta" placeholder="precio de venta" value="<?php echo $row['precio_venta']  ?>">

                                <label for="tipo" style="color: white;">Tipo de Dulce</label>
                                <input type="text" id="tipo" class="form-control mb-3" name="tipo" placeholder="tipo" value="<?php echo $row['tipo']  ?>">

                                <label for="cantidad" style="color: white;">Cantidad</label>
                                <input type="text" id="cantidad" class="form-control mb-3" name="cantidad" placeholder="Cantidad" value="<?php echo $row['cantidad']  ?>">

                                <label for="Fecha_vencimiento" style="color: white;">Fecha de venimiento</label>
                                <input type="date" id="Fecha_vencimiento" class="form-control mb-3" name="Fecha_vencimiento" placeholder="Fecha de vencimiento" value="<?php echo $row['Fecha_vencimiento']  ?>">
                               
                                <input type="submit" class="btn btn-primary btn-block" style="margin-top:20px;" value="Actualizar">
                                <a href="AgregarProducto.php" class="btn btn-primary btn-block" style="margin-top:20px;">Regresar</a>
                    </form>
                    
                </div>
<script>
$(document).ready(function() {
  $("#form-blp").validate({
    rules: {
      precio_compra: {
        required: true,
        number: true
      },
      precio_venta: {
        required: true,
        number: true
      },
      tipo: {
        required: true
      },
      cantidad: {
        required: true,
        number: true
      },
      Fecha_vencimiento: {
        required: true
      }
    },
    messages : {
      precio_compra: {
        required: "Por favor ingrese el precio de compra ",
        number: "Por favor ingrese el precio de compra como un valor numérico"
      },
      precio_venta: {
        required: "Por favor ingrese el precio de venta ",
        number: "Por favor ingrese el precio como un valor numérico" 
      },
      tipo: {
        required: "Por favor ingrese el tipo de dulces"
      },
      cantidad: {
        required: "Por favor ingrese la cantidad ",
        number: "Por favor ingrese la cantidad como un valor numérico"
      },
      Fecha_vencimiento: {
        required: "Por favor ingrese la fecha respetando Dia/Mes/Año"
      }
    }
  });
});
</script>
    </body>
</html>