<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/detail.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>検討リスト一覧</title>
</head>

<body>
    <div class="center">
        <input value="＜　戻る" onclick="history.back();" type="button" class="back_btn white_back">
        <h2>検討リスト一覧</h2>
        <div class="todo_list" id="result"></div>

        <?php

        $dsn = "mysql:dbname=ajairu1;host=localhost";
        $user = "members";
        $password = "root";
        $dbh = new PDO($dsn, $user, $password);

        session_start();

        if (isset($_SESSION["member"])) {
            $member = $_SESSION["member"];

            $sql = "SELECT * FROM todo_list WHERE member_id = :member_id";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(":member_id", $member["id"]);
            $stmt->execute();

            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id = $result["shop_id"];
        ?>
                <script>
                    <?php
                    echo "var id ='$id';";
                    ?>

                    var key = "1f2d594a8625bc1a";
                    var url = `http://webservice.recruit.co.jp/hotpepper/gourmet/v1/?key=${key}&format=jsonp&id=${id}`;

                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: "jsonp",
                        async: false
                    }).done(function(data) {
                        console.log(data)

                        const shop = data["results"]["shop"][0];
                        var result = "";

                        result +=
                            "<div  class='list_fav'>" +
                            "<p class='fav_box'><img src='" + shop.photo.pc.m + "' class='favorite_img'><labe; class='favorite_name'>" + shop.name + "</label></p>" +
                            "</div>";

                        $("#result").append(result);

                    }).fail(function() {
                        console.log("失敗");
                    })
                </script>

    </div>
<?php

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