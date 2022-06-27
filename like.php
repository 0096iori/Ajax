<?php

$dsn = "mysql:dbname=ajairu1;host=localhost";
$user = "favorite";
$password = "";

try{
    session_start();

    $dbh = new PDO($dsn, $user, $password);

    $id = $_POST["id"];
    $mid = $_POST["mid"];
    $sid = $_POST["sid"];

    $sql = "SELECT * FROM";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->bindValue(":mid", $mid);
    $stmt->bindValue(":sid", $sid);
    $stmt->execute();
}