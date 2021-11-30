<?php
require("basedatos/db.php");

session_start();

date_default_timezone_set("America/Argentina");

if(isset($_SESSION['login']))
{
	if($_SESSION['login'])
	{
		header("Location: index.php");	
	}
}

$sala = $_POST['sala'];
$hora = date("H:i");

if($sala == md5(1))
{
	$emisor = $_SESSION['username'];

	$consulta = $mysqli -> query("INSERT INTO `chat_global` (`emisor`, `mensaje`, `hora`, `color`, `sala`) VALUES ('".$emisor."', '".$_POST['mensaje']."', '".$hora."', '".$_SESSION['color']."', '1')");

	if($consulta)
	{
		header("Location: chatglobal.php?sala=1");
	}
}

if($sala == md5(2))
{
	$emisor = $_SESSION['username'];

	$consulta = $mysqli -> query("INSERT INTO `chat_global` (`emisor`, `mensaje`, `hora`, `color`, `sala`) VALUES ('".$emisor."', '".$_POST['mensaje']."', '".$hora."', '".$_SESSION['color']."', '2')");

	if($consulta)
	{
		header("Location: chatglobal.php?sala=2");
	}
}

?>