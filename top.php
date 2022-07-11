<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="css/slider.css">
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
                            <a href="favorite_list.php" class="input_btn top_btn" id="favorite_btn">お気に入り一覧</a>
                        </div>
                        <div id="keep">
                            <a href="todo_list.php" class="input_btn top_btn" id="keep_btn">検討リスト一覧</a>
                        </div>
                        <div>
                            <h4>おすすめのお店</h4>
                            <div id="recommendation">
                                <ul class="slider">
                                <?php
                                $api = "key=f8a3ef18e34e0c9b";
                                $format = "format=json";
                                $address = "address=".$member["address1"];
                                $count = "count=60";
                                $url = "http://webservice.recruit.co.jp/hotpepper/gourmet/v1/?".$api."&".$format."&".$address."&".$count;
                                $json = file_get_contents($url);
                                $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                                $arr = json_decode($json,true);
                                
                                if ($arr === NULL) {
                                    //なかった場合の処理
                                    return;
                                }else{
                                    //代入変数の宣言
                                    $json_count = count($arr["results"]["shop"]);
                                
                                    //countした数まで表示
                                    for($i=0; $i<$json_count; $i++){
                                    $shop = $arr["results"]["shop"][$i];
                                    $name = $shop["name"];
                                    $img =  $shop["photo"]["pc"]["l"];
                                    $id = $shop["id"];
                                    //$open = $shop
                                
                                    echo "<li><a href='shop_detail.php?id=".$id."' class='inside'><img src='".$img."' alt='logo' class='photo'>".$name."</a></li>";
                                
                                    }
                                
                                }
                                ?>
                                </ul>
                                <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
                                <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
                                <script>
                                    $('.slider').slick({
		                                autoplay: true,//自動的に動き出すか。初期値はfalse。
                                        infinite: true,//スライドをループさせるかどうか。初期値はtrue。
                                        slidesToShow: 6,//スライドを画面に3枚見せる
                                        slidesToScroll: 6,//1回のスクロールで3枚の写真を移動して見せる
                                        prevArrow: '<div class="slick-prev"></div>',//矢印部分PreviewのHTMLを変更
                                        nextArrow: '<div class="slick-next"></div>',//矢印部分NextのHTMLを変更
                                        
                                        responsive: [
                                            {
                                            breakpoint: 769,//モニターの横幅が769px以下の見せ方
                                            settings: {
                                                slidesToShow: 2,//スライドを画面に2枚見せる
                                                slidesToScroll: 2,//1回のスクロールで2枚の写真を移動して見せる
                                            }
                                        },
                                        {
                                            breakpoint: 426,//モニターの横幅が426px以下の見せ方
                                            settings: {
                                                slidesToShow: 1,//スライドを画面に1枚見せる
                                                slidesToScroll: 1,//1回のスクロールで1枚の写真を移動して見せる
                                            }
                                        }
                                    ]
                                    });
                                </script>
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
</body>

</html>