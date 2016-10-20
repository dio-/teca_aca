<?php
/* Smarty version 3.1.29, created on 2016-10-20 15:25:53
  from "/home/miyuki/github/tech_aca/keiziban-2/smarty_dir/templates/login_form.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58086371c6c534_85787165',
  'file_dependency' => 
  array (
    '0f43b8f4deee115fc1bb19620ac43e5cd7ba1340' => 
    array (
      0 => '/home/miyuki/github/tech_aca/keiziban-2/smarty_dir/templates/login_form.tpl',
      1 => 1476944748,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58086371c6c534_85787165 ($_smarty_tpl) {
?>
<form action="login_check.php" method="post">
ID：
<input type="text" name="name" size="40"><br>

pass :
<input type="password" name="password">

<input type="submit" value="送信"><input type="reset" value="リセット">

<!--ここでエラーを表示したい<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
-->

</form>
<?php }
}
