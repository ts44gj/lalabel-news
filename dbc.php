<?php

$dsn = "mysql:host=localhost;dbname=laravel_news;charset=utf8";
$user = "ts44gj";
$pass = "ts44gj";

$dbh = new PDO ($dsn,$user,$pass);
var_dump($dbh);

?>
