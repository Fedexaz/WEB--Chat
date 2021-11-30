<?php
session_start();

require("include/db.php");

$sala = $_POST['sala'];
$emisor = $_SESSION['username'];

$consulta = $mysqli -> query("INSERT INTO `chats` (`sender`, `msg`, `color`) VALUES ('".$_POST['sender']."', '".$_POST['mensaje']."', '".$_POST['color']."')");

if($consulta)
{

}

?>