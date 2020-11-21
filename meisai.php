<?php 
$dsn = "mysql:host=localhost;dbname=laravel_news;charset=utf8"; //DBの場所と名前
$user = "ts44gj";//ユーザー名
$pass = "ts44gj";//パスワード

//文字化け防止
$potion = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET 'utf8'");

//PHPのエラーを表示する
error_reporting(E_ALL &~E_NOTICE);

//DB接続　setAttributeからエラー表示
try{
    $dbh = new PDO ($dsn,$yser,$pass,[
      PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION]);
}catch(PDOException $e){
    echo $e->getMessage(); 
}


$uniquedId = uniqid(); //ユニークなIDを作成。

$id = $_GET["id"];
//$FILE = "article.txt";
$FILE =  $sql = "SELECT　* FROM　  date_table";//date_tableより閲覧
$file = json_decode(file_get_contents($FILE));
$page_deta= [];

$COMMENT_DATE = "comment.txt";
$comemnt_date = json_decode(file_get_contents($COMMENT_DATE));
$comment_board = [];//全体配列
$text = "";
$DATE = []; //追加するデータ
$COMMENT_BOARD = []; //表示する配列

$error_message= [];

//ページの情報をココで習得
foreach($file as $index => list($ID)){
  if($ID == $id) {
    $page_date  = $file[$index];
  }
}

//["id","articleId","text"]
// コメントの情報をここで習得
foreach ($comemnt_date as $inex => list($key,$article_id)){
  $comment_board[] = $comemnt_date[$index];
  if($article_id == $id){
    $COMMENT_BOARD[] = $comment_date[$index];
  }
}

if($_REQUEST["REQUEST_METHOD"] ==="POST"){
  //$_POSTはHTTPリクエストで渡された値を習得する
  //リクエストパラメータがからでなければ
  if(!empty($_POST["txt"])){
    //投稿ボタンが押された場合
    if(mb_strlen($POST["txt"]) > 50){
      $error_message[] = "コメントは50文字以内でお願いします";
    }else{

      //$textに送信されたテキストを代入
      $text = $_POST["txt"];

      //新規データ
      $DATE =[$uniquedId, $id , $text];
      //新規データを全体配列に代入する
      $comment_board[] = $DATE;

      //全体配列をファイルに保存する
      file_put_contents($COMMENT_DATE,json_encode($comment_board));

      header("Location: ". $_SERVER["REQUEST_URI"]);

    }
  }


}

?>
 

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>記事詳細ページ</title>
</head>
<body>
  <h2> <?php echo $page_date[1]; ?></h2>
  <p><?php echo $page_date[2] ?></p>



  


</body>
</html>