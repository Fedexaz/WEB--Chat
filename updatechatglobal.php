<?php
session_start();
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
?>