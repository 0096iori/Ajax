<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
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
                    <!-- ログイン情報、会員情報など入力欄 -->
                    <tr>
                        <td class="index">メールアドレス</td>
                        <td><input type="email" name="mail" id="mail" class="input_txt" required></td>
                    </tr>
                    <tr>
                        <td class="index">パスワード</td>
                        <td><input type="text" name="pass1" id="pass1" class="input_txt" required></td>
                    </tr>
                    <tr>
                        <td class="index">パスワード(確認)</td>
                        <td><input type="text" name="pass2" id="pass2" class="input_txt" required></td>
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
                        <input type="submit" value="キャンセル" id="input_btn1" class="input_btn">
                    </div>
                    <div>
                        <input type="submit" value="変更" id="input_btn2" class="input_btn">
                    </div>
                </div>
            </form>

        </div>
    </main>
    <?php
        }else{
            echo("ログイン失敗 <br>");
            echo("<a href='login.html'>再ログイン</a>");
        }
    ?>
</body>

</html>