<?php
header("Content-Type: text/html; charset=UTF-8");
require_once '/home/miyuki/github/teca_aca/keiziban-2/smarty_dir/smarty/Smarty.class.php';

$smarty = new Smarty();
$smarty->template_dir = '/home/miyuki/github/teca_aca/keiziban-2/smarty_dir/templates/';
$smarty->compile_dir  = '/home/miyuki/github/teca_aca/keiziban-2/smarty_dir/templates_c/';
$smarty->config_dir   = '/home/miyuki/github/teca_aca/keiziban-2/smarty_dir/configs/';
$smarty->cache_dir    = '/home/miyuki/github/teca_aca/keiziban-2/smarty_dir/cache/';


$name = $_POST['name'];
$password = $_POST['password'];

$smarty->display('login_form.tpl');


print $name;
print $password;

// エラーの初期化
$errors = array();

if(empty($_POST)) {
    header("Location: login_form.php");
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
    //print 'ok';
    $smarty->display( 'login_check.php' );
}else{
    if(count($errors) > 0):
        foreach($errors as $value){
            echo "<p>".$value."</p>";
            //$smarty->assign('value', $value);//ここからlogin_form.tplの{$value}に表示させる
    }   
    endif;
}



header("Location: login_check.php");


?>
