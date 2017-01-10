<?php
$root='../';
session_start();
if (!isset($_SESSION['BLOG']['USER']))
{
	header("location:".$root."login.php");
}

include($root.'db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Document</title>
</head>
<body>
<h1>Blog Practice-add</h1>

<form action="add.php" method="post">
	<label>title</label>
	<input type="text" name="title" class="form-control">
	<label>Post</label>
	<input type="text" name="posts" class="form-control">
	<input type="submit" value="送出" class="btn btn-info">
	<input type="reset" value="重設" class="btn btn-primary">
</form>


</body>
</html>
<?php

if (isset($_POST['title']))
{
	$insert=$db->prepare("insert into posts (title,post) values (:title,:post)");
	$insert->bindParam(":title",$_POST['title']);
	$insert->bindParam(":post",$_POST['posts']);
	$insert->execute();
	header("location:index.php");
}

?>