<?php 
$user = 'ts44gj';
$password = 'ts44gj';
$db = 'laravel_news'; 
$host = 'localhost';
$port = 3306;
$link = mysqli_init();
$success = mysqli_real_connect(
  $link,
  $host,
  $user,
  $password,
  $db,
  $port
);
$query =  "SELECT * FROM `data_table`";
if($success){
    $result =  mysqli_query($link,$query);
    while($row = mysqli_fetch_array($result)){
        $BOARD[]= [$row["id"],$row["title"],$row["article"]];
    }
  }


$uniqueId = uniqid(); //ユニークなIDを自動生成

$id = $_GET['id'];
$FILE = './article.txt';
$FILE =  $sql = "SELECT　* FROM　  data_table";//data_tableより閲覧
$file = json_decode(file_get_contents($FILE));
$page_data = [];

//$COMMENT_DATA = './comment.txt';
$COMMENT_DATA =$sql = "SELECT　* FROM　  comment_table";//comment_tableより閲覧
$comment_data = json_decode(file_get_contents($COMMENT_DATA));
$comment_board = []; //全体配列
$text = '';
$DATA = []; //追加するデータ
$COMMENT_BOARD = []; //表示する配列

$error_message = [];

// ページの情報をココで取得
foreach ($file as $index => list($ID)) {
  if ($ID == $id) {
    $page_data = $file[$index];
  }
}

//["id","articleId","text"]
// コメントの情報をここで習得
foreach ($comment_data as $index => list($key, $comment_id)) {
  $comment_board[] = $comment_data[$index];
  if ($comment_id == $id) {
    $COMMENT_BOARD[] = $comment_data[$index];
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //$_POSTはHTTPリクエストで渡された値を取得する
  //リクエストパラメーターが空でなければ
  if (!empty($_POST['txt'])) {
    //投稿ボタンが押された場合
    if (mb_strlen($_POST['txt']) > 50) {
      $error_message[] = "コメント数は50文字以内でお願いします。";
    } else {

      //$textに送信されたテキストを代入
      $text = $_POST["txt"];

      //新規データ
      $DATA =[$uniquedId, $id , $text];
      //新規データを全体配列に代入する
      $comment_board[] = $DATA;

      //全体配列をファイルに保存する
      file_put_contents($COMMENT_DATA,json_encode($comment_board));


  //header()で指定したページにリダイレクト
    //今回は今と同じ場所にリダイレクト（つまりWebページを更新）
    header('Location: ' . $_SERVER['REQUEST_URI']);
    //プログラム終了
    exit;
    }
  } else if (isset($_POST['del'])) {
    //削除ボタンが押された場合

    //新しい全体配列を作る
    $NEWBOARD = [];

    //削除ボタンが押されるとき、すでに$BOARDは存在している
    foreach ($comment_board as $index => $DATA) {
      //$_POST['del']には各々のidが入っている
      //保存しようとしている$DATA[0]が送信されてきたidと等しくないときだけ配列に入れる
      if ($comment_board[$index][0] !== $_POST['del']) {
        $NEWBOARD[] = $DATA;
      }
    }
    //全体配列をファイルに保存する
    file_put_contents($COMMENT_DATA, json_encode($NEWBOARD));

    //header()で指定したページにリダイレクト
    //今回は今と同じ場所にリダイレクト（つまりWebページを更新）
    header('Location: ' . $_SERVER['REQUEST_URI']);
    //プログラム終了

     //sqlでの出力
     $sql = "INSERT into comment_table(uniquedId,id,text1) VALUES (:uniquedId,:id,:text1)";
     try {
       $stmt=$dbh->prepare($sql);
       $stmt->bindValue(":uniquedId",$uniquedId,PDO::PARAM_STR);
       $stmt->bindValue(":id,",$id,PDO::PARAM_STR);
       $stmt->bindValue(":text1",$_POST["txt"],PDO::PARAM_STR);
       $check=$stmt->execute();
     if($check){
     print "成功！";
     }else{
     print "失敗！";
     };
     } catch (PDOException $e){
       echo $e->getMessage();
       exit;
     }
   

    exit;
  } else if (empty($_POST['txt'])) {
    $error_message[] = "コメントは必須です。";
  }
}

?>
 

 <!DOCTYPE html>
<html lang="ja">

<head>
  <meta name="viewport" content="width=device-width, initial-scale= 1.0">
  <meta http-equiv="content-type" charset="utf-8">
  <link rel='stylesheet' href='./css/article.css' type="text/css">
  <title>Laravel news</title>
</head>

<body>
  <h1 class='title link'><a href='/'>Laravel News</a></h1>

  <section class="main">
    <div class='content'>
      <h2 class="subTitle"><?php echo $page_data[1]; ?></h2>
      <p class='article'><?php echo $page_data[2]; ?></p>
    </div>
    <!-- エラーメッセージ -->
    <ul>
      <?php foreach ($error_message as $error) : ?>
        <li>
          <?php echo $error ?>
        </li>
      <?php endforeach; ?>
    </ul>
    <div class='commentContainer'>
      <!-- コメント表示部分 -->
      <form method="post" class="commentForm">
        <textarea name="txt" class="inputFlex commentInput"></textarea>
        <input type="submit" value="コメントを書く" name='<?php echo $id; ?>' class="commnetSubmitStyle">
      </form>
      <?php foreach ((array)$COMMENT_BOARD as $DATA) : ?>
        <div class="commentContent">
          <p>
            <?php echo $DATA[2] ?>
          </p>
          <div>
            <form method="post">
              <input type="hidden" name="del" value="<?php echo $DATA[0]; ?>">
              <input type="submit" value="コメントを消す" class="deleteComment">
            </form>
          </div>
        </div>

      <?php endforeach; ?>
    </div>
  </section>
</body>

</html>