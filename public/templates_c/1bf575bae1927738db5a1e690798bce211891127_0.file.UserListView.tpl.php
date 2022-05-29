<?php
/* Smarty version 4.1.0, created on 2022-05-28 16:14:42
  from 'E:\xampp\htdocs\projectPHP\app\views\UserListView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62922e528531a8_82987465',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1bf575bae1927738db5a1e690798bce211891127' => 
    array (
      0 => 'E:\\xampp\\htdocs\\projectPHP\\app\\views\\UserListView.tpl',
      1 => 1653747281,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62922e528531a8_82987465 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_168160899662922e52841379_79290628', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_168160899662922e52841379_79290628 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_168160899662922e52841379_79290628',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <section id="banner">
        <div class="inner">
            <h2>Zarządzenie systemem</h2>
            <p>Wyszukaj użytkownika po loginie:</p>
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userList">
                <div class="row gtr-uniform">
                    <div class="col-6 col-12-xsmall">
                        <input type="text" name="login" id="login" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->login;?>
" /><br>
                        <input type="submit" value="Szukaj" class="button primary"></li>
                    </div>
                </div></form>
        </div>
    </section>

    <!-- Wrapper -->

        <!-- One -->
        <section id="one" class="wrapper spotlight style1">
            <div class="inner">

                <table>
                    <thead>
                    <tr>
                        <th>Login</th>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>E-Mail</th>
                        <th>Rola</th>
                        <th>Konto aktywne</th>
                        <th>Opcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'u');
$_smarty_tpl->tpl_vars['u']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
$_smarty_tpl->tpl_vars['u']->do_else = false;
?>
                        <tr><td><?php echo $_smarty_tpl->tpl_vars['u']->value["login"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['u']->value["name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['u']->value["surname"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['u']->value["e-mail"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['u']->value["nameOfRole"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['u']->value["active"];?>
</td><td><a class="button small" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userEdit/<?php echo $_smarty_tpl->tpl_vars['u']->value['idUser'];?>
">Edytuj</a>&nbsp;<a class="button small" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userDeactivate/<?php echo $_smarty_tpl->tpl_vars['u']->value['idUser'];?>
">Dezaktywuj</a></td></tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    </tbody>
                </table>


            </div>
        </section>

        <!-- Two -->


        <!-- Three -->

























<?php
}
}
/* {/block 'content'} */
}
