<?php
/* Smarty version 3.1.29, created on 2016-10-05 19:56:00
  from "/home/miyuki/github/teca_aca/keiziban-2/smarty_dir/templates/select_date_sample.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57f4dc40c1b416_96517213',
  'file_dependency' => 
  array (
    '9884223d8eea151f95e9203d53fc9f1c3141f170' => 
    array (
      0 => '/home/miyuki/github/teca_aca/keiziban-2/smarty_dir/templates/select_date_sample.html',
      1 => 1475664958,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f4dc40c1b416_96517213 ($_smarty_tpl) {
?>
<form action="sample.php" method="post">
ID：<input type="text" name="name" size="40"><br>
pass : <input type="password" name="password">
<input type="submit" value="送信"><input type="reset" value="リセット">
</form>
<?php }
}
