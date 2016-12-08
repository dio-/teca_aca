<?php
/* Smarty version 3.1.29, created on 2016-12-08 16:53:49
  from "/home/miyuki/github/tech_aca/keiziban-2/smarty_dir/templates/login_sinki.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5849118db36be9_32127473',
  'file_dependency' => 
  array (
    'e7a11094c7dd73928c90d7f0bef8f940e84602c9' => 
    array (
      0 => '/home/miyuki/github/tech_aca/keiziban-2/smarty_dir/templates/login_sinki.tpl',
      1 => 1481183602,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5849118db36be9_32127473 ($_smarty_tpl) {
?>
<form action="login_sinki2.php" method="post">
ID：
<input type="text" name="name" size="40"><br>

pass :
<input type="password" name="password">

<input type="submit" value="送信"><input type="reset" value="リセット">


</form>

<form action="login_form.php" method="post">
<input type="submit" value="ログイン画面に戻る">

</form>
<?php }
}
