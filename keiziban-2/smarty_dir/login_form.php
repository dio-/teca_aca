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
?>
