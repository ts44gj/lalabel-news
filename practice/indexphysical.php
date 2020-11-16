<?php
$menber = array(
    "A" => array("height" => 150, "weight" => 45),
    "B" => array("height" => 160, "weight" => 55),
    "C" => array("height" => 180, "weight" => 80),
    "D" => array("height" => 170, "weight" => 70),
    "E" => array("height" => 175, "weight" => 65) 
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
    <?php foreach ($menber as $key => $physical): ?>
        <P>
        <?php echo "{$key}さん{$physical["height"]}cm{$physical["weight"]}kg"
        ?>
        </p>
    <?php endforeach;?>
    
</body>
</html>