<!DOCTYPE html>
<html lang="ja">
<body>
<head>
    <meta charset="UTF-8">
    <title>データベース</title>
</head>

<?php
header("Content-Type: text/html; charset=UTF-8");
require_once '/home/miyuki/github/teca_aca/database.php';

#$name = $_POST['name'];
#$password = $_POST['password'];

//hashの所
$options = [
    'cost' => 11,
    'salt' =>'a' 
];
//$hashpass = password_hash($password, 'samitani');
$option = aaa;
$hashpass = password_hash($password, PASSWORD_BCRYPT, $option);



try{
    $db = getDb();

?>

<form method="POST" action="login-sinki.php">

    <p>新規登録</p>
    <!-- ユーザ -->
    <p>名前:
        <input type="text" name="name" value="<?php print htmlspecialchars($name, ENT_QUOTES, "UTF-8"); ?>" maxlength="10" />
    </p>

    <!-- パスワード -->   
    <p>パスワード:
        <input type="password" name="password" value="<?php print htmlspecialchars($password, ENT_QUOTES, "UTF-8"); ?>" maxlength="10"/>
    </p>

    <!-- 投稿ボタン -->
    <input type="submit" value="出す" />

    <!-- リセットボタン -->
    <input type="submit" name="reset" value="リセット"> 


</form>

<?php

$name = $_POST['name'];
$password = $_POST['password'];
    if (isset($_POST['name']) && isset($_POST['password'])){
        if (!empty($name) && !empty($password)){ //empty(変数)で中身が空かを確認する
            // INSERT準備 
            $stt = $db -> prepare('INSERT INTO member(name, password) VALUES(:name, :password)');

            // INSERT セット
            $stt->bindValue(":name", $name, PDO::PARAM_STR);
            //$stt->bindValue(":password", $hashpass, PDO::PARAM_STR);
            $stt->bindValue(":password", $password, PDO::PARAM_STR);

            // INSERT 実行
            $stt->execute();
        }else{
            print ('<br />中身を入れてください<br />'); 
        }
    }




    $db = NULL;
}catch(PDOException $e){
    die("エラーメッセージ:{$e->getMessage()}");
}

?>

</body>
</html>
