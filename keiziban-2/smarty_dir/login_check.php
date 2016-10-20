<?php
#echo (__FILE__);   今のディレクトリを表示
header("Content-Type: text/html; charset=UTF-8");
require_once 'smarty/Smarty.class.php';
require_once 'database.php';



$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';
$smarty->config_dir   = 'configs/';
$smarty->cache_dir    = 'cache/';


$name = $_POST['name'];
$contents = $_POST['contents'];
$created = date('Y-m-d H:i:s');


try{
    $db = getDb();
    $stt = $db -> prepare('INSERT INTO post(name, contents, created) VALUES(:name, :contents, :created)');


    // INSERT セット
    $stt->bindValue(":name", $name, PDO::PARAM_STR);
    $stt->bindValue(":contents", $contents, PDO::PARAM_STR);
    $stt->bindValue(":created", $created, PDO::PARAM_STR);
#var_dump($contents);
#var_dump($name);


    // DB表示
    #$sql = 'select * from post order by id desc';
    $sql = $db->query('select * from post order by id desc');
    //foreach ($db->query($sql) as $row) 
    //{
        //print('<br />');
        //print('ID:'.$row['id'].','.$row['created'].'<br />');
        //print('名前:'.$row['name']);
        //print('<br />');
        //print($row['contents']);
        //print('<br />');
        //$smarty->assign("name", $row['name']);
        //$smarty->assign("contents", $row['contents']);
        //$smarty->assign("created", $row['created']);
    //}
    $post = array();
    while ($data = $sql->fetch(PDO::FETCH_ASSOC)) {
        $post[] = $data;
    }
    $smarty->assign('posts', $post);


     // INSERT 実行
     $stt->execute();

}catch(PDOException $e){
    die("エラーメッセージ:{$e->getMessage()}");
}







$smarty->display('login_check.tpl');

$dbh = null;


?>

