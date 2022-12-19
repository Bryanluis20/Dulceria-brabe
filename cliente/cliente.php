<?php 
    include '../session.php';
    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM cliente";
    $query=mysqli_query($con,$sql);
   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Datos Cliente</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../style_m.css" rel="stylesheet">
        <link href="../estilos.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
       <link href="js/validacion.js" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    </head>
    <body>
    <nav>
			<ul>
			<li><a href="../menu.php">Inicio</a></li>
      <li><a href="../venta/venta.php">Ventas</a></li>
        <?php if($_SESSION['rol'] == 1) {?>
        <li><a href="../empleado/empleado.php">Empleados</a></li>
        <?php }?>
				<li><a href="cliente.php">Clientes</a></li>
				<li><a href="../garrafon/garrafon.php">Garrafones</a></li>
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
                            <div class="row">

                                <div class="col-md-3">

                                    <h1>Ingrese datos</h1>
                                    <!--Boton-->
                                            <div class="boton-modal">
                                                <label for="btn-modal" class="glyphicon glyphicon-plus">
                                                    Agregar un nuevo cliente
                                                </label>
                                            </div>
                                        <!--Fin de Boton-->

                                <!--Ventana Modal-->
                                    <input type="checkbox" id="btn-modal">
                                    <div class="container-modal">
                                        <div class="content-modal">


                            <h1>Ingrese datos</h1>
                                <form  action="insertar.php" method="POST" id="basic-form">
                                <a>Nombre</a>
                                    <input id="nombres" type="text" class="form-control mb-3" name="nombres" placeholder="Nombres" required><br>

                                <a>Apellidos</a>
                                    <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos" required>
                                <a>Telefono</a>
                                    <input type="text" class="form-control mb-3" name="telefono" placeholder="Telefono" required>
                                <a>Direccion</a>
                                    <input type="text" class="form-control mb-3" name="direcion" placeholder="Direcion" required>
                                <a>Municipio</a>
                                    <input type="text" class="form-control mb-3" name="municipio" placeholder="Municipio" required>
                                    <br>
                                    <input type="submit" class="btn btn-primary glyphicon glyphicon-share">
                                    
                                </form>
                                                            <div class="btn-cerrar">
                                                                <label for="btn-modal"> <span class="glyphicon glyphicon-remove-circle"></span>Cerrar</label>
                                                            </div>
                                                        </div>
                                                        <label for="btn-modal" class="cerrar-modal"></label>
                                                    </div>

                        </div>

                        

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Id_Cliente</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                        <th>Municipio</th>
                                        <th>Operaciones</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['Id_Cliente']?></th>
                                                <th><?php  echo $row['nombres']?></th>
                                                <th><?php  echo $row['apellidos']?></th>
                                                <th><?php  echo $row['telefono']?></th>
                                                <th><?php  echo $row['direcion']?></th>
                                                <th><?php  echo $row['Municipio']?></th>  
                                                <th><a href="actualizar.php?id=<?php echo $row['Id_Cliente'] ?>" class="btn btn-info glyphicon glyphicon-pencil ">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['Id_Cliente'] ?>" class="btn btn-danger glyphicon glyphicon-remove-circle">Eliminar</a></th>
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>
</html>

