<?php
$title="";
$kiji="";

if ($_SERVER["REQUEST_METHOD"] === "POST"){

 if(!empty($_POST["kiji"]) && !empty($_POST["title"])){
  $title=$_POST["title"];
  $kiji=$_POST["kiji"];
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