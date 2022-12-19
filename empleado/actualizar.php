<?php 
session_start();

if (isset($_SESSION['Id_Usuario']) && isset($_SESSION['nombre'])) 

 ?>
<?php 
    include("../conexion.php");
    $con=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM empleado WHERE Id_Empleado='$id'";
$query=mysqli_query($con,$sql);
$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Actualizar</title>
        
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
    <body >
                <div class="container mt-5"style="width: 40%; height: 600px;">
                    <form id="form-blp"action="update.php" method="POST">
                    <h1 style="font-size:300% ;color:#000099;text-align: center;">Modificar datos del Empleado</h1>
                                <input type="hidden" name="Id_Empleado" value="<?php echo $row['Id_Empleado']  ?>">
                                <label for="rfc">RFC</label>
                                <input type="text" id="rfc" class="form-control mb-3" name="rfc" placeholder="rfc" value="<?php echo $row['rfc']  ?>"style="border:2px solid Tomato; ">
                                <label for="nombres"> NOMBRE</label>
                                <input type="text" id="nombres" class="form-control mb-3" name="nombres" placeholder="Nombres" value="<?php echo $row['nombres']  ?>"style="border:2px solid DodgerBlue;">
                                <label for="apellidos"> APELLIDOS</label>
                                <input type="text" id="apellidos"class="form-control mb-3" name="apellidos" placeholder="Apellidos" value="<?php echo $row['apellidos']  ?>"style="border:2px solid Violet;">
                                <label for="Telefono"> TELEFONO</label>
                                <input type="text" id="Telefono" class="form-control mb-3" name="Telefono" placeholder="Telefono" value="<?php echo $row['Telefono']  ?>"style="border:2px solid orange;">
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar"style="background-color:purple;">

                            <a href="empleado.php" class="btn btn-info"style="background-color:pink;width: 567px; padding: 6px; margin-top: 10px;border-radius: 5px;">Regresar</a>
                            <script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#myModal").modal();
  });
});
$(document).ready(function() {
  $("#form-blp").validate({
    rules: {
      rfc: {
        required: true
      },
      nombres: {
        required: true
      },
      apellidos: {
        required: true
      },
      Telefono: {
        required: true,
        number: true
      }
    },
    messages : {
      rfc: {
        required: "Por favor ingrese su curp "
      },
      nombres: {
        required: "Por favor ingrese su nombre "
      },
      apellidos: {
        required: "Por favor ingrese su apellido"
      },
      Telefono: {
        required: "Por favor su telefono",
        number: "Por favor ingrese su telefono como un valor numérico"
      }
    }
  });
});
</script>  
                        </form>
 
                </div>
      


    </body>
</html>
<?php 
 ?>