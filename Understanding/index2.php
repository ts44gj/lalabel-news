<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
$myName ="田中";
$myHeight = "181";
$myWeight = "65";
$myBMI = $myWeight / (($myHeight**2)/10000);

$name = ["田中","山根","小杉"];


/*$menber = [
["name" => "田中", "weight"=> "65"],
["name" =>"山根", "weight" =>"55"],
];*/
/*
    /*$myName = $name[$i];
    for($i=0;$i<3;$i++){
    print $myName."、こんにちは<br>";
    print "あなたの体重は{$myWeight}kg<br>";
    print "あたなの身長は{$myHeight}cm<br>";
    print "あなたのBMIは{$myBMI}です<br>";
    print $myName."、さようなら<br>"; }
    exit();*/

    //print $menber[1]["weight"];


    are("田中",188,60);
  
    are("山根",181,55);
  
    are("小杉",170,110);
  
    function calcBMI($he,$we){
        $bmi = $we/(($he**2)/10000);
        return $bmi;
    }

    //例のあの処理
    function are($na,$he,$we) {
        print $na."、<br>";
        print "こんにちは<br>";
        print "身長　$he<br>";
        print "調子はどう？<br>";
        print "体重　$we<br>";
        print "じゃあ元気でね<br>";
        $bmi = calcBMI($he,$we);
        print "bmiは".$bmi."<br>";
        print "<br>";
    }
    function batu(){
        print "バイバイ<br>";
       
    }
    
    ?>
    
</body>
</html>