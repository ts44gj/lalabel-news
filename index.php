<?php
if(mb_strlen ($_POST["title"])<30){
  echo "送信できません" ;}
if(empty($_post["title" ])){
  echo "送信できません";
}

if(empty($_POST["kiji"])){
  echo "送信できません" ;
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
     <ul>
       <div>
       <li class="title">
       <input type="text" name="title" >
      </li>
      </div>
      <div>
      <li class="kiji">
       <textarea row="10" cols="60" name="kiji"> </textarea>
       </li>
      </div>

      <li class="sousin">
       <input type="submit" name="sousin">
</li>
     </ul>
   </form>
</body>

</html>