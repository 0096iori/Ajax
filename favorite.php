<?php
$dsn = "mysql:dbname=ajairu1;host=localhost";
$user = "members";
$password = "root";

try {
    session_start();

    if (isset($_SESSION["member"]) and isset($_SESSION["sid"])) {
        $dbn = new PDO($dsn, $user, $password);

        $member = $_SESSION["member"];
        $shop = $_SESSION["sid"];

        if (isset($_POST["favorite"])) {
            $sql = "INSERT INTO `favorite`(`member_id`, `shop_id`) VALUES (:member_id, shop_id)";
            $stmt = $dbn->prepare($sql);

            $params = array(':member_id' => $member["id"], ':shop_id' => $shop);
            $bd = $stmt->execute($params);
        }
    }
} catch (PDOException $e) {
    print("DB Connection Error!<br>" . $e->getMessage());
    die();
}
