<?php
/* Smarty version 3.1.29, created on 2016-10-06 14:42:03
  from "/home/miyuki/github/teca_aca/keiziban-2/smarty_dir/templates/login_form.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57f5e42b4019a6_25066663',
  'file_dependency' => 
  array (
    '62aad21e43ef931fc42c0cc10bf5d8ba02651fb9' => 
    array (
      0 => '/home/miyuki/github/teca_aca/keiziban-2/smarty_dir/templates/login_form.html',
      1 => 1475732519,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f5e42b4019a6_25066663 ($_smarty_tpl) {
?>
<form action="login_form.php" method="post">
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
