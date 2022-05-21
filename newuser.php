<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<title>メール送信</title>
<body>

<?php

try{
  if (isset($_POST["mail"])) {
    session_start();
    $_SESSION["mail"] = $_POST["mail"];
    $_SESSION["pass"] = $_POST["pass1"];
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["address1"] = $_POST["address1"];
    $_SESSION["address2"] = $_POST["address2"];
    $_SESSION["phone"] = $_POST["phone"];


    $dsn = "mysql:dbname=ajairu1;host=localhost";
    $user = "members";
    $password = "root";


    $dbn = new PDO($dsn,$user,$password);

    

    // プレースホルダ(パラメータ化)
    $sql = "INSERT INTO `temporary`(`mail_address`, `password`, `deadline`) VALUES (:mailaddress,:password,CURRENT_DATE+5)";

    // プリペアドステートメント
    $stmt = $dbn->prepare($sql);

    
    $params = array(':mailaddress' => $_SESSION["mail"], ':password' => $_SESSION["pass"]);

    $count2 = $stmt->execute($params);
    
    ?>
    <header>
      <h2>新規登録準備完了</h2>
    </header>
    <main>
      <p>指定されたメールアドレスへ確認メールを送信しました。</p>
      <div class="btn"><a href="newuser_buck.php" class="btn">完了</a></div>
    </main>
  <?php
  }
    
}catch(Exception $e){
  exit();
}

?>

</body>