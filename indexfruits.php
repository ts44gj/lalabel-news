
<?php 
$fruits = array(
'apple' => 'りんご',
'banana' => 'バナナ',
'orange' => 'オレンジ',
'grape' => 'ぶどう',
'peach' => 'もも',
'pineapple' => 'パイナップル'
   );
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php foreach ((array)$fruits as $frurs_ja) : ?>

    <p>
      <?php echo $frurs_ja ?>
    </p>

  <?php endforeach;  ?>
    
    
</body>
</html>
