<?php
/* Smarty version 4.1.0, created on 2022-05-23 20:15:48
  from 'E:\xampp\htdocs\projectPHP\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_628bcf540bad17_36905615',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '26c6b7f03a19beec5b4ad34f536a337da5f52b49' => 
    array (
      0 => 'E:\\xampp\\htdocs\\projectPHP\\app\\views\\LoginView.tpl',
      1 => 1653329746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_628bcf540bad17_36905615 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2114481800628bcf540b5d25_20448872', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_2114481800628bcf540b5d25_20448872 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2114481800628bcf540b5d25_20448872',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <section id="banner">
        <div class="inner">
            <!--	<div class="logo"><span class="icon fa-gem"></span></div> -->
            <h2>Zaloguj się</h2>
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login">
                <div class="row gtr-uniform">
                    <div class="col-6 col-12-xsmall">
                        <label for="demo-name">Login</label>
                        <input type="text" name="login" id="login" value="" />
                        <label for="demo-name">Hasło</label>
                        <input type="text" name="pass" id="pass" value="" />
                        <div class="col-6 col-12-xsmall">
                            <input type="submit" value="Zaloguj" class="button primary"></li>
                            <p>Nie masz konta?<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
registerView">zarejestruj się</a></p>

                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
    <!-- Wrapper -->

<?php
}
}
/* {/block 'content'} */
}
