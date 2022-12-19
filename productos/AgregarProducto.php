<?php 
    include '../session.php';
    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM producto";
    $query=mysqli_query($con,$sql);
   
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../style_menu.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


  <style>
  .modal-header, h4, .close {
    background-color: #5cb85c;
    color:white !important;
    text-align: center;
    font-size: 30px;
  }
  .modal-footer {
    background-color: #f9f9f9;
  }
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
  width: 300px;
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
<nav>
	<ul>
		<li><a href="../menu.php">INICIO</a></li>
        <li><a href="../venta/venta.php">VENTAS</a></li>
        <?php if($_SESSION['rol'] == 1) { ?>
        <li><a href="../empleado/empleado.php">EMPLEADOS</a></li> <?php } ?>
				<li><a href="../cliente/cliente.php">CLIENTES</a></li>
				<li><a href="AgregarProducto.php">PRODUCTOS</a></li>
				<li><a href="#">Bienvenido ----------> <?php echo $_SESSION['nombre']; ?></a>
				<div>
                    <ul>
						<li class="titulo"><a href="../logout.php">Cerrar Sesión</a></li>
					</ul>
				</div>
        </li>
	</ul>
</nav> 
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span>Ingresar un nuevo producto</h4>
        </div>
       <div class="modal-body" style="padding:40px 50px;">
        <form role="form" id="form-blp" name="registrar" action="insertar.php" method="POST">
            <div class="form-group">
                    <label for="precio_compra">Precio de compra </label>
                    <input type="text" id="precio_compra" class="form-control mb-3" name="precio_compra" placeholder="Precio de compra" >
                    
                    <label for="precio_venta">Precio de venta </label>
                     <input type="text" id="precio_venta" class="form-control mb-3" name="precio_venta" placeholder="Precio de Venta" >
                    
                     <label for="tipo">Tipo de dulces </label>
                    <input type="text" id="tipo" class="form-control mb-3" name="tipo" placeholder="Tipo de dulce" >
                   
                    <label for="cantidad">Cantidad </label>
                    <input type="text" id="cantidad" class="form-control mb-3" name="cantidad" placeholder="Cantidad" >
                   
                    <label for="Fecha_vencimiento">Fecha de vencimiento </label>
                    <input type="date" id="Fecha_vencimiento" class="form-control mb-3" name="Fecha_vencimiento" placeholder="Dia/Mes/Año" >
                   
                    <input type="submit" class="btn btn-primary" >
        </form>
       </div>
    </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
        </div>
      </div>
     </div>
   </div> 
</div>
 
<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#myModal").modal();
  });
});
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
<!--fin model-->
<br>
<br>
<br>
                    <button type="button" class="btn btn-success btn-lg" id="myBtn" style="margin-left: 240px;">Agregar nuevo producto</button>
<!--Tabla para mostrar datos ingresados-->
<br>
<br>
<br>
                    <div class="col-md-8" style="margin-left: 240px; text-align: center; align-items: center;">
                         <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                    <th>#ID</th>
                                        <th>Precio de compra</th>
                                        <th>Precio de Venta</th>
                                        <th>Tipo</th>
                                        <th>Cantidad</th>
                                        <th>Fecha de vencimiento</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                            <th><?php  echo $row['Id_producto']?></th>
                                                <th><?php  echo $row['precio_compra']?></th>
                                                <th><?php  echo $row['precio_venta']?></th>
                                                <th><?php  echo $row['tipo']?></th>
                                                <th><?php  echo $row['cantidad']?></th>  
                                                <th><?php  echo $row['Fecha_vencimiento']?></th>  
                                                <th><a href="actualizar.php?id=<?php echo $row['Id_producto'] ?>" class="btn btn-info glyphicon glyphicon-pencil "><br>Editar</a></th>
                
                                                <th><a href="delete.php?id=<?php echo $row['Id_producto'] ?>" class="btn btn-danger glyphicon glyphicon-trash"><br>Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                    </div>
<!---P--->


</body>
</html>
