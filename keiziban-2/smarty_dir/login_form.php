<?php
header("Content-Type: text/html; charset=UTF-8");
require_once 'smarty/Smarty.class.php';

$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';
$smarty->config_dir   = 'configs/';
$smarty->cache_dir    = 'cache/';


$name = $_POST['name'];
$password = $_POST['password'];




$smarty->assign('name', $name);
$smarty->assign('password', $password);

$smarty->display('login_form.tpl');

// エラーの初期化
$errors = array();

if(empty($_POST)) {
    //header("Location: login_form.php"); //headerが使えない
}else{
    // アカウントの入力判定
    if ($name == '') {
        $errors['name'] = "IDがないです。";
    }

    // パスワードの入力判定
    if ($password == '') {
        $errors['password'] = "パスワードが入力されていません。";
    }elseif(!preg_match('/^[0-9a-zA-Z]+$/', $_POST["password"])){
        $errors['password_length'] = "パスワードは半角英数字で入力して下さい。";
    }


}


// エラー表示
if(count($errors) === 0){
    //$smarty->display( 'login_check.tpl' ); //この行でlogin_check.tplに移行させたいです
}else{
    if(count($errors) > 0):
        foreach($errors as $value){
            //echo "<p>".$value."</p>";
            $smarty->assign('value', $value);   //ここからlogin_form.tplの{$value}に表示させる
    }   
    endif;
}


?>
