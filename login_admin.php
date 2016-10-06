<?php
session_start();
 
header("Content-type: text/html; charset=utf-8");
 
// ログイン状態のチェック
if (!isset($_SESSION["name"])) {
    header("Location: login.php");
    exit();
}

echo "ログイン中の画面";
 
$name = $_SESSION['name'];
echo "<p>".htmlspecialchars($name,ENT_QUOTES)."がログイン中</p>";
 
echo "<a href='logout.php'>ログアウト</a>";
