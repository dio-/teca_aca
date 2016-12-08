<?php
/* Smarty version 3.1.29, created on 2016-12-08 17:14:09
  from "/home/miyuki/github/tech_aca/keiziban-2/smarty_dir/templates/logout.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_584916510ca5f8_56377323',
  'file_dependency' => 
  array (
    '28c35f186b83449ca9a78290a7b21065a5e2a9f1' => 
    array (
      0 => '/home/miyuki/github/tech_aca/keiziban-2/smarty_dir/templates/logout.tpl',
      1 => 1481182178,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_584916510ca5f8_56377323 ($_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['value']->value;?>


<form action="login_form.php" method="post">
    <input type="submit" value="ログイン画面に戻る">
</form>
<?php }
}
