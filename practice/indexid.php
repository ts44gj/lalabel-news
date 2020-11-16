<?php
    $posts = [
        ["A33D5BDF","0番目の配列です"],
        ["A3F994AB","1番目の配列です"],
        ["F7914A3F","2番目の配列です"],
        ["A20A19AD","3番目の配列です"],
        ["0BBf9BA5","4番目の配列です"]
    ];
   // $posts_info=[$posts("A20A19AD")]
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    echo "{$posts[2][1]}";
    ?>
    <hr>
    <?php foreach($posts as $value): ?>
    <p>
        <?php
        echo $value[0];
        ?>
    </p>
    <?php endforeach;  ?>
    <hr>
    <?php foreach($posts as $posts_aaa):?> 
        <?php
        if($posts[3]){
            $posts_info=$posts[3];
        }
       ?>
       <?php endforeach ; ?> 
   <?php print_r($posts_info) ?>
</body>
</html>