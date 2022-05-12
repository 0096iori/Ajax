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
$pass1 = $_POST["pass1"];
$pass2 = $_POST["pass2"];
$name = $_POST["name"];
$address1 = $_POST["address1"];
$address2 = $_POST["address2"];
$phone = $_POST["phone"];


if($mail==''){
    print 'メールアドレスが入力されていません。<br />';
} else {
    print 'メールアドレス：';
    print $mail;
    print '<br />';
}
  

if($pass1==''){
    print 'パスワードが入力されていません。<br />';
}

if($pass2==''){
    print 'パスワード(確認)が入力されていません。<br />';
}
  
if($pass1!=$pass2){ //もしパスワード1とパスワード2の値が異なるなら
    print 'パスワードが一致しません。<br />';
}
  

//入力項目が適切なら、戻るボタンとOKボタンを表示する。
if($id==''|| $pass1=='' || $pass2=='' || $pass1!=$pass2 || $name=='' || $address1=='' || $address2=='' || $phone==''){
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<form>';
} else {
    print '<form method="post" action="change.php">';
    print '<input type="hidden" name="id" value="'.$id.'">'; //'<input type="hidden" name="name" value="'と$staff_nameをドットで連結
    print '<input type="hidden" name="mail" value="'.$mail.'">'; //hiddenにすることで画面に表示することなく次の画面に値を引き渡せる
    print '<input type="hidden" name="pass1" value="'.$pass1.'">';
    print '<input type="hidden" name="name" value="'.$name.'">';
    print '<input type="hidden" name="address1" value="'.$address1.'">';
    print '<input type="hidden" name="address2" value="'.$address2.'">';
    print '<input type="hidden" name="phone" value="'.$phone.'">';

    print '<br />';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="OK">';
    print '</form>';
}

?>

</body>
</html>
