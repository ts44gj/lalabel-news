<?php
// データベースへ接続
$mysqli = new mysqli( 'localhost', 'ts44gj', 'ts44gj', 'laravel_news');

// 接続エラーの確認
if( $mysqli->connect_errno ) {
	echo $mysqli->connect_errno . ' : ' . $mysqli->connect_error;
}
$mysqli->set_charset('utf8');

$sql = 'SELECT * FROM data_table';
$res = $mysqli->query($sql);

if( $res ) {
	var_dump($res->fetch_all());
}
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
</body>
</html>