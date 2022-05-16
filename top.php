<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員ページ</title>
</head>

<body>
    <main>
        <div class="center">
            <?php
            session_start();
            if (isset($_SESSION["name"])) {
                $dbh = new PDO($dsn, $user, $password);
                $id = $POST["id"];
                $name = $_SESSION["name"];

                $sql = "SELECT * FROM members WHERE id=:id";
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue(":id", $id);
                $stmt->execute();
                $members = $stmt->fetch();
            ?>
                <p><?php $members["name"] ?>様</p>
                <!--変数を渡してもらい、氏名のところに代入-->
                <div class="right">
                    <span><a href="./ここにリンクを書き込み/">会員情報変更</a></span>
                    <span><a href="login.html">ログアウト</a></span>
                </div>

            <?php
            } else {
            ?>
            <p>このページは表示できません</p>
            <a href="login.html">ログイン画面へ</a>
            <?php
            }

            ?>



            <hr id="line">

            <!--コンテンツ領域-->
            <p>--コンテンツ領域--</p>
        </div>
    </main>
    <script>

    </script>
</body>

</html>