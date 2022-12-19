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
<html lang="en">
    <head>
        <title>Venta</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../style_m.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Venta</h1>
                                <form action="insertar.php" method="POST">

                                    <a>Fecha</a>
                                    <input type="date" class="form-control mb-3" name="fecha" placeholder="dia/mes/año">
                                    
                                    <a>Cantidad</a>
                                    <input type="number" class="form-control mb-3" min="0" name="cantidad" placeholder="Cantidad">
                                    <a>producto</a>
                                    <label for="id_g">
                                     <select name="id_g" id="producto" class="form-select mb-3">
                                        
                                     <option value="">Seleccione un producto</option>
                                            <?php foreach ($qy as $value):?>
                                                
                                                <option value="<?php echo $value['Id_producto']?>">Precio -->$<?php echo $value['precio_venta']?></option>
                                                 
                                            <?php endforeach ?>
                                     </select>

                                    </label>
                                    <a>Empleado</a>
                                    <label for="id_e">
                                     <select name="id_e" id=""class="form-select mb-3">
                                        
                                     <option value="" selected>Seleccione un Empleado</option>
                                            <?php foreach ($qy2 as $value2):?>
                                                
                                                <option value="<?php echo $value2['Id_Empleado']?>">Nombre:<?php echo $value2['nombres']?> <?php echo $value2['apellidos']?></option>
                                                 
                                            <?php endforeach ?>
                                     </select>

                                    </label>
                                    <a>Cliente</a>
                                    <label for="id_c">
                                     <select name="id_c" id=""class="form-select mb-3">
                                        
                                     <option value="" selected>Seleccione un Cliente</option>
                                            <?php foreach ($qy3 as $value3):?>
                                                
                                                <option value="<?php echo $value3['Id_Cliente']?>">Nombre:<?php echo $value3['nombres']?> <?php echo $value3['apellidos']?></option>
                                                 
                                            <?php endforeach ?>
                                     </select>

                                    </label>
                                    <a>Total</a>
                                    <input type="text" id="total" class="form-control mb-3" name="importe_total" placeholder="Total">
                                    <input type="submit" class="btn btn-primary">
                                    
                                </form>

                        </div>

                        

                        <div class="col-md-8">
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
                                                <th><a href="actualizar.php?id=<?php echo $row['folio'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['folio'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                                <th><a href="imprimir.php?id=<?php echo $row['folio'] ?>" class="btn btn-info">Imprimir</a></th>
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
      <script src="../js/total.js"></script>
    </body>
</html>

