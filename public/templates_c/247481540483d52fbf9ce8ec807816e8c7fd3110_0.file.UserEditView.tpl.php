<?php
/* Smarty version 4.1.0, created on 2022-05-28 21:09:22
  from 'E:\xampp\htdocs\projectPHP\app\views\UserEditView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629273628548a8_75761795',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '247481540483d52fbf9ce8ec807816e8c7fd3110' => 
    array (
      0 => 'E:\\xampp\\htdocs\\projectPHP\\app\\views\\UserEditView.tpl',
      1 => 1653764959,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_629273628548a8_75761795 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_124532844662927362839228_20285374', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_124532844662927362839228_20285374 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_124532844662927362839228_20285374',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <!-- Wrapper -->
    <section id="wrapper">

        <header>
            <div class="inner">
                <h2>Edycja użytkownika</h2>
                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userSave">
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall">
                            <label for="demo-name">Login</label>
                            <input type="text" name="login" id="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
" />

                            <label for="demo-name">Hasło</label>
                            <input type="password" name="password" id="password" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->password;?>
" />

                            <label for="demo-name">E-mail</label>
                            <input type="text" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->email;?>
" />

                            <label for="demo-name">Imię</label>
                            <input type="text" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
" />

                            <label for="demo-name">Nazwisko</label>
                            <input type="text" name="surname" id="surname" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->surname;?>
" />

                            <label for="demo-name">Konto aktywne</label>
                            <div class="col-4 col-12-small">
                                <input type="radio" id="yes" name="active" <?php if ((strcmp($_smarty_tpl->tpl_vars['form']->value->active,"yes") == 0)) {?>checked<?php }?> value="yes">
                                <label for="yes">Tak</label>
                            </div>

                            <div class="col-4 col-12-small">
                                <input type="radio" id="no" name="active" <?php if ((strcmp($_smarty_tpl->tpl_vars['form']->value->active,"no") == 0)) {?>checked<?php }?> value ="no">
                                <label for="no">Nie</label>
                            </div>

                            <label for="role">Rola</label>
                            <select name="role" id="role">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rolesFromDatabase']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['r']->value['nameOfRole'];?>
" <?php if ((strcmp($_smarty_tpl->tpl_vars['r']->value['nameOfRole'],$_smarty_tpl->tpl_vars['form']->value->role) == 0)) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['r']->value['nameOfRole'];?>
</option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>

                            <div class="col-6 col-12-xsmall">
                                <input type="submit" value="Edytuj" class="button primary"></li>
                            </div>
                        </div>
                        <?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
                </form>
            </div>

        </header>
        <!-- Content -->

    </section>
<?php
}
}
/* {/block 'content'} */
}
