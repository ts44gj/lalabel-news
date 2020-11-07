<?php
$title="";
$kiji="";

$FILE = `article.text`;
$id = uniqid();
$DATE = [];
$BOARD + [];

if (file_exists($FILE)){
 $BOARD = json_decode(file_get_contents($FILE));

if ($_SERVER["REQUEST_METHOD"] === "POST"){

 if(!empty($_POST["kiji"]) && !empty($_POST["title"])){
  $title=$_POST["title"];
  $kiji=$_POST["kiji"];
  
  $DATE=[$id,$title,$text];
  $BOARD[] = $DATE;
  
  file_put_contents($FILE, json_encode($BOARD)); 
 }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <title>lalabelnews<</title>
</head>

<body>
   <form method="POST" name="lalavel news" > 
       <div>
       <input type="text" name="title" >
      </div>
      <div>
       <textarea row="10" cols="60" name="kiji"> </textarea>
      </div>
       <input type="submit" name="sousin">
   </form>

    <h3>
     <?php echo $title ?>
    </h3>
    <p>
    <?php echo $kiji ?>
    </p>
</body>

</html>
