<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員ページ</title>
</head>

<body>
    <div class="nanamestripe">
        <!-- <header>
        <h2>会員ページ</h2>
    </header> -->
        <main>
            <?php
            $dsn = "mysql:dbname=ajairu1;host=localhost";
            $user = "members";
            $password = "root";

            session_start();

            if (isset($_SESSION["member"])) {
                $member = $_SESSION["member"];
            ?>
                <div class="center" id="top_center">

                    <div id="top_content">
                        <p id="userName"><?= $member["name"] ?>様</p>
                        <div class="right">
                            <!-- <div class="btn_center"><a href="changeform.php" class="input_btn">会員情報変更</a></div>
                            <div class="btn_center"><a href="login.html" class="input_btn">ログアウト</a></div> -->
                            <a href="changeform.php" class="input_btn top_btn">会員情報変更</a>
                            <a href="login.html" class="input_btn top_btn">ログアウト</a>
                        </div>
                    </div>

                    <hr id="line">

                    <!--コンテンツ領域-->
                    <div id="top_mainContent">
                        <form action="Search.php" method="get" class="search_div">
                            <input type="search" name="keyword" placeholder="店名、キーワード、時間帯" class="key">
                            <input type="submit" class="input_btn" value="検索" class="search_btn">
                        </form>
                        <div id="favorite">
                            <a href="" class="input_btn top_btn">お気に入り</a>
                        </div>
                        <div>
                            <h4>おすすめのお店</h4>
                            <div id="recommendation">
                                <a href="shop_detail.php?id=J001286406"><img src="image/fd401527.jpg" alt="" class="photo"></a>
                                <a href="shop_detail.php?id=J001286406"><img src="image/beaf2.jpg" alt="" class="photo"></a>
                                <a href="shop_detail.php?id=J001286406"><img src="image/bread.jpg" alt="" class="photo"></a>
                                <a href="shop_detail.php?id=J001286406"><img src="image/chinese-st.jpg" alt="" class="photo"></a>
                                <a href="shop_detail.php?id=J001286406"><img src="image/cokkie.jpg" alt="" class="photo"></a>
                                <a href="shop_detail.php?id=J001286406"><img src="image/fried-salmon.jpg" alt="" class="photo"></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="center nopage">
                    <p>このページは表示できません</p>
                    <div class="btn_center"><a href="login.html" class="input_btn log_btn">ログイン画面へ</a></div>
                </div>
            <?php
            }
            ?>
    </div>
    </main>
    <script>

    </script>
</body>

</html>