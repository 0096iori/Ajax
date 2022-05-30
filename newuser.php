<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ログイン</title>
</head>

<title>メール送信</title>

<body>

  <?php

  try {
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


      $dbn = new PDO($dsn, $user, $password);



      // プレースホルダ(パラメータ化)
      $sql = "INSERT INTO `temporary`(`mail_address`, `password`, `deadline`) VALUES (:mailaddress,:password,CURRENT_DATE+5)";

      // プリペアドステートメント
      $stmt = $dbn->prepare($sql);


      $params = array(':mailaddress' => $_SESSION["mail"], ':password' => $_SESSION["pass"]);

      $count2 = $stmt->execute($params);

  ?>

      <body>
        <header>
          <h2>新規登録準備完了</h2>
        </header>
        <main>
          <div class="center">
            <p id="newuser_txt">指定されたメールアドレスへ確認メールを送信しました。</p>
            <div class="btn_center"><a href="newuser_buck.php" class="input_btn input_btn3">完了</a></div>
          </div>
        </main>
      </body>
  <?php
    }
  } catch (Exception $e) {
    exit();
  }

  ?>

</body>