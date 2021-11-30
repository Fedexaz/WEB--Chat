<?php 
session_start();

require("basedatos/db.php");

$consulta = $mysqli -> query("SELECT pass FROM usuarios WHERE usuario='".$_POST['user']."'");

if($consulta->num_rows > 0)
{
	while ($fila = $consulta -> fetch_assoc())
	{
		if($fila['pass'] == md5($_POST['pass']))
		{
			$consulta2 = $mysqli -> query("SELECT * FROM usuarios WHERE usuario='".$_POST['user']."'");
			if($consulta2)
			{
				while ($fila2 = $consulta2 -> fetch_assoc())
				{
					$_SESSION['login'] = true;
					$_SESSION['username'] = $fila2['usuario'];
					$_SESSION['color'] = $fila2['color'];
					header("Location: index.php");
				}
			}
			else
			{
				header("Location: login.php?error=2");
				exit();
			}
		}
		else
		{
			header("Location: login.php?error=1");
			exit();
		}
	}
}
else
{
	header("Location: login.php?error=3");
	exit();
}

$mysqli -> close();
?>