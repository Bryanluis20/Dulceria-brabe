<?php 

session_start();
if (isset($_SESSION['rol']) && isset($_SESSION['nombre'])) {
  header("Location:menu.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Nombre de Usuario</label>
     	<input type="text" name="uname" placeholder="Nombre de Usuario"><br>

     	<label>Contraseña</label>
     	<input type="password" name="password" placeholder="Contraseña"><br>

     	<button type="submit">Aceptar</button>
     </form>
</body>
</html>
