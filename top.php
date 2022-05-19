<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員ページ</title>
</head>

<body>
    <header>
        <h2>会員ページ</h2>
    </header>
    <main>
        <div class="center">
            <?php
            $dsn = "mysql:dbname=ajairu1;host=localhost";
            $user = "members";
            $password = "";

            session_start();

            if (isset($_SESSION["member"])) {
                $member = $_SESSION["member"];
            ?>
                <div id="top_content">
                    <p id="userName"><?= $member["name"] ?>様</p>
                    <div class="right">
                        <div class="btn_right2"><a href="newuser.html" class="input_btn3">会員情報変更</a></div>
                        <div class="btn_right2"><a href="login.html" class="input_btn3">ログアウト</a></div>
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
                <div id="top_mainContent">
                    <p>--コンテンツ領域--</p>
                </div>
                </div>
        </div>
    </main>
    <script>

    </script>
</body>

</html>