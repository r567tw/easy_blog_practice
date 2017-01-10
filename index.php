<?php
$root='./';
session_start();
if (!isset($_SESSION['BLOG']['USER']))
{
	header("location:".$root."login.php");
}

include("db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>已登入</title>
</head>
<body>
	<h1>已登入</h1>
	<a href="posts">部落格文章列表</a>
	<a href="logout.php">登出</a>		
</body>
</html>