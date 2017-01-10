<?php
$root='../';
session_start();
if (!isset($_SESSION['BLOG']['USER']))
{
	header("location:".$root."login.php");
}

include($root.'db.php');

$sql="select * from posts";
$posts=$db->query($sql);
$posts=$posts->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Document</title>
</head>
<body>
<h1>Blog Practice</h1>

<a href="add.php" class="btn btn-primary">修改</a>
<a href="../index.php" class="btn btn-primary">回首頁</a>
<table class="table table-responsive">
<thead>
<th>*</th>
<th>標題</th>
<th>文章內容</th>
<th>建立時間</th>
<th>更新時間</th>
<th>#</th>
</thead>
<tbody>
<?php
foreach ($posts as $key => $value):
?>
<tr>
<td><?=$value['id']?></td>
<td><?=$value['title']?></td>
<td><?=$value['post']?></td>
<td><?=$value['create_time']?></td>
<td><?=$value['update_time']?></td>
<td>

<a href="update.php?id=<?=$value['id']?>" class="btn btn-success">修改</a>
<a href="delete.php?id=<?=$value['id']?>" class="btn btn-danger">刪除</a>

</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</body>
</html>