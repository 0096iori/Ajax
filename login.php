<?php
    $dsn = "mysql:dbname=ajairu1;host=localhost";
    $user = "members";
    $password = "root";

try {
    session_start();

    $dbh = new PDO($dsn, $user, $password);

    $mail = $_POST["mail"];
    $pass = $_POST["pass"];

    $sql = 'SELECT * FROM members WHERE mail_address=:mail and password=:pass';

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(":mail", $mail);
    $stmt->bindValue(":pass", $pass);
    $stmt->execute();

    if ($member = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //ログイン認証　成功

        // パスワード情報のみ、セッションから削除（プライバシーの点により）
        unset($member["password"]);
        $_SESSION["member"] = $member;
        header("Location:top.php");
    }else{    
        //ログイン認証　失敗
        header("Location:error.html");
    }
} catch (PDOException $e) {
    print("DB Connection Error!<br>" . $e->getMessage());
    die();
}