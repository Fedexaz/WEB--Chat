<?php 
session_start();

if(!isset($_SESSION['login']))
{
	header("Location: login.php");
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

		.chatbox::-webkit-scrollbar {
			-webkit-appearance: none;
		}

		.chatbox::-webkit-scrollbar:vertical {
			width:10px;
		}

		.chatbox::-webkit-scrollbar-button:increment,.contenedor::-webkit-scrollbar-button {
			display: none;
		} 

		.chatbox::-webkit-scrollbar:horizontal {
			height: 10px;
		}

		.chatbox::-webkit-scrollbar-thumb {
			background-color: #797979;
			border-radius: 20px;
			border: 2px solid #f1f2f3;
		}

		.chatbox::-webkit-scrollbar-track {
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

		.chatbox{
			overflow: auto; width: 100%; height: 33em;
		}

		.barra_msj{
			margin-left: 28%;
		}

		@media (max-width: 1024px){
			.nav-menu a>span
			{
				display: none;
			}
			.barra_msj{
				margin-left: 0%;
				}}
			</style>
		</head>

		<body onload="scrollDiv();">
			<div class="nav-menu">
				<ul>
					<li><h4 style="font-weight: 800;" class="text-center text-primary">Chattt</h4></li>
					<li><a href="index.php"><i class="material-icons" style="font-size: 26px;">home</i><span>Inicio </span><span class="badge badge-pill badge-warning">soon!</span></a></li>
					<li><a href="perfil.php"><i class="material-icons" style="font-size: 26px;">perm_identity</i><span>Perfil </span><span class="badge badge-pill badge-warning">soon!</span></a></li>
					<li><a href="mensajes.php"><i class="material-icons" style="font-size: 26px;">forum</i><span>Mensajes </span></a></li>
					<li><a class="active" href="chatglobal.php"><i class="material-icons" style="font-size: 26px;">public</i><span>Chat global </span></a></li>
					<li><a href="buscar.php"><i class="material-icons" style="font-size: 26px;">search</i><span>Buscar </span><span class="badge badge-pill badge-warning">soon!</span></a></li>
					<?php 
					if($_SESSION['login'] == true)
					{
						?>
						<li><a href="salir.php"><i class="material-icons" style="font-size: 26px;">logout</i><span>Salir </span><span class="text-primary" style="font-size:15px;">(<?php echo $_SESSION['username']; ?>)</span></a></li>
						<?php
					} 
					?>
				</ul>

				<div style="margin-left:16%;padding:1px 16px;height:auto;">
					<?php 
					if(isset($_GET['sala']))
					{
						if($_GET['sala'] == 1)
						{
							?>
							<h3 class="d-inline" style="font-weight:900;">Sala 1</h3>
							<a class="btn btn-primary d-inline mt-2" href="chatglobal.php">Volver a salas</a>
							<div class="card p-3 chatbox" id="chat">
								<?php
								include("basedatos/db.php");
								$con = $mysqli -> query("SELECT * FROM `chat_global` WHERE `sala` = 1");
								if($con->num_rows>0)
								{
									while ($fila = $con -> fetch_assoc()) 
									{
										if($fila['emisor'] != $_SESSION['username'])
										{
											echo "<div class='row'>";	
											echo "
											<div class='col-md-6'>
											<div class='card p-2 bg-secondary'>
											<strong style='font-size: 14px; font-weight:900;'>
											".$fila['emisor'].":
											</strong>
											<span style='font-size: 16px; font-weight:400;'>
											".$fila['mensaje']."
											</span>
											<span style='font-size: 9px; font-weight:400;'>
											(".$fila['hora'].")
											</span>
											</div>
											</div>
											<div class='col-md-6'></div>
											";
											echo "</div>";
										}
										else
										{
											echo "<div class='row'>";
											echo "
											<div class='col-md-6'></div>
											<div class='col-md-6'>
											<div class='card p-2 bg-primary'>
											<span style='font-size: 16px; font-weight:400;'>
											".$fila['mensaje']."
											</span>
											<span style='font-size: 9px; font-weight:200;'>
											(".$fila['hora'].")
											</span>
											</div>
											</div>
											";
											echo "</div>";
										}
									}
									echo "</div>";
								}
								else
								{
									echo '<span style="font-weight:900;">La sala está vacía.<br>Prueba escribiendo algo...</span>
									';
								}
								?>
							</div>
							<div class="barra_msj">
								<form action="env_msg_global.php" method="POST">
									<input type="hidden" name="sala" value="<?php echo md5(1); ?>">
									<input type="text" style="width:70%;" name="mensaje" class="form-control d-inline" placeholder="Escribe un mensaje...">
									<button type="submit" class="btn btn-primary d-inline ml-3"><i class="material-icons" style="font-size: 26px;">double_arrow</i></button>
								</form>
							</div>
							<?php
						}
						if($_GET['sala'] == 2)
						{
							?>
							<h3 class="d-inline" style="font-weight:900;">Sala 2</h3>
							<a class="btn btn-primary d-inline mt-2" href="chatglobal.php">Volver a salas</a>
							<div class="card p-3 chatbox" id="chat">
								<?php
								include("basedatos/db.php");
								$con = $mysqli -> query("SELECT * FROM `chat_global` WHERE `sala` = 2");
								if($con->num_rows>0)
								{
									while ($fila = $con -> fetch_assoc()) 
									{
										if($fila['emisor'] != $_SESSION['username'])
										{
											echo "<div class='row'>";	
											echo "
											<div class='col-md-6'>
											<div class='card p-2 bg-secondary'>
											<strong style='font-size: 14px; font-weight:900;'>
											".$fila['emisor'].":
											</strong>
											<span style='font-size: 16px; font-weight:400;'>
											".$fila['mensaje']."
											</span>
											</div>
											</div>
											<div class='col-md-6'></div>
											";
											echo "</div>";
										}
										else
										{
											echo "<div class='row'>";
											echo "
											<div class='col-md-6'></div>
											<div class='col-md-6'>
											<div class='card p-2 bg-primary'>
											<strong style='font-size: 14px; font-weight:900;'>
											".$fila['emisor'].":
											</strong>
											<span style='font-size: 16px; font-weight:400;'>
											".$fila['mensaje']."
											</span>
											</div>
											</div>
											";
											echo "</div>";
										}
									}
									echo "</div>";
								}
								else
								{
									echo '<span style="font-weight:900;">La sala está vacía.<br>Prueba escribiendo algo...</span>
									';
								}
								?>
							</div>
							<div class="barra_msj">
								<form action="env_msg_global.php" method="POST">
									<input type="hidden" name="sala" value="<?php echo md5(2); ?>">
									<input type="text" style="width:70%;" name="mensaje" class="form-control d-inline" placeholder="Escribe un mensaje...">
									<button type="submit" class="btn btn-primary d-inline ml-3"><i class="material-icons" style="font-size: 26px;">double_arrow</i></button>
								</form>
							</div>
							<?php
						}
					}
					else
					{
						?>
						<h2>Chat global</h2>
						<span style="font-weight:900;">Seleccioná la sala en la que deseas conectarte.</span>
						<br>
						<a class="btn btn-primary" href="chatglobal.php?sala=1">Sala 1</a>
						<a class="btn btn-primary" href="chatglobal.php?sala=2">Sala 2</a>
						<?php
					}
					?>
				</div>
			</div>

			<!--   Core JS Files   -->
			<script src="assets/jquery.js"></script>
			<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
			<script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
			<script src="https://kit.fontawesome.com/07feefc044.js" crossorigin="anonymous"></script>
			<script src="assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>

			<script>
				function scrollDiv(){
					var div = document.getElementById('chat');
					div.scrollTop = '9999';
				}
			</script>
		</body>

		</html>