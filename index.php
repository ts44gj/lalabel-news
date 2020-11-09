<?php
$title=""; //タイトルの変数
$text=""; //テキストの変数
$ERRO=array();//エラーを確認するための変数

$FILE = "article.txt"; //保存ファイル名
$id = uniqid(); //ユニークなIDを自動生成
$DATE = []; //一回分の投稿の情報を入れる
$BOARD = []; //全ての投稿の情報を入れる



//$FILEというファイルが存在する時
if (file_exists($FILE)){
  //ファイルを読み込む
$BOARD = json_decode(file_get_contents($FILE));

}
if ($_SERVER["REQUEST_METHOD"] === "POST"){
  //リクエストパラメータがからでなければ
if(!empty($_POST["text"]) && !empty($_POST["title"])){
   //投稿ボタンが押された時

   //$textに送信されたテキストを送信
 $title=$_POST["title"];
 $text=$_POST["text"];
  //この後に保存の処理をする
  //新規データ
  $DATE=[$id,$title,$text];
  $BOARD[] = $DATE;
  
  //全体配列をファイルに保存する
  file_put_contents($FILE, json_encode($BOARD)); 

 }
}
//この下に入力チェックを記入する
  //タイトル
if(empty($_POST["title"])){
  $ERRO[]="タイトルを入力してください";
}
  //タイトルの文字制限
if(mb_strlen($_POSR["title"])>30){
  $ERRO[]="タイトルは30文字以内で入力してください";
}
  //記事
if(empty($POST["text"])){
  $ERRO[]="記事を入力してください";
}

?>
<!DOCTYPE html>
 <html>

 <head>
  <meta charset='utf-8'>
  <title>larabelnews<</title>
  <!--<link rel="stylesheet" href="stylesheet.css">-->
 </head>

 <body>


 <!--確認ダイアログを表示するための関数-->
 <script>
  function dialog(){
    let popup =confirm("入力に間違いはないですか？")

    return popup;
    }　
 </script>

  <h1>larabalnews</h1>
     <!--エラーメッセージの表示-->
     <ul>
      <?php foreach($ERRO as $erro_message): ?>
      <li><?php echo $erro_message; ?></li>
      <?php endforeach;?>
      </ul>

  <!--投稿-->
   <form id="push"  method="POST" name="lalavel news"  onsubmit="return dialog()"> 
      <div>
         <p>タイトル</p>
          <input type="text" name="title" >
      </div>
      <div>
          <p>記事</p>
          <textarea row="10" cols="60" name="text"> </textarea>
      </div>
      <div>
          <input type="submit" name="push" value="投稿"　onclick="alert()">
      </div>
   </form>

  <!--コメント-->
  <hr>
  <div>
     <!--$BOARDから$ARTICLEへ移行？-->
      <?php foreach ((array)$BOARD as $ARTICLE)  : ?>
  </div>
  <p>
      <?php echo $ARTICLE[1];?>
  </p>
  <p>
      <?php echo $ARTICLE[2];?>
  </p>
  <div>
    <?php endforeach; ?>
  </div>

 </body>

</html>
