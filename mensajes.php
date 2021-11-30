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
				}}
			</style>
		</head>

		<body>
			<div class="nav-menu">
				<ul>
					<li><h4 style="font-weight: 800;" class="text-center text-primary">Chattt</h4></li>
					<li><a href="index.php"><i class="material-icons" style="font-size: 26px;">home</i><span>Inicio </span><span class="badge badge-pill badge-warning">soon!</span></a></li>
					<li><a href="perfil.php"><i class="material-icons" style="font-size: 26px;">perm_identity</i><span>Perfil </span><span class="badge badge-pill badge-warning">soon!</span></a></li>
					<li><a class="active" href="mensajes.php"><i class="material-icons" style="font-size: 26px;">forum</i><span>Mensajes </span></a></li>
					<li><a href="chatglobal.php"><i class="material-icons" style="font-size: 26px;">public</i><span>Chat global </span></a></li>
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
					<h2>Fixed Full-height Side Nav</h2>
					<h3>Try to scroll this area, and see how the sidenav sticks to the page</h3>
					<p>Notice that this div element has a left margin of 25%. This is because the side navigation is set to 25% width. If you remove the margin, the sidenav will overlay/sit on top of this div.</p>
					<p>Also notice that we have set overflow:auto to sidenav. This will add a scrollbar when the sidenav is too long (for example if it has over 50 links inside of it).</p>
					<p>Some text..</p>
					<p>Some text..</p>
					<p>Some text..</p>
					<p>Some text..</p>
					<p>Some text..</p>
					<p>Some text..</p>
					<p>Some text..</p>
					<p>Some text..</p>
					<p>Some text..</p>
					<p>Some text..</p>
					<p>Some text..</p>
					<p>Some text..</p>
					<p>Some text..</p>
					<p>Some text..</p>
					<p>Some text..</p>
					<p>Some text..</p>
					<p>Some text..</p>
					<p>Some text..</p>
					<p>Some text..</p>
					<p>Some text..</p>
				</div>
			</div>

			<!--   Core JS Files   -->
			<script src="assets/jquery.js"></script>
			<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
			<script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
			<script src="https://kit.fontawesome.com/07feefc044.js" crossorigin="anonymous"></script>
			<script src="assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
		</body>

		</html>