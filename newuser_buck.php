<?php
    $dsn = "mysql:dbname=ajairu1;host=localhost";
    $user = "members";
    $password = "root";

    

try {
    session_start();

    $dbn = new PDO($dsn, $user, $password);

    $mail = $_SESSION["mail"];
    $pass = $_SESSION["pass"];
    $name = $_SESSION["name"];
    $address1 = $_SESSION["address1"];
    $address2 = $_SESSION["address2"];
    $phone = $_SESSION["phone"];
    // プレースホルダ(パラメータ化)
    $sql = "INSERT INTO `members`(`mail_address`, `password`, `name`,`address1`,`address2`,`telephone_number`) VALUES (:mailaddress,:password,:name,:address1,:address2,:telephonenumber)";

    // プリペアドステートメント
    $stmt = $dbn->prepare($sql);

    
    $params = array(':mailaddress' => $mail, ':password' => $pass, ':name' => $name, ':address1' => $address1, ':address2' => $address2, ':telephonenumber' => $phone);

    $count2 = $stmt->execute($params);

    header("Location:login.html");

} catch (PDOException $e) {
    print("DB Connection Error!<br>" . $e->getMessage());
    die();
}