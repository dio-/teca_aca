<?php
header("Content-Type: text/html; charset=UTF-8");

function getDb() {
	$dsn = 'mysql:dbname=miyukidb;host=localhost'; // mysql:dbname=データベース名;
	$user = 'miyuki'; // ログインするユーザ名
	$password = 'm5014m'; // パスワード
 
	try{
		$db = new PDO($dsn, $user, $password);
		$db->exec('set NAMES utf8');
	}catch(PDOException $e){
   	 	die("エラーメッセージ:{$e->getMessage()}");
	}

	return $db;
}

?>
