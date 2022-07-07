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
                            <div class="container">
                            <br>
                            <input type="checkbox" name="wifi" value="1">WiFiあり
		                    <input type="checkbox" name="course" value="1">コースあり
		                    <input type="checkbox" name="free_drink" value="1">飲み放題あり
		                    <input type="checkbox" name="free_food" value="1">食べ放題あり
		                    <input type="checkbox" name="private_room" value="1">個室あり
                            <br>
                            <input type="checkbox" name="non_smoking" value="1">禁煙席あり
                            <input type="checkbox" name="charter" value="1">貸切可
                            <input type="checkbox" name="parking" value="1">駐車場有
                            <input type="checkbox" name="midnight" value="1">21時以降も営業
                            <input type="checkbox" name="english" value="1">英語メニューあり
                            </div>
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
                            <?php
                            $api = "key=f8a3ef18e34e0c9b";
                            $format = "format=json";
                            $address = "address=".$member["address1"];
                            $count = "count=12";
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
                                  $img =  $shop["photo"]["pc"]["l"];
                                  $id = $shop["id"];
                                  //$open = $shop
                              
                                  echo "<a href='shop_detail.php?id=".$id."'><img src='".$img."' alt='logo' class='photo'></a>";
                              
                                }
                              
                            }
                            ?>
                            </div>
                            <!-- <div id="recommendation">
                                <a href="shop_detail.php?id=J001286406"><img src="image/fd401527.jpg" alt="" class="photo"></a>
                                <a href="shop_detail.php?id=J001286406"><img src="image/beaf2.jpg" alt="" class="photo"></a>
                                <a href="shop_detail.php?id=J001286406"><img src="image/bread.jpg" alt="" class="photo"></a>
                                <a href="shop_detail.php?id=J001286406"><img src="image/chinese-st.jpg" alt="" class="photo"></a>
                                <a href="shop_detail.php?id=J001286406"><img src="image/cokkie.jpg" alt="" class="photo"></a>
                                <a href="shop_detail.php?id=J001286406"><img src="image/fried-salmon.jpg" alt="" class="photo"></a>
                            </div> -->
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