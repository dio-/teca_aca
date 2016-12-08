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

try{

    if(empty($_POST)) {
        $errors['name'] = "何も書かれていません";
    }else{
        // アカウントの入力判定
        if ($name == '') {
            $errors['name'] = "IDがないです。";
        }elseif(preg_match("/[\x8E\xA1-\xFE]/", $name)){
            print "IDは半角英数で入力してください。";
        }   
        // パスワードの入力判定
        if ($password == '') {
            $errors['password'] = "パスワードが入力されていません。";
        }elseif(!preg_match('/^[0-9a-zA-Z]+$/', $_POST["password"])){
            $errors['password_length'] = "パスワードは半角英数字で入力して下さい。";
        }   
    }


    if(count($errors) == 0){
    // INSERT準備 
    $stt = $db -> prepare('INSERT INTO member(name, password) VALUES(:name, :password)');

    // INSERT セット
    $stt->bindValue(":name", $name, PDO::PARAM_STR);
    $stt->bindValue(":password", $password, PDO::PARAM_STR);

    // INSERT 実行
    $stt->execute();

    $value = '登録しました。';
    $smarty->assign('value', $value); 

    }





    $db = NULL;
}catch(PDOException $e){
    die("エラーメッセージ:{$e->getMessage()}");
}

foreach($errors as $value){
     $smarty->assign('value', $value);
}

$smarty->display('login_sinki2.tpl');
?>
