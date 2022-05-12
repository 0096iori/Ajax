<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<title>新規登録</title>
<body>

<?php
$id = $_POST["id"];
$mail = $_POST["mail"];
$pass = $_POST["pass"];
$deadline = $_POST["deadline"];


if($mail==''){
    print 'メールアドレスが入力されていません。<br />';
} else {
    print 'メールアドレス：';
    print $mail;
    print '<br />';
}
  

if($pass==''){
    print 'パスワードが入力されていません。<br />';
}


//入力項目が適切なら、戻るボタンとOKボタンを表示する。
if($id==''|| $mail=='' || $pass==''){
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<form>';
} else {
    print '<form method="post" action="newuser.php">';
    print '<input type="hidden" name="id" value="'.$id.'">'; //'<input type="hidden" name="name" value="'と$staff_nameをドットで連結
    print '<input type="hidden" name="mail" value="'.$mail.'">'; //hiddenにすることで画面に表示することなく次の画面に値を引き渡せる
    print '<input type="hidden" name="pass" value="'.$pass.'">';
    print '<input type="hidden" name="deadline" value="'.$deadline.'">';
    

    print '<br />';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="OK">';
    print '</form>';
}

?>

</body>
</html>
