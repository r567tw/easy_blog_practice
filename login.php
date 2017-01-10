<?php
$root='../';
session_start();
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>登入</title>
</head>
<body>
	<form action="login.php" method="post">
		<label>帳戶</label>
		<input type="text" name="account" class="form-control">
		<label>密碼</label>
		<input type="password" name="password" class="form-control">
		<input type="submit" class="btn btn-default">
	</form>
</body>
</html>
<?php

if (isset($_POST['account']))
{
	$find=$db->prepare("select * from admins where account=:account");
	$find->bindParam(":account",$_POST['account']);
	//print_r($find);
	$find->execute();
	$data=$find->fetch();

	if ($data['account'] !='' && !empty($data['account']))
	{
		if ($_POST['password']==$data['password'])
		{
			$_SESSION['BLOG']['USER']=$data['account'];
			header("location:index.php");
		}
		else
		{
			echo "<script>alert('密碼錯誤')</script>";
		}
	}
	else
	{
		echo "<script>alert('帳號不存在')</script>";
	}
}

?>