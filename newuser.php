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
    $deadline = $_POST["deadline"];
   
    $dsn = "mysql:dbname=ajairu1;host=localhost";  // mysqlに接続
    $user = "temporary";
    $password = "";


    $dbn = new PDO($dsn,$user,$password);


    // プレースホルダ(パラメータ化)
    $sql = "INSERT INTO `members`(`id`, `mail address`, `password`, `name`, `address`, `address2`, `telephone number`) VALUES (?,?,?,?,?,?,?)";



    // プリペアドステートメント
    $stmt = $dbn->prepare($sql);

    $data[] = $id;
    $data[] = $mail;
    $data[] = $pass;
    $data[] = $deadline;
    
  
    $count = $stmt->execute($data);

    //結果を表示
    print $name;
    print 'さんを追加しました。<br />';


      
    
}catch(Exception $e){
  exit();
}

?>

<a href="newuser2.php">戻る</a>

</body>
</html>
