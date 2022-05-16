<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<title>新規登録</title>
<body>

<?php

try{

    $mail = $_POST["mail"];
    $pass = $_POST["pass1"];
    $name = $_POST["name"];
    $address1 = $_POST["address1"];
    $address2 = $_POST["address2"];

    $phone = $_POST["phone"];

    $dsn = "mysql:dbname=ajairu1;host=localhost";
    $user = "members";
    $password = "root";


    $dbn = new PDO($dsn,$user,$password);


    // プレースホルダ(パラメータ化)
    $sql = "UPDATE `members` SET `id`=?,`mail address`=?,`password`=?,`name`=?,`address`=?,`address2`=?,`telephone number`=?";

    // プリペアドステートメント
    $stmt = $dbn->prepare($sql);

    $data2[] = $id;
    $data2[] = $mail;
    $data2[] = $pass;
    $data2[] = $name;
    $data2[] = $address1;
    $data2[] = $address2;
    $data2[] = $phone;

    $count2 = $stmt->execute($data2);

    //結果を表示
    // print $name;
    // print 'さんを追加しました。<br />';


      
    
}catch(Exception $e){
  exit();
}

?>

<a href="change2.php">戻る</a>

</body>
<<<<<<< HEAD
=======
</html>
>>>>>>> 4b27cf2d4e73ca67461030d239117dcd0e895e72
