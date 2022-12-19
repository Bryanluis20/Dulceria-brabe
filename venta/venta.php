<?php 
    include '../session.php';
    include("../conexion.php");
    $con=conectar();

    $sql="SELECT * FROM venta";
    $query=mysqli_query($con,$sql);

    $consulta="SELECT *  FROM producto";
    $qy=mysqli_query($con,$consulta);

    $consulta2="SELECT *  FROM empleado";
    $qy2=mysqli_query($con,$consulta2);

    $consulta3="SELECT *  FROM cliente";
    $qy3=mysqli_query($con,$consulta3);
?>
<!DOCTYPE html>
<html >
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../style_menu.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
			<li><a href="venta.php">Ventas</a></li>
         <?php if($_SESSION['rol'] == 1) { ?>
         <li><a href="../empleado/empleado.php">Empleados</a></li> <?php } ?>
				<li><a href="../cliente/cliente.php">Clientes</a></li>
				<li><a href="../productos/AgregarProducto.php">PRODUCTO</a></li>
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
                         <h4><span class="glyphicon glyphicon-lock"></span>Ingresar una nueva Venta</h4>
                        </div>
                        <div class="modal-body" style="padding:40px 50px;">
                        <form role="form" id="form-blp" name="registrar" action="insertar.php" method="POST">
                        <div class="form-group">

                        <label for="fecha">FECHA </label>
                        <input type="text" id="fecha" class="form-control mb-3" name="fecha" placeholder="dia/mes/año" required>

                        <label for="cantidad">CANTIDAD</label>            
                        <input type="text" id="cantidad" class="form-control mb-3" name="cantidad" placeholder="Cantidad" required>
                        
                        <label for="producto">PRODUCTO</label>
                                    <label for="id_g">
                                     <select name="id_g" id="producto" class="form-select mb-3" required>
                                     <option value="">Seleccione un producto</option>
                                            <?php foreach ($qy as $value):?>
                                                
                                                <option value="<?php echo $value['Id_producto']?>">Precio -->$<?php echo $value['precio_venta']?></option>
                                                 
                                            <?php endforeach ?>
                                     </select>
                                    </label>
                                    <label for="empleado">EMPLEADO</label>
                                    <label for="id_e">
                                     <select name="id_e" id=""class="form-select mb-3" required>
                                        
                                     <option value="" selected>Seleccione un Empleado</option >
                                            <?php foreach ($qy2 as $value2):?>
                                                
                                                <option value="<?php echo $value2['Id_Empleado']?>">Nombre:<?php echo $value2['nombres']?> <?php echo $value2['apellidos']?></option>
                                                 
                                            <?php endforeach ?>
                                     </select>

                                    </label>
                                    <label for="cliente">CLIENTE</label>
                                    <label for="id_c">
                                     <select name="id_c" id=""class="form-select mb-3" required>
                                        
                                     <option value="" selected>Seleccione un Cliente</option>
                                            <?php foreach ($qy3 as $value3):?>
                                                
                                                <option value="<?php echo $value3['Id_Cliente']?>">Nombre:<?php echo $value3['nombres']?> <?php echo $value3['apellidos']?></option>
                                                 
                                            <?php endforeach ?>
                                     </select>

                                    </label>
                                    <label for="total">TOTAL</label>
                                    <input type="text" id="total" class="form-control mb-3" name="total" placeholder="Total" > 
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
</script>
<!--fin model-->
<br>
<br>
<br>
<button type="button" class="btn btn-success btn-lg" id="myBtn" style="margin-left: 200px;">Agregar Venta</button>
<!--Tabla para mostrar datos ingresados-->
<br>
<br>
<br>                
<div class="col-md-8" style="margin-left: 240px; text-align: center; align-items: center;">
                        <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                    <th>Folio</th>
                                        <th>Fecha</th>
                                        <th>Cantidad</th>
                                        <th>Id_producto</th>
                                        <th>Id_Empleado</th>
                                        <th>Id_Cliente</th>
                                        <th>Importe total</th>
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
                                            <th><?php  echo $row['folio']?></th>
                                                <th><?php  echo $row['fecha']?></th>
                                                <th><?php  echo $row['cantidad']?></th>
                                                <th><?php  echo $row['Id_producto']?></th>
                                                <th><?php  echo $row['Id_Empleado']?></th>  
                                               
                                                <th><?php  echo $row['Id_Cliente']?></th>
                                                
                                                <th><?php  echo $row['importe_total']?></th>   
                                                <th><a href="actualizar.php?id=<?php echo $row['folio'] ?>" class="btn btn-info glyphicon glyphicon-pencil ">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['folio'] ?>" class="btn btn-danger glyphicon glyphicon-trash">Eliminar</a></th>   
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
      <script src="../js/total.js"></script>
    </body>
</html>

