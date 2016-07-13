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

$name = $_POST['name'];
$contents = $_POST['contents'];
$created = date('Y-m-d H:i:s'); // 日付生成date

try{
	$db = getDb();

?>

<form method="POST" action="database3.php">

    <!-- ユーザ -->
    <p>名前:
        <input type="text" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES, "UTF-8"); ?>" maxlength="10" />
    </p>

    <!-- 本文 -->   
    <p>本文: 
        <textarea name="contents" value="<?php echo htmlspecialchars($contents, ENT_QUOTES, "UTF-8"); ?>" cols="30" rows="5"></textarea>
    </p>

    <!-- 投稿ボタン -->
    <input type="submit" value="投稿する" />

    <!-- リセットボタン -->
    <input type="submit" name="reset" value="リセット"> 


</form>

<?php
	if (isset($_POST['name']) && isset($_POST['contents'])){
		if (!empty($name) && !empty($contents)){ //empty(変数)で中身が空かを確認する
			// INSERT準備 
            $stt = $db -> prepare('INSERT INTO keiziban(name, contents, created) VALUES(:name, :contents, :created)');

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
    $sql = 'select * from keiziban order by id desc'; 
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

?>

</body>
</html>
