<?php
$root='../';
session_start();
if (!isset($_SESSION['BLOG']['USER']))
{
	header("location:".$root."login.php");
	exit();
}

include($root.'db.php');

if (isset($_GET['id']))
{
	$insert=$db->prepare("delete from posts where id=:id");
	$insert->bindParam(":id",$_GET['id']);
	$insert->execute();
	header("location:index.php");
}

?>