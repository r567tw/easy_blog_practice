<?php
$host="localhost";
$user="root";
$password="password";

$dsn = "mysql:host=localhost;dbname=test";
$db = new PDO($dsn, $user,$password );
//$result=$db->query("select * from admins");
//print_r($result->fetchAll());


?>