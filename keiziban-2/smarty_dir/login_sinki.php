<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
require_once 'smarty/Smarty.class.php';
require_once 'database.php';
$db = getDb();

$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';
$smarty->config_dir   = 'configs/';
$smarty->cache_dir    = 'cache/';


$name = $_POST['name'];
$password = $_POST['password'];

$smarty->assign('name', $name);
$smarty->assign('password', $password);



$smarty->display('login_sinki.tpl');

try{
    $name = $_POST['name'];
    $password = $_POST['password'];
    if (isset($_POST['name']) && isset($_POST['password'])){
        if (!empty($name) && !empty($password)){ //empty(変数)で中身が空かを確認する
            // INSERT準備 
            $stt = $db -> prepare('INSERT INTO member(name, password) VALUES(:name, :password)');

            // INSERT セット
            $stt->bindValue(":name", $name, PDO::PARAM_STR);
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
