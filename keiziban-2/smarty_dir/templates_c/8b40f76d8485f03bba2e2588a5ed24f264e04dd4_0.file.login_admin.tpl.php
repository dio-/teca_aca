<?php
/* Smarty version 3.1.29, created on 2016-12-01 06:31:49
  from "/home/miyuki/github/tech_aca/keiziban-2/smarty_dir/templates/login_admin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_583f4545201375_77593244',
  'file_dependency' => 
  array (
    '8b40f76d8485f03bba2e2588a5ed24f264e04dd4' => 
    array (
      0 => '/home/miyuki/github/tech_aca/keiziban-2/smarty_dir/templates/login_admin.tpl',
      1 => 1479978432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583f4545201375_77593244 ($_smarty_tpl) {
?>
<form action="login_admin.php" method="post">

名前:  <?php echo $_SESSION['name'];?>
<br>
本文:
<textarea name="contents" rows="4" cols="40"></textarea>

<input type="submit" value="送信"><input type="reset" value="リセット">

<br>
<?php
$_from = $_smarty_tpl->tpl_vars['posts']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_postdata_0_saved_item = isset($_smarty_tpl->tpl_vars['postdata']) ? $_smarty_tpl->tpl_vars['postdata'] : false;
$_smarty_tpl->tpl_vars['postdata'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['postdata']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['postdata']->value) {
$_smarty_tpl->tpl_vars['postdata']->_loop = true;
$__foreach_postdata_0_saved_local_item = $_smarty_tpl->tpl_vars['postdata'];
?>
  <?php echo $_smarty_tpl->tpl_vars['postdata']->value['id'];?>
  <?php echo $_smarty_tpl->tpl_vars['postdata']->value['created'];?>

   <br><?php echo $_smarty_tpl->tpl_vars['postdata']->value['name'];?>

   <br><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['postdata']->value['contents'], ENT_QUOTES, 'UTF-8', true);?>
<br>
<?php
$_smarty_tpl->tpl_vars['postdata'] = $__foreach_postdata_0_saved_local_item;
}
if ($__foreach_postdata_0_saved_item) {
$_smarty_tpl->tpl_vars['postdata'] = $__foreach_postdata_0_saved_item;
}
?>
</form>

<form action="logout.php" method="post">
<input type="submit" value="ログアウト">

</form>
<?php }
}
