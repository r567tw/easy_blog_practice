<?php
$root='../';
session_start();
if (!isset($_SESSION['BLOG']['USER']))
{
	header("location:".$root."login.php");
}

include($root.'db.php');
$id=$_GET['id'];
$post=$db->query("select * from posts where id='".$id."'");
$post=$post->fetch();
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

<form action="update.php" method="post">
<input type="hidden" name="id" class="form-control" value="<?=$post['id']?>">
	<label>title</label>
	<input type="text" name="title" class="form-control" value="<?=$post['title']?>">
	<label>Post</label>
	<input type="text" name="posts" class="form-control" value="<?=$post['post']?>">
	<input type="submit" value="送出" class="btn btn-info">
	<input type="reset" value="重設" class="btn btn-primary">
</form>


</body>
</html>
<?php

if (isset($_POST['title']))
{
	$insert=$db->prepare("update posts set title=:title,post=:post,update_time=:update where id=:id");
	$insert->bindParam(":title",$_POST['title']);
	$insert->bindParam(":post",$_POST['posts']);
	$insert->bindParam(":update",date("Y:m:d H:i:s"));
	$insert->bindParam(":id",$_POST['id']);
	$insert->execute();
	header("location:index.php");
}

?>