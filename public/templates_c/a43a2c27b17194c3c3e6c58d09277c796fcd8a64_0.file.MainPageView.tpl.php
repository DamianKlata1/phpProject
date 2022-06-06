<?php
/* Smarty version 4.1.0, created on 2022-06-06 19:36:23
  from 'E:\xampp\htdocs\projectPHP\app\views\MainPageView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629e3b17b19251_86138414',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a43a2c27b17194c3c3e6c58d09277c796fcd8a64' => 
    array (
      0 => 'E:\\xampp\\htdocs\\projectPHP\\app\\views\\MainPageView.tpl',
      1 => 1654536674,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_629e3b17b19251_86138414 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1548739338629e3b17af1ba9_02406106', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_1548739338629e3b17af1ba9_02406106 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1548739338629e3b17af1ba9_02406106',
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
</td><td><?php if ((isset($_smarty_tpl->tpl_vars['user']->value->role)) && strcmp($_smarty_tpl->tpl_vars['user']->value->role,"libraryAdmin") == 0) {?><a class="button small" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
bookHistoryShow/<?php echo $_smarty_tpl->tpl_vars['book']->value['idBook'];?>
">Historia</a><?php }
if (!(isset($_smarty_tpl->tpl_vars['user']->value->role)) || strcmp($_smarty_tpl->tpl_vars['user']->value->role,"user") == 0) {?><a class="button small" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
bookBorrow/<?php echo $_smarty_tpl->tpl_vars['book']->value['idBook'];?>
">Zarezerwuj</a><?php }?></td></tr>
                        <?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5"></td>
                        <td><ul class="pagination">
                                <li><a href="<?php if ($_smarty_tpl->tpl_vars['pageno']->value <= 1) {?># <?php } else {
echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
bookList/<?php echo $_smarty_tpl->tpl_vars['pageno']->value-1;?>
/<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->searchBar;
}?>"
                                       class="<?php if ($_smarty_tpl->tpl_vars['pageno']->value <= 1) {?>button small disabled<?php } else { ?>button small<?php }?>">Prev</a></li>
                                <li><a href="<?php if ($_smarty_tpl->tpl_vars['pageno']->value >= $_smarty_tpl->tpl_vars['total_pages']->value) {?> #<?php } else {
echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
bookList/<?php echo $_smarty_tpl->tpl_vars['pageno']->value+1;?>
/<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->searchBar;
}?>"
                                       class="<?php if ($_smarty_tpl->tpl_vars['pageno']->value >= $_smarty_tpl->tpl_vars['total_pages']->value) {?>button small disabled<?php } else { ?>button small<?php }?>">Next</a></li>
                            </ul></td>
                    </tr>

                    </tfoot>
                </table>



            </div>


        </section>



    <?php }?>
        <!-- Two -->
        <!-- Three -->
<?php
}
}
/* {/block 'content'} */
}
