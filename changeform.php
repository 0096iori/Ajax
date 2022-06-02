<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>会員情報変更</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["member"])) {
    ?>
        <header>
            <h2>会員情報変更</h2>
        </header>
        <main>
            <div class="center">

                <!-- フォーム -->
                <form action="change.php" method="post">
                    <table>
                        <tr>
                            <td class="index">メールアドレス</td>
                            <td><input type="email" name="mail" id="mail" class="input_txt" required></td>
                        </tr>
                        <tr>
                            <td class="index">パスワード</td>
                            <td><input type="password" name="pass1" id="pass1" class="input_txt pass" required></td>
                        </tr>
                        <tr>
                            <td class="index">パスワード(確認)</td>
                            <td><input type="password" name="pass2" id="pass2" class="input_txt pass" required><span id="comparison"></span></td>
                        </tr>
                        <tr>
                            <td class="index">お名前</td>
                            <td><input type="text" name="name" id="name" class="input_txt" required></td>
                        </tr>
                        <tr>
                            <td class="index">住所1</td>
                            <td><input type="text" name="address1" id="address1" class="input_txt" required></td>
                        </tr>
                        <tr>
                            <td class="index">住所2</td>
                            <td><input type="text" name="address2" id="address2" class="input_txt" required></td>
                        </tr>
                        <tr>
                            <td class="index">電話番号</td>
                            <td><input type="number" name="phone" id="phone" class="input_txt" required></td>
                        </tr>
                    </table>
                    <div id="btn_center">
                        <div>
                            <a href="top.php" id="input_btn1" class="input_btn">キャンセル</a>
                            <!-- <input type="submit" value="キャンセル" id="input_btn1" class="input_btn"> -->
                        </div>
                        <div>
                            <input type="submit" value="変更" id="input_btn2" class="input_btn">
                        </div>
                    </div>
                </form>
                <script>
                    $(".pass").keyup(function(event) {
                        if ($("#pass2").val() != "") {
                            if ($("#pass2").val() == $("#pass1").val()) {
                                $("#comparison").text("");
                                $("#input_btn2").removeAttr("disabled");
                            } else {
                                $("#comparison").text(" パスワードが一致しません");
                                $("#input_btn2").attr({
                                    "disabled": ""
                                });
                            }
                        } else {
                            $("#comparison").text("");
                            $("#input_btn2").removeAttr("disabled");
                        }

                    });
                </script>
            </div>
        </main>
    <?php
    } else {
        echo ("<div class='center nopage'>");
        echo ("<p>このページは表示できません</p>");
        echo ("<div class=''btn_center><a href='login.html' class='input_btn log_btn'>ログイン画面へ</a></div>");
        echo ("</div>");
    }
    ?>
</body>

</html>