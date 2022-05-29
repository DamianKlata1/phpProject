<?php
/* Smarty version 4.1.0, created on 2022-05-27 14:36:32
  from 'E:\xampp\htdocs\projectPHP\app\views\templates\messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6290c5d0137188_72843207',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e463f871e6a3114e593db04cb0d48887369146ce' => 
    array (
      0 => 'E:\\xampp\\htdocs\\projectPHP\\app\\views\\templates\\messages.tpl',
      1 => 1653654958,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6290c5d0137188_72843207 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
<pre><code>
        <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['err']->value->text;?>
</li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
</code></pre>
<?php }
if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
<pre><code>
        <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['inf']->value->text;?>
</li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
</code></pre>
<?php }?>

<?php }
}
