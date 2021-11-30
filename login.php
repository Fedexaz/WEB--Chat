<?php 
session_start();

if(isset($_SESSION['login']))
{
	if($_SESSION['login'] == true)
	{
		header("Location: index.php");
	}
}

?>

<!doctype html>
	<html lang="es">

	<head>
		<title>Chattt</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="description" content="Player One">
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<!--     Fonts and icons     -->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
		<!-- Material Kit CSS -->
		<link href="assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
	</head>

	<body>

		<div class="container">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">

					<div class="card px-5 pb-5">
						<h1 style="font-weight:900;" class="text-center text-primary">Chattt</h1>
						<h3>Iniciar sesión</h3>
						<?php
						if(isset($_GET['error']))
						{
							if($_GET['error'] == 1)
							{
								?>
								<div class="alert alert-danger">Error: La contraseña es incorrecta.</div>
								<?php
							}
							if($_GET['error'] == 2)
							{
								?>
								<div class="alert alert-danger">Error: Error al iniciar sesión, reintenta.</div>
								<?php
							}
							if($_GET['error'] == 3)
							{
								?>
								<div class="alert alert-danger">Error: El usuario no existe. <a class="text-white" href="registro.php">¡Regístrate aquí!</a></div>
								<?php
							}
						}
						if(isset($_GET['oklogin']))
						{
							if($_GET['oklogin'] == 1)
							{
								?>
								<div class="alert alert-success">¡Registro exitoso! Ahora inicia sesión.</div>
								<?php
							}
						}
						?>
						<form action="login_action.php" method="POST">
							<label class="text-dark" for="user"><span class="text-primary">T</span>u usuario:</label>
							<input type="text" name="user" placeholder="Ingresa tu usuario" class="form-control" required>
							<label class="text-dark mt-3" for="pass"><span class="text-primary">T</span>u contraseña:</label>
							<input type="password" name="pass" placeholder="Ingresa tu contraseña" class="form-control" required>
							<input type="submit" class="btn btn-primary mt-3" value="Iniciar sesión">
						</form>
					</div>
					<p class="text-center">
						¿No tienes cuenta?
						<a href="registro.php">¡Regístrate!</a>
					</p>
				</div>
				<div class="col-md-4"></div>
			</div>
			<center>
				<p style="font-size: 14px;">
					Chattt &copy; 2021
				</p>
			</center>

		</div>
		<!--   Core JS Files   -->
		<script src="assets/jquery.js"></script>
		<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
		<script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
		<script src="https://kit.fontawesome.com/07feefc044.js" crossorigin="anonymous"></script>
		<script src="assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
	</body>

	</html>