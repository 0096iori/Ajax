<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/detail.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>店名（店舗詳細ページ）</title>
</head>

<body>
    <div class="wrapper">

        <div class="top_area">
            <!-- お店キャッチ -->
            <p id="top_copy"></p>

            <div class="flex01">
                <!-- サムネ写真 -->
                <div id="img"></div>

                <!-- 店名 -->
                <div class="flex_center">
                    <h1 id="name"></h1>

                    <!-- お店ジャンル名 -->
                    <p>
                        <label>ジャンル</label>
                        <label id="genre"></label>
                    </p>

                    <!-- 平均ディナー予算 -->
                    <p>
                        <label>予算</label>
                        <label id="price"></label>
                    </p>
                </div>

                <!-- お気に入りボタン -->
                <div class="flex_right">
                    <button type="submit">お気に入り</button>
                    <button type="submit">検討</button>
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
        var key = "1f2d594a8625bc1a";
        var name = "四季の味";
        var url = `http://webservice.recruit.co.jp/hotpepper/gourmet/v1/?key=${key}&format=jsonp&name=${name}`;

        $.ajax({
            url: url,
            type: 'GET',
            dataType: "jsonp"
        }).done(function(data) {
            console.log(data);
            var demo_shop = data["results"]["shop"][1];
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
</body>

</html>