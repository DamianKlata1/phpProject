<?php
/* Smarty version 4.1.0, created on 2022-05-29 20:53:41
  from 'E:\xampp\htdocs\projectPHP\app\views\MainPageView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6293c135433cb5_81659249',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a43a2c27b17194c3c3e6c58d09277c796fcd8a64' => 
    array (
      0 => 'E:\\xampp\\htdocs\\projectPHP\\app\\views\\MainPageView.tpl',
      1 => 1653850418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6293c135433cb5_81659249 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_776208046293c13541c1d3_00209712', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_776208046293c13541c1d3_00209712 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_776208046293c13541c1d3_00209712',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Banner -->
<section id="banner">
	<div class="inner">
		<!--	<div class="logo"><span class="icon fa-gem"></span></div> -->
		<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		<h2>Biblioteka Online</h2>
		<p>Wyszukaj książke po tytule lub autorze:</p>
		<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
bookList">
			<div class="row gtr-uniform">
				<div class="col-6 col-12-xsmall">
					<input type="text" name="searchBar" id="searchBar" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->searchBar;?>
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

	<?php if (!empty($_smarty_tpl->tpl_vars['books']->value)) {?>
                <table>
                    <thead>
                    <tr>
                        <th>Tytuł</th>
                        <th>Autor</th>
                        <th>Wydawnictwo</th>
                        <th>Data opublikowania</th>
                        <th>Liczba Stron</th>
						<th>Opcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['books']->value, 'book');
$_smarty_tpl->tpl_vars['book']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['book']->value) {
$_smarty_tpl->tpl_vars['book']->do_else = false;
?>
                        <?php if (strcmp($_smarty_tpl->tpl_vars['book']->value["available"],"yes") == 0) {?>
                        <tr><td><?php echo $_smarty_tpl->tpl_vars['book']->value["title"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['book']->value["author"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['book']->value["publisher"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['book']->value["releaseDate"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['book']->value["page"];?>
</td><td><a class="button small" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
bookBorrow/<?php echo $_smarty_tpl->tpl_vars['book']->value['idBook'];?>
">Zarezerwuj</a></td></tr>
                        <?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    </tbody>
                </table>
	<?php }?>

            </div>

        </section>

        <!-- Two -->
        <!-- Three -->
<?php
}
}
/* {/block 'content'} */
}
