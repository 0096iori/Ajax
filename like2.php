<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>お気に入り</title>
</head>

<body>
    <header>
        <h2>お気に入り</h2>
    </header>
    <main>
        <div class="center">

            //フォーム
            <form action="like.php" method="post">
                
            </form>

            <?php
                $id = isset($_POST['id']) ? $_POST['id'] : "";
                $mid = isset($_POST['mid']) ? $_POST['mid'] : "";
                $sid = isset($_POST['sid']) ? $_POST['sid'] : "";
                echo $id." ".$mid." ".$sid;
            ?>

        </div>
    </main>
    <script>
        var request = new XMLHttpRequest();
     
        request.open('GET', 'https://webservice.recruit.co.jp/hotpepper/gourmet/v1/?key=sample&large_area=Z011', true);
        request.responseType = 'json';
     
        request.onload = function () {
          var data = this.response;
          console.log(data);
        };
     
        request.send();
      </script>
</body>

</html>