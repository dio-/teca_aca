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

$_SESSION = array();


$smarty->assign('name', $name);
$smarty->assign('password', $password);

$smarty->display('login_form.tpl');
///*
$name = $_POST['name'];
$password = $_POST['password'];


// エラーの初期化
$errors = array();

if(empty($_POST)) {
    $errors['name'] = "何も書かれていません";
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
if(count($errors) == 0){
    try{
        //例外処理を投げる（スロー）ようにする
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //var_dump($name);

        //アカウントで検索
        $stt = $db->prepare("SELECT * FROM member WHERE name = '" . $name . "'");
        $stt->bindValue(':name', $name, PDO::PARAM_STR);
        $stt->execute();

        //アカウントが一致するかどうか調べるここから通ってない
        if($row = $stt->fetch()){

            if($password == $row['password']){

                $_SESSION['name'] = $name;
                $url = "login_admin.php";
                header("Location: ".$url);
        
               // exit();
            }else{
                //$errors['password'] = "アカウント及びパスワードが一致しません。";
                print ('アカウント及びパスワードが一致しません。');
                print ('a');

            }
        }else{
            //$db = null;
            $errors['name'] = "アカウント及びパスワードが一致しません。";
            print ('アカウント及びパスワードが一致しません。');
            print ('b');
        }

        //データベース接続切断
        $db = null;
print ('c');
    }catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }


}else{
    print ('qw');
    if(count($errors) > 0):
       foreach($errors as $value){
            //echo "<p>".$value."</p>";
            $smarty->assign('value', $value);   //ここからlogin_form.tplの{$value}に表示させる
       } 
    endif;
}

//*/

?>
