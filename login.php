<?php 
session_start(); 
include "conexion.php";
    $con=conectar();

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
  $pass = validate($_POST['password']);
  $cifrado_pass = hash('sha512',$pass);

	if ($uname==""||$pass=="") {
		echo'
		<script>
		alert ("Campos vacios");
		window.location="index.php";
		</script>
		';
		exit();
	}else{
		$sql = "SELECT * FROM usuario WHERE nombre='$uname' AND clave='$cifrado_pass'";

		$result = mysqli_query($con, $sql);

		if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      var_dump($row);
      if ($row['nombre'] === $uname && $row['clave'] === $cifrado_pass) {
              session_start();
              $_SESSION['rol'] = $row['id_rol'];
              $_SESSION['nombre'] = $row['nombre'];
            	header("Location:menu.php");
				
		        exit();
            }else{
				header("Location: index.php?error=Usuario o Contraseña Incorrecta");
		        exit();
			}
		}else{
			header("Location: index.php?error=Usuario o Contraseña Incorrecta");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}
