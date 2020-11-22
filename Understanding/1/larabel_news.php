<?php
$title  = "";//タイトルの変数を作成　ここに下で書いたタイトルが入れられる
$text = "" ;//記事の変数　
$ERROR = array();//エラーを確認するための配列

$FILE ="kiji.txt"; //ここに保存される
$id = uniqid(); //idの自動生成
$DATA = []; //一回分の投稿の情報を入れる
$BOARD = []; //全ての投稿の情報を入れる


//$FILEというファイルが存在する時
if(file_exists($FILE)){
    //ファイルを読み込む
    $BOARD = json_decode(file_get_contents($FILE));
}

if($_SERVER["REQUEST_METHOD"] === "POST"){

    //文字数制限
    if(mb_strlen($_POST["title"])>30){
        $ERROR[]="タイトルは30文字以内";
    }
    //タイトル未入力
    else if(empty($_POST["title"])){
        $ERROR[]="タイトルを入力してください";
    }
    else if(empty($_POST["text"])){
        $ERROR[]="記事を入力してください";
    }

    //下のタイトルと記事が空でなかったら
    else if(!empty($_POST["text"]) && !empty($_POST["title"])){
        
        //投稿ボタンが押された時
        $title = $_POST["title"];
        $text = $_POST["text"];
        //保存の処理
        //新規データ
        $DATA=[$id,$title,$text];
        $BOARD=$DATA;
        //全体配列をファイルに保存する
        file_put_contents($FILE,json_encode($BOARD));
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!--確認ダイアログを表示するための関数-->
    <script>
        function daialog(){
            let popup = confirm("入力に間違いはないですか？")

            return popup;
        }
    </script>

    <h1>Larabel_news</h1>
    <!--エラーメッセ表示-->
    <ul>
        <?php foreach($ERROR as $error_message):?>
         <li><?php echo $error_message;?></li>
        <?php endforeach;?>
    </ul>
    <!--投稿-->
    <form id="push" method="POST" name="larabel news" onsubmit="return dialig()">
    <div>
        <p>タイトル</p>
        <input type="text" name="title">
    </div>
    <div>
        <p>記事</p>
        <textarea row="10" cols="60" name="text"></textarea>
    </div>
    <div>
        <input type="submit" mame = "push" value="投稿">
    </div>
    </form>

    <!--コメント-->
    <hr>
    <div>
        <?php foreach ((array)$BOARD as $ARTICLE): ?>
        <p>
            <?php echo $ARTICLE[1];?>
        </p>
        <p>
            <?php echo $ARTICLE[2];?>
        </p>
        <!--記事全文・コメントへのリンク貼り付け id=$ARTICLE[0]でurlにidを付随-->
        <a hre="http://localhost/Understanding/1/larabel_news.php/?id=<?php echo $ARTICLE[0]?>">記事全文・コメント
    </a>
    <hr>
    </div>
        <?php endforeach;?>
</body>
</html>