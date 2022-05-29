<?php
/* Smarty version 4.1.0, created on 2022-05-27 21:52:28
  from 'E:\xampp\htdocs\projectPHP\app\views\RegisterView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62912bfc5bcdf2_53123217',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2bc5ac29b126529d788278adf497f331922bfc15' => 
    array (
      0 => 'E:\\xampp\\htdocs\\projectPHP\\app\\views\\RegisterView.tpl',
      1 => 1653681138,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_62912bfc5bcdf2_53123217 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_109322096662912bfc5b3876_75103221', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_109322096662912bfc5b3876_75103221 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_109322096662912bfc5b3876_75103221',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <!-- Wrapper -->
    <section id="wrapper">

        <header>
            <div class="inner">
                <h2>Zarejestruj się</h2>
                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
register">
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall">
                            <label for="demo-name">Login</label>
                            <input type="text" name="login" id="login" value="" />

                            <label for="demo-name">Hasło</label>
                            <input type="password" name="pass1" id="pass1" value="" />

                            <label for="demo-name">Potwierdź hasło</label>
                            <input type="password" name="pass2" id="pass2" value="" />

                            <label for="demo-name">E-mail</label>
                            <input type="text" name="email" id="email" value="" />

                            <label for="demo-name">Imię</label>
                            <input type="text" name="name" id="name" value="" />

                            <label for="demo-name">Nazwisko</label>
                            <input type="text" name="surname" id="surname" value="" />

                            <div class="col-6 col-12-xsmall">
                                <input type="submit" value="Zarejestruj" class="button primary"></li>

                                <p>Masz już konto?<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login">zaloguj się</a></p>

                            </div>
                        </div>
                        <?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                    </div>
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
