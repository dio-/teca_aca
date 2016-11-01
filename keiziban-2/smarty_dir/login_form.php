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
    try{
        //例外処理を投げる（スロー）ようにする
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //アカウントで検索
        $stt = $db->prepare("SELECT * FROM member WHERE name = '" . $name . "'");
        $stt->bindValue(':name', $name, PDO::PARAM_STR);
        $stt->execute();


        //アカウントが一致するかどうか調べる
        if($row = $stt->fetch()){

            $password_hash = $row['password'];

            //var_dump($password_hash);
            //var_dump($password);
            //var_dump($_POST["password"]);
            //var_dump($row['password']);


            $hashpass = password_hash($password, 'samitani');
            var_dump($hashpass);
            var_dump($password_hash);

            //パスワードが一致するかどうか調べる
            //if (password_verify($password, $password_hash)) {
            if($password == $row['password']){
                var_dump($password);

                //セッションハイジャック対策
                session_regenerate_id(true);

                $_SESSION['name'] = $name;
                header("Location: login_admin.php"); //ログイン画面に
                exit();
            }else{
                $errors['password'] = "アカウント及びパスワードが一致しません。";

            }
        }else{
            $errors['name'] = "アカウント及びパスワードが一致しません。";
        }

        //データベース接続切断
        $db = null;

    }catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }

}else{
    if(count($errors) > 0):
        foreach($errors as $value){
            //echo "<p>".$value."</p>";
            $smarty->assign('value', $value);   //ここからlogin_form.tplの{$value}に表示させる
    }   
    endif;
}



?>
