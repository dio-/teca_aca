<?php
/* Smarty version 3.1.29, created on 2016-12-08 17:12:19
  from "/home/miyuki/github/tech_aca/keiziban-2/smarty_dir/templates/login_sinki2.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_584915e39c7a86_88160731',
  'file_dependency' => 
  array (
    'a4204f437fa7a9b47ec17f1de821e899fa038b66' => 
    array (
      0 => '/home/miyuki/github/tech_aca/keiziban-2/smarty_dir/templates/login_sinki2.tpl',
      1 => 1481184608,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_584915e39c7a86_88160731 ($_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['value']->value;?>


<form action="login_form.php" method="post">
    <input type="submit" value="ログイン画面に戻る">
</form>

<form action="login_sinki.php" method="post">
    <input type="submit" value="新規登録画面に戻る">
</form>
<?php }
}
