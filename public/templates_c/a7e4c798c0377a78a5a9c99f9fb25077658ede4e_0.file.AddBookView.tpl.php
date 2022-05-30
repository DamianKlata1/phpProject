<?php
/* Smarty version 4.1.0, created on 2022-05-30 16:33:51
  from 'E:\xampp\htdocs\projectPHP\app\views\AddBookView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6294d5cf7fc4a2_69056648',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7e4c798c0377a78a5a9c99f9fb25077658ede4e' => 
    array (
      0 => 'E:\\xampp\\htdocs\\projectPHP\\app\\views\\AddBookView.tpl',
      1 => 1653920191,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6294d5cf7fc4a2_69056648 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13308811196294d5cf7f2641_15243771', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_13308811196294d5cf7f2641_15243771 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_13308811196294d5cf7f2641_15243771',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <!-- Wrapper -->
    <section id="wrapper">

        <header>
            <div class="inner">
                <h2>Dodaj książke</h2>
                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
bookAdd">
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall">
                            <label for="title">Tytuł</label>
                            <input type="text" name="title" id="title" value="" />

                            <label for="author">Autor</label>
                            <input type="text" name="author" id="author" value="" />

                            <label for="releaseDate">Data opublikowania</label>
                            <input type="text" name="releaseDate" id="releaseDate" value="" />

                            <label for="page">Liczba stron</label>
                            <input type="text" name="page" id="page" value="" />

                            <label for="publisher">Wydawnictwo</label>
                            <input type="text" name="publisher" id="publisher" value="" />

                            <div class="col-6 col-12-xsmall">
                                <input type="submit" value="Dodaj" class="button primary"></li>
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
