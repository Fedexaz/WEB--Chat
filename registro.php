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
		<title>Chat</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="description" content="Player One">
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<!--     Fonts and icons     -->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
		<!-- Material Kit CSS -->
		<link href="assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />

		<style>
		body{
			margin: 0;
		}

		body::-webkit-scrollbar {
			-webkit-appearance: none;
		}

		body::-webkit-scrollbar:vertical {
			width:10px;
		}

		body::-webkit-scrollbar-button:increment,.contenedor::-webkit-scrollbar-button {
			display: none;
		} 

		body::-webkit-scrollbar:horizontal {
			height: 10px;
		}

		body::-webkit-scrollbar-thumb {
			background-color: #797979;
			border-radius: 20px;
			border: 2px solid #f1f2f3;
		}

		body::-webkit-scrollbar-track {
			border-radius: 10px;
		}

		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			width: 16%;
			position: fixed;
			height: 100%;
			overflow: auto;
		}

		li a {
			display: block;
			color: #000;
			padding: 8px 16px;
			text-decoration: none;
		}

		li a.active {
			background-color: #7D3C98;
			color: white;
		}

		li a:hover:not(.active) {
			background-color: #A569BD;
			color: white;
		}

		@media (max-width: 1024px){
			.nav-menu a>span{
				display: none;
			}
		}
	</style>
</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<div class="card px-5 pb-5">
					<h1 style="font-weight:900;" class="text-center text-primary">Chattt</h1>
					<h3>Registro</h3>
					<?php
					if(isset($_GET['error']))
					{
						if($_GET['error'] == 1)
						{
							?>
							<div class="alert alert-danger">Error: Las contraseñas no coinciden.</div>
							<?php
						}
						if($_GET['error'] == 2)
						{
							?>
							<div class="alert alert-danger">Error: Error interno, reintenta.</div>
							<?php
						}
						if($_GET['error'] == 3)
						{
							?>
							<div class="alert alert-danger">Error: El usuario existe en la base de datos.</div>
							<?php
						}
					}
					?>
					<form action="registro_action.php" method="POST">
						<label class="text-dark" for="user"><span class="text-primary">R</span>egistra un usuario:</label>
						<input type="text" name="user" placeholder="Registra tu usuario" class="form-control" required>
						<label class="text-dark mt-3" for="pass"><span class="text-primary">A</span>hora ingresa tu contraseña:</label>
						<input type="password" name="pass" placeholder="Ingresa tu contraseña" class="form-control" required>
						<label class="text-dark mt-3" for="pass_2"><span class="text-primary">R</span>epite tu contraseña:</label>
						<input type="password" name="pass_2" placeholder="Repite tu contraseña" class="form-control" required>
						<input type="submit" class="btn btn-primary mt-3" value="Registrarme">
					</form>
				</div>
				<p class="text-center">
					¿Ya tienes cuenta?
					<a href="login.php">¡Inicia sesión!</a>
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