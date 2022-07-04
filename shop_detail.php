<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/detail.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>店名（店舗詳細ページ）</title>
</head>

<body>
    <?php
    $dsn = "mysql:dbname=ajairu1;host=localhost";
    $user = "members";
    $password = "root";
    $dbn = new PDO($dsn, $user, $password);

    session_start();

    if (isset($_SESSION["member"])) {
        $member = $_SESSION["member"];

        $id = $_GET["id"];

    ?>
        <div class="wrapper">


            <p class="top_copyBar">
                <input value="＜　戻る" onclick="history.back();" type="button" class="back_btn">
                <label id="top_copy"></label>
            </p>

            <div class="top_area">
                <!-- お店キャッチ -->

                <div class="flex01">
                    <!-- サムネ写真 -->
                    <div id="img"></div>

                    <!-- 店名 -->
                    <div class="flex_center">
                        <h1 id="name"></h1>

                        <div class="flex_tag">
                            <table>
                                <tr>
                                    <!-- お店ジャンル名 -->
                                    <th><label class="tag_box">ジャンル</label></th>
                                    <td class="tag_td"><label id="genre"></label></td>
                                </tr>
                                <tr>
                                    <!-- 平均ディナー予算 -->
                                    <th><label class="tag_box">予算</label></th>
                                    <td class="tag_td"><label id="price"></label></td>
                                </tr>
                            </table>
                        </div>

                    </div>

                    <!-- お気に入りボタン -->
                    <div class="flex_right">
                        <form method="post" action="#">
                            <button type="submit" name="favorite" class="right_btn favorite_btn">お気に入り</button>
                            <button type="submit" name="keep" class="right_btn keep_btn">検討</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="address">
                <p>お店の基本情報</p>
                <table class="info">
                    <tr>
                        <th>住所</th>
                        <td id="address"></td>
                    </tr>
                    <tr>
                        <th>アクセス</th>
                        <td id="access"></td>
                    </tr>
                    <tr>
                        <th>営業時間</th>
                        <td id="info_time"></td>
                    </tr>
                    <tr>
                        <th>定休日</th>
                        <td id="holiday"></td>
                    </tr>
                </table>
                <div id="map"></div>
            </div>
        </div>

        <script>
            <?php
            echo "var id ='$id';";
            ?>
            var key = "1f2d594a8625bc1a";
            var url = `http://webservice.recruit.co.jp/hotpepper/gourmet/v1/?key=${key}&format=jsonp&id=${id}`;

            $.ajax({
                url: url,
                type: 'GET',
                dataType: "jsonp"
            }).done(function(data) {
                console.log(data);
                var demo_shop = data["results"]["shop"][0];
                var copy = demo_shop.catch;
                var name = demo_shop.name;
                var img = demo_shop.photo.pc.l;
                var genre = demo_shop.genre.name;
                var price = demo_shop.budget.average;
                var address = demo_shop.address;
                var access = demo_shop.access;
                var info_time = demo_shop.open;
                var holiday = demo_shop.close;
                var lat = demo_shop.lat;
                var lng = demo_shop.lng;

                $("#top_copy").html(copy);
                $("#name").html(name);
                $("#img").html("<img src='" + img + "' alt='トップ画像'>");
                $("#genre").html(genre);
                $("#price").html(price);
                $("#address").html(address);
                $("#access").html(access);
                $("#info_time").html(info_time);
                $("#holiday").html(holiday);
                $("#map").html("<iframe src='https://www.google.com/maps?q=" + lat + "," + lng + "&output=embed&t=m&z=16&hl=ja' width='100%' height='300px' style='border:0;' allowfullscreen='' loading='lazy'></iframe>")

            }).fail(function() {
                console.log("失敗")
            })
        </script>

        <?php

        if (isset($_POST["favorite"])) {
            $sql = "INSERT INTO favorite(member_id, shop_id) VALUES (:member_id, :shop_id)";
            $stmt = $dbn->prepare($sql);
            $stmt->bindValue(":member_id", $member["id"]);
            $stmt->bindValue(":shop_id", $id);
            $result = $stmt->execute();

            echo '<script type="text/javascript">alert("お気に入りに追加しました");</script>';
        }

        if (isset($_POST["keep"])) {
            $sql2 = "INSERT INTO todo_list(member_id, shop_id) VALUES (:member_id, :shop_id)";
            $stmt2 = $dbn->prepare($sql2);
            $stmt2->bindValue(":member_id", $member["id"]);
            $stmt2->bindValue(":shop_id", $id);
            $result2 = $stmt2->execute();

            echo '<script type="text/javascript">alert("検討リストに追加しました");</script>';
        }
    } else {
        ?>
        <div class="center nopage">
            <p>このページは表示できません</p>
            <div class="btn_center"><a href="login.html" class="input_btn log_btn">ログイン画面へ</a></div>
        </div>
    <?php
    }
    ?>
</body>

</html>