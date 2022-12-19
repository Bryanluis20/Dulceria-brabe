<?php 
    include '../session.php';
    if($_SESSION['rol'] != 1 ) header("Location:../menu.php");
    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM empleado";
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

        
<style>/* estilos */
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
	<li><a href="../menu.php">Inicio</a></li>
      <li><a href="../venta/venta.php">Ventas</a></li>
      <?php if($_SESSION['rol'] == 1) { ?>
        <li><a href="../empleado/empleado.php">EMPLEADOS</a></li> <?php } ?>
				<li><a href="../cliente/cliente.php">Clientes</a></li>
				<li><a href="../productos/AgregarProducto.php">PRODUCTOS</a></li>
				<li><a href="#">Bienvenido, <?php echo $_SESSION['nombre']; ?></a>
				<div>
					 <ul>
						<li class="titulo"><a href="../logout.php">Cerrar Sesión</a></li>
					</ul>
				</div>
            </li>
		</ul>
		</nav>
            <div class="container mt-5">
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
             <!-- Hola-->
                        <div class="modal-content"><!--Aqui inicia el modal-->
                        <div class="modal-header" style="padding:35px 50px;">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                         <h4><span class="glyphicon glyphicon-lock"></span>Ingresar un nuevo Empleado</h4>
                        </div>
                        <div class="modal-body" style="padding:40px 50px;">
                        <form role="form" id="form-blp" name="registrar" action="insertar.php" method="POST">
                        <div class="form-group">

                                <label for="rfc">RFC </label>
                               <input type="text" id="rfc" class="form-control mb-3" name="rfc" placeholder="RFC" >
                                    
                               <label for="nombres">Nombres </label>
                               <input type="text" id="nombres" class="form-control mb-3" name="nombres" placeholder="Nombres" >
                    
                               <label for="apellidos">Apellidos </label>
                              <input type="text" id="apellidos" class="form-control mb-3" name="apellidos" placeholder="Apellidos" >
                               
                              <label for="telefono">Telefono </label>
                              <input type="text" id="telefono" class="form-control mb-3" name="telefono" placeholder="Telefono" >
                              
                              <input type="submit" class="btn btn-primary">
                    
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
      rfc: {
        required: true
      },
      nombres: {
        required: true
      },
      apellidos: {
        required: true
      },
      telefono: {
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
      telefono: {
        required: "Por favor su telefono",
        number: "Por favor ingrese su telefono como un valor numérico"
      }
    }
  });
});
</script>
<!--fin model-->
<br>
<br>
<br>
<button type="button" class="btn btn-success btn-lg" id="myBtn" style="margin-left: 240px;">Agregar Empleado</button>
<!--Tabla para mostrar datos ingresados-->
<br>
<br>
<br>
<div class="col-md-8" style="margin-left: 240px; text-align: center; align-items: center;">
                         <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                    <th>#ID</th>
                                    <th>RFC</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Telefono</th>
                                        <th>Operaciones</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                            <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <th><?php  echo $row['Id_Empleado']?></th>
                                                <th><?php  echo $row['rfc']?></th>
                                                <th><?php  echo $row['nombres']?></th>
                                                <th><?php  echo $row['apellidos']?></th>
                                                <th><?php  echo $row['Telefono']?></th>   
                                                <th><a href="actualizar.php?id=<?php echo $row['Id_Empleado'] ?>" class="btn btn-info glyphicon glyphicon-pencil "><br>Editar</a></th>  
                                                <th><a href="delete.php?id=<?php echo $row['Id_Empleado'] ?>" class="btn btn-danger glyphicon glyphicon-trash"><br>Eliminar</a></th>                                        
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