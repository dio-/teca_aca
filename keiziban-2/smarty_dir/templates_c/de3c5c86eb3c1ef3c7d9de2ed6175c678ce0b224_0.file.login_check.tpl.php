<?php
/* Smarty version 3.1.29, created on 2016-10-12 16:14:30
  from "/home/miyuki/github/teca_aca/keiziban-2/smarty_dir/templates/login_check.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57fde2d62c7ff2_46014095',
  'file_dependency' => 
  array (
    'de3c5c86eb3c1ef3c7d9de2ed6175c678ce0b224' => 
    array (
      0 => '/home/miyuki/github/teca_aca/keiziban-2/smarty_dir/templates/login_check.tpl',
      1 => 1476165580,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57fde2d62c7ff2_46014095 ($_smarty_tpl) {
?>
<form action="login_check.php" method="post">
名前：
<input type="text" name="name" size="40"><br>
本文:
<textarea name="contents" rows="4" cols="40"></textarea>

<input type="submit" value="送信"><input type="reset" value="リセット">

<!--ここでエラーを表示したい<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
-->

<?php echo $_smarty_tpl->tpl_vars['name']->value;?>

<?php echo $_smarty_tpl->tpl_vars['created']->value;?>

<?php echo $_smarty_tpl->tpl_vars['contents']->value;?>


</form>

<?php }
}
