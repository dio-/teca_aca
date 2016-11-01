<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
require_once 'smarty/Smarty.class.php';
require_once 'database.php';


$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';
$smarty->config_dir   = 'configs/';
$smarty->cache_dir    = 'cache/';


if (!empty($_POST['name'])) {
    $name = $_POST['name'];
    $_SESSION['name'] = $name;
}else{
    $name = $_SESSION['name'];
}

$contents = $_POST['contents'];
$created = date('Y-m-d H:i:s');



// ログイン状態のチェック
if (!isset($_SESSION["name"])) {
    //header("Location: login_form.php"); 
    print 'ng';
    exit();
}




try{
    $db = getDb();
    $stt = $db -> prepare('INSERT INTO post(name, contents, created) VALUES(:name, :contents, :created)');


    // INSERT セット
    $stt->bindValue(":name", $name, PDO::PARAM_STR);
    $stt->bindValue(":contents", $contents, PDO::PARAM_STR);
    $stt->bindValue(":created", $created, PDO::PARAM_STR);


    // DB表示
    #$sql = 'select * from post order by id desc';
    $sql = $db->query('select * from post order by id desc');
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



$smarty->display('login_admin.tpl');

$db = null;


?>

