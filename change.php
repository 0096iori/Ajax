<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<title>登録情報の変更</title>
<body>
  <header>
    <h2>変更を完了しました</h2>
  </header>

<?php

try{

    $mail = $_POST["mail"];
    $pass = $_POST["pass1"];
    $name = $_POST["name"];
    $address1 = $_POST["address1"];
    $address2 = $_POST["address2"];
    $phone = $_POST["phone"];


    $dsn = "mysql:dbname=ajairu1;host=localhost";  // mysqlに接続
    $user = "members";
    $password = "root";


    $dbn = new PDO($dsn,$user,$password);


    // プレースホルダ(パラメータ化)
    $sql = "UPDATE `members` SET `mail address`=:mailaddress,`password`=:password,`name`=:name,`address1`=:address1,`address2`=:address2,`telephone number`=:telephonenumber WHERE id=1";

    // プリペアドステートメント
    $stmt = $dbn->prepare($sql);

    
    $params = array(':mailaddress' => $mail, ':password' => $pass, ':name' => $name, ':address1' => $address1, ':address2' => $address2,':telephonenumber' => $phone);

    $count2 = $stmt->execute($params);

    echo("メールアドレス：".$mail."<br>");
    echo("パスワード：".$pass."<br>");
    echo("お名前：".$name."<br>");
    echo("住所1：".$address1."<br>");
    echo("住所2：".$address2."<br>");
    echo("電話番号：".$phone."<br>");


      
    
}catch(Exception $e){
  exit();
}

?>

<a href="top.php">戻る</a>

</body>
</html>