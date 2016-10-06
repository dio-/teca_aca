<!DOCTYPE html> <html lang="ja">
<body>
<head>
    <meta charset="UTF-8">
    <title>掲示板2</title>
</head>


<?php
session_start();
 
header("Content-type: text/html; charset=utf-8");
 
// ログイン状態のチェック
if (!isset($_SESSION["name"])) {
    header("Location: login_check.php");
    exit();
}
 
$name = $_SESSION['name'];
echo "<p>".htmlspecialchars($name,ENT_QUOTES)."がログイン中</p>";
 


//セッションを解除
//$_SESSION = array();

$contents = $_POST['contents'];
$created = date('Y-m-d H:i:s'); // 日付setdate

try{
    //データベース接続
    require_once("database.php");
    $db = getDb();

?>

<form method="POST" action="login_admin.php">

    <!-- 本文 -->
    <p>本文:
        <textarea name="contents" value="<?php print  htmlspecialchars($contents, ENT_QUOTES, "UTF-8"); ?>" cols="30" rows="5"></textarea>
    </p>

    <!-- 投稿ボタン -->
    <input type="submit" value="投稿する">

    <!-- リセットボタン -->
    <input type="reset" value="リセット">

    <!-- ログアウト --!>
    <input type="button" onclick="location.href='logout.php'" value="ログアウト">


</form>


<?php

    if (isset($_SESSION['name']) && isset($_POST['contents'])){
        if (!empty($name) && !empty($contents)){ //empty(変数)で中身が空かを確認する
            // INSERT準備 
            $stt = $db -> prepare('INSERT INTO post(name, contents, created) VALUES(:name, :contents, :created)');

            // INSERT セット
            $stt->bindValue(":name", $name, PDO::PARAM_STR);
            $stt->bindValue(":contents", $contents, PDO::PARAM_STR);
            $stt->bindValue(":created", $created, PDO::PARAM_STR);

            // INSERT 実行
            $stt->execute();
        }else{
            print ('<br />中身を入れてください<br />'); 
        }
    }


    // DB表示
    $sql = 'select * from post order by id desc'; 
    foreach ($db->query($sql) as $row) {
        print('<br />');
        print('ID:'.$row['id'].','.$row['created'].'<br />');
        print('名前:'.$row['name']);
        print('<br />');
        print($row['contents']);
        print('<br />');
    }

    $db = NULL;
}catch(PDOException $e){
    die("エラーメッセージ:{$e->getMessage()}");
}

//$_SESSION = array();

?>



</body>
</html>

