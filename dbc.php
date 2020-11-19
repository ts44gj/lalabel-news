<?php
//変数を用意
$dsn = "mysql:host=localhost;dbname=laravel_news;charset=utf8"; //DBの場所、名前
$user = "ts44gj"; //DBのユーザ名
$pass = "ts44gj"; //DBのパスワード

//文字化け防止
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET 'utf8'");

//PHPのエラーを表示する
error_reporting(E_ALL &~E_NOTICE);

//DB接続　setAttributeからエラー表示
try {
    $dbh = new PDO ($dsn,$user,$pass,$options);
    $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo $e->getMessage();
    exit;
}


// SQL文とその中のパラメータを変数にすることもできる
//$sql = 'SELECT  '商品', '価格' WHERE '商品ID' = $shohin_id';
//$dbh->query($sql);

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