<?php
include './session.php';
 ?>
 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="style_menu.css" rel="stylesheet">
    <title>Menú</title>
</head>
<body>
	<nav>
			<ul>
			<li><a href="menu.php">Inicio</a></li>
      <li><a href="venta/venta.php">VENTAS</a></li>
        <?php if($_SESSION['rol'] == 1) {?>  
        <li><a href="empleado/empleado.php">EMPLEADOS</a></li> <?php } ?>
				<li><a href="cliente/cliente.php">CLIENTES</a></li>
				<li><a href="productos/AgregarProducto.php">PRODUCTO</a></li>
				<li><a href="#">Bienvenido, <?php echo $_SESSION['nombre']; ?></a>
				<div>

					<ul>
						<li class="titulo"><a href="logout.php">Cerrar Sesión</a></li>
					</ul>
			
				</div>
            </li>
			</ul>
		</nav>
</body>
</html>
