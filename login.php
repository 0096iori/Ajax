<?php
    $dsn = "mysql:dbname=ajairu1;host=localhost";
    $user = "members";
    $password = "";

try {
    session_start();

    $dbh = new PDO($dsn, $user, $password);

    $name = $_POST["name"];
    $pass = $_POST["pass"];

    $sql = 'SELECT * FROM members WHERE name=:name and password=:pass';

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(":name", $name);
    $stmt->bindValue(":pass", $pass);

    $stmt->execute();

    while ($member = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($name == $member["name"] && $pass == $member["password"]) {
            //ログイン認証　成功
            $_SESSION["name"] = $name;
            header("Location:top.html");
            exit;
        } else if ($name != $member["name"] || $pass != $member["password"]) {
            //ログイン認証　失敗
            header("Location:error.html");
            exit;
        }
    }
} catch (PDOException $e) {
    print("DB Connection Error!<br>" . $e->getMessage());
    die();
}