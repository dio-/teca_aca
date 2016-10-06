<?php
session_start();
 
header("Content-type: text/html; charset=utf-8");
$token = $_SESSION['token']; 
 
?>
 
<!DOCTYPE html>
<html>
<head>
<title>ログイン画面</title>
<meta charset="utf-8">
</head>
<body>
<p>ログイン画面</p>
 
<form action="login_check.php" method="post">
 
<p>アカウント：<input type="text" name="name" size="50"></p>
<p>パスワード：<input type="password" name="password" size="50"></p>
 
<input type="hidden" name="token" value="<?=$token?>">
<input type="submit" value="ログイン">
<input type="reset" value="リセット">
 
</form>

 
</body>
</html>
