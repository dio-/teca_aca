<?php
header("Content-Type: text/html; charset=UTF-8");
require_once 'Smarty.class.php';
require_once 'database.php';

$smarty = new Smarty();
$smarty->template_dir = 'tmplates/';
$smarty->compile_dir  = 'templates_c/';
$smarty->config_dir   = 'configs/';
$smarty->cache_dir    = 'cache/';

try{
    $db = getDb();
    $stt = $db -> prepare('INSERT INTO post(name, contents, created) VALUES(:name, :contents, :created)');

    // INSERT セット
    $stt->bindValue(":name", $name, PDO::PARAM_STR);
    $stt->bindValue(":contents", $contents, PDO::PARAM_STR);
    $stt->bindValue(":created", $created, PDO::PARAM_STR);


    // DB表示
    $sql = 'select * from post order by id desc';
    foreach ($db->query($sql) as $row) {
        //print('<br />');
        //print('ID:'.$row['id'].','.$row['created'].'<br />');
        //print('名前:'.$row['name']);
        //print('<br />');
        //print($row['contents']);
        //print('<br />');
        $smarty->assign("name", $row['name']);
        $smarty->assign("contents", $row['contents']);
        $smarty->assign("created", $row['created']);
    }

     // INSERT 実行
     $stt->execute();

}catch(PDOException $e){
    die("エラーメッセージ:{$e->getMessage()}");
}





$smarty->display('login_check.tpl');

$dbh = null;


?>

