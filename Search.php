<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>店舗検索結果</title>
  <script src="./script.js"></script>
</head>
<body>
<header>
<<<<<<< HEAD
    <link href="css/search.css"media="all" rel="stylesheet">
=======
    <link href="css/style.css"media="all" rel="stylesheet">
>>>>>>> 926f29f8256e2fb6f0c94c8b570afb49656e55e0
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</header>
</body>
</html>

<?php

//$key には受け取った条件（変数）を挿入
$key = "&keyword=".$_GET["keyword"];
$wifi = "&wifi=".$_GET["wifi"];
$course = "&course=".$_GET["course"];
$free_drink = "&free_drink=".$_GET["free_drink"];
$free_food = "&free_food=".$_GET["free_food"];
$private_room = "&private_room=".$_GET["private_room"];
$non_smoking = "&non_smoking=".$_GET["non_smoking"];
$charter = "&charter=".$_GET["charter"];
$parking = "&parking=".$_GET["parking"];
$midnight = "&midnight=".$_GET["midnight"];
$english = "&english=".$_GET["english"];

$api = "f8a3ef18e34e0c9b&format=json";
//表示する件数をここで変更できる
$count = "&count=20";
$url = "http://webservice.recruit.co.jp/hotpepper/gourmet/v1/?key=".$api.$key.$wifi.$course.$free_drink.$free_food.$private_room
       .$non_smoking.$charter.$parking.$midnight.$english.$count;
$json = file_get_contents($url);
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json,true);

if ($arr === NULL) {
  //なかった場合の処理
  return;
}else{
  //代入変数の宣言
  $json_count = count($arr["results"]["shop"]);
  $id = array();
  $name = array();
  $s_url = array();
  $img = array();
  $shop = array();
  $open = array();
  $close = array();
  $sid = array();

  //countした数まで表示
  for($i=0; $i<$json_count; $i++){
    $shop = $arr["results"]["shop"][$i];

    $name = $shop["name"];
    $s_url = $shop["urls"]["pc"];
    $img =  $shop["photo"]["pc"]["m"];
    $add = $shop["address"];
    $open = $shop["open"];
    $sid = $shop["id"];
    $close = $shop["close"];
    //$open = $shop

    //表示
    echo "<div class='fashionable-box3'>";
    echo "<div class='fashionable-box3_tape'>";
    echo "</div>";
    echo "<p class='fashionable-box3_title'>";
    echo "<a href='shop_detail.php?id=".$sid."'>";
    print_r($name);
    echo "</a>";
    echo "</p>";
    echo "<img src =".$img.">";
    echo "<p class='fashionable-box3_subtitle'>";
    echo $add;
    echo "</p>";
    echo "<p>";
    echo $open;
    echo "</br>";
    echo "定休日:".$close;
    echo "</p>";
    echo "</div>";

  }

}

?>
