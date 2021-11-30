<?php
session_start();
if(isset($_SESSION['login']))
{
	if($_SESSION['login'])
	{
		header("Location: index.php");	
	}
}
include("basedatos/db.php");

$pass = $_POST['pass'];
$pass_2 = $_POST['pass_2'];

if(md5($_POST['pass']) != md5($_POST['pass_2']))
{
	header("Location: registro.php?error=1");
	exit();
}

$consulta = $mysqli -> query("SELECT pass FROM usuarios WHERE usuario='".$_POST['user']."'");

if($consulta->num_rows == 0)
{
	$pass_enc = md5($pass);

	$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
	$color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];

	$consulta = $mysqli -> query("INSERT INTO `usuarios` (`usuario`, `pass`, `color`) VALUES ('".$_POST['user']."', '".$pass_enc."', '".$color."')");

	if($consulta)
	{
		header("Location: login.php?oklogin=1");
	}
	else
	{
		header("Location: registro.php?error=2");
		exit();
	}
}
else
{
	header("Location: registro.php?error=3");
	exit();
}

$mysqli -> close();

?>