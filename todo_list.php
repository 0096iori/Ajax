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
        <a href="top.php" class="backbtn_top">＜　ＴＯＰ</a>
        <h2>検討リスト一覧</h2>
        <!-- 検討中の店 -->
        <div id="todo"></div>

        <?php

        $dsn = "mysql:dbname=ajairu1;host=localhost";
        $user = "members";
        $password = "root";
        $dbh = new PDO($dsn, $user, $password);

        session_start();

        if (isset($_SESSION["member"])) {
            $member = $_SESSION["member"];

            if (isset($_POST["done_btn"])) {
                $sql2 = "UPDATE todo_list SET flag ='0' WHERE shop_id = :id";
                $stmt2 = $dbh->prepare($sql2);
                $stmt2->bindValue(":id", $_POST["id"]);
                $stmt2->execute();
            }

            $sql = "SELECT * FROM todo_list WHERE member_id = :member_id and flag = '1' ORDER BY id DESC";
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
                            "<form method='post'>" +
                            "<p class='fav_box'>" +
                            "<img src='" + shop.photo.pc.m + "' class='favorite_img'>" +
                            "<label class='favorite_name'>" + shop.name + "</label>" +
                            "<label class='todobtn_right'><button type='submit' name='done_btn' class='todo_btn' id='done_btn'>行った！</button>" +
                            "<input type='hidden'  name='id' value='" + shop.id + "'>" +
                            "</p>" +
                            "</form>" +
                            "</div>";

                        $("#todo").append(result);

                    }).fail(function() {
                        console.log("失敗");
                    })
                </script>

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