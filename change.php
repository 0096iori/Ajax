<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>会員情報変更 完了</title>
</head>

<header>
        <h2>会員情報変更 完了</h2>
    </header>
<main>

  <?php

  try {
    session_start();
    if (isset($_SESSION["member"])) {
      $id = $_SESSION["member"]["id"];
      $mail = $_POST["mail"];
      $pass = $_POST["pass1"];
      $name = $_POST["name"];
      $address1 = $_POST["address1"];
      $address2 = $_POST["address2"];
      $phone = $_POST["phone"];


      $dsn = "mysql:dbname=ajairu1;host=localhost";  // mysqlに接続
      $user = "members";
      $password = "root";


      $dbn = new PDO($dsn, $user, $password);


      // プレースホルダ(パラメータ化)
      $sql = "UPDATE `members` SET `mail_address`=:mailaddress,`password`=:password,`name`=:name,`address1`=:address1,`address2`=:address2,`telephone_number`=:telephonenumber WHERE `id`=:id";

      // プリペアドステートメント
      $stmt = $dbn->prepare($sql);


      $params = array(':mailaddress' => $mail, ':password' => $pass, ':name' => $name, ':address1' => $address1, ':address2' => $address2, ':telephonenumber' => $phone, ':id' => $id);

      $count2 = $stmt->execute($params);

      $_SESSION["member"]["id"] = $id;
      $_SESSION["member"]["mail_address"] = $mail;
      $_SESSION["member"]["password"] = $pass;
      $_SESSION["member"]["name"]= $name;
      $_SESSION["member"]["address1"] = $address1;
      $_SESSION["member"]["address2"] = $address2;
      $_SESSION["member"]["telephone_number"] = $phone;


  ?>
      <div class="center" id="change_text">
        <table>
          <tr>
            <td class="change_index">メールアドレス　：　<?= $mail ?></td>
          </tr>
          <tr>
            <td class="change_index">パスワード　：　<?= $pass ?></td>
          </tr>
          <tr>
            <td class="change_index">お名前　：　<?= $name ?></td>
          </tr>
          <tr>
            <td class="change_index">住所1　：　<?= $address1 ?></td>
          </tr>
          <tr>
            <td class="change_index">住所2　：　<?= $address2 ?></td>
          </tr>
          <tr>
            <td class="change_index">電話番号　：　<?= $phone ?></td>
          </tr>
        </table>
        <div class="btn_center">
          <a href="top.php" class="input_btn input_btn3">戻る</a>
        </div>
      </div>

  <?php
    } else {
      echo ("ログイン失敗 <br>");
      echo ("<a href='login.html'>再ログイン</a>");
    }
  } catch (Exception $e) {
    exit();
  }

  ?>

</main>

</html>