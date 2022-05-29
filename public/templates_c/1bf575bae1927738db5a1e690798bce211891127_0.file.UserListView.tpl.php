<?php
/* Smarty version 4.1.0, created on 2022-05-29 14:34:18
  from 'E:\xampp\htdocs\projectPHP\app\views\UserListView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6293684a961e94_84215455',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1bf575bae1927738db5a1e690798bce211891127' => 
    array (
      0 => 'E:\\xampp\\htdocs\\projectPHP\\app\\views\\UserListView.tpl',
      1 => 1653827653,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6293684a961e94_84215455 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16911720596293684a94ed57_95688217', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_16911720596293684a94ed57_95688217 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_16911720596293684a94ed57_95688217',
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
                        <a class="button primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userNew">Dodaj użytkownika</a>
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
">Edytuj</a></td></tr>
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
