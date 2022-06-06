<?php
/* Smarty version 4.1.0, created on 2022-06-06 21:03:38
  from 'E:\xampp\htdocs\projectPHP\app\views\TransactionViewAdmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629e4f8a297dd1_00844050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a97e1c5aa5f0b70fcaa72d9b746378b2ac7266db' => 
    array (
      0 => 'E:\\xampp\\htdocs\\projectPHP\\app\\views\\TransactionViewAdmin.tpl',
      1 => 1654542008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_629e4f8a297dd1_00844050 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1602450391629e4f8a26e868_01719109', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_1602450391629e4f8a26e868_01719109 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1602450391629e4f8a26e868_01719109',
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
        <h2>Transakcje w systemie</h2>
        <p>Wyszukaj transakcje</p>
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
transactionAdminShow">
            <div class="row gtr-uniform">
                <div class="col-6 col-12-xsmall">
                    <input type="text" name="searchBar" id="searchBar" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->searchBar;?>
" /><br>
                    <input type="submit" value="Szukaj" class="button primary"></li>
                </div>
            </div></form>
        <section id="one" class="wrapper spotlight style1">
            <div class="inner">
                <?php if (!empty($_smarty_tpl->tpl_vars['transactions']->value)) {?>
                    <table>
                        <thead>
                        <tr>
                            <th>Użytkownik</th>
                            <th>Tytuł</th>
                            <th>Data rezerwacji</th>
                            <th>Data wypożyczenia</th>
                            <th>Data Zwrotu</th>
                            <th>Data Odrezerwowania</th>
                            <th>Opcje</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['transactions']->value, 'transaction');
$_smarty_tpl->tpl_vars['transaction']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['transaction']->value) {
$_smarty_tpl->tpl_vars['transaction']->do_else = false;
?>
                            <tr><td><?php echo $_smarty_tpl->tpl_vars['transaction']->value["login"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['transaction']->value["title"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['transaction']->value["reservationDate"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['transaction']->value["borrowDate"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['transaction']->value["returnDate"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['transaction']->value["cancelReservationDate"];?>
</td><td><?php if ((isset($_smarty_tpl->tpl_vars['transaction']->value["reservationDate"])) && !(isset($_smarty_tpl->tpl_vars['transaction']->value["borrowDate"])) && !(isset($_smarty_tpl->tpl_vars['transaction']->value["cancelReservationDate"]))) {?><a class="button small" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
bookBorrowConfirm/<?php echo $_smarty_tpl->tpl_vars['transaction']->value['idTransaction'];?>
/<?php echo $_smarty_tpl->tpl_vars['transaction']->value['idBook'];?>
">Wypożycz</a><?php }
if ((isset($_smarty_tpl->tpl_vars['transaction']->value["borrowDate"])) && !(isset($_smarty_tpl->tpl_vars['transaction']->value["returnDate"]))) {?><a class="button small" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
bookReturnConfirm/<?php echo $_smarty_tpl->tpl_vars['transaction']->value['idTransaction'];?>
/<?php echo $_smarty_tpl->tpl_vars['transaction']->value['idBook'];?>
">Zwrot</a><?php }
if (((isset($_smarty_tpl->tpl_vars['transaction']->value["reservationDate"])) && $_smarty_tpl->tpl_vars['transaction']->value["cancelReservationDate"]) || ((isset($_smarty_tpl->tpl_vars['transaction']->value["borrowDate"])) && (isset($_smarty_tpl->tpl_vars['transaction']->value["returnDate"])))) {?><p>Transakcja zakończona</p><?php }?></td></tr>
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
transactionAdminShow/<?php echo $_smarty_tpl->tpl_vars['pageno']->value-1;
}?>"
                                           class="<?php if ($_smarty_tpl->tpl_vars['pageno']->value <= 1) {?>button small disabled<?php } else { ?>button small<?php }?>">Prev</a></li>
                                    <li><a href="<?php if ($_smarty_tpl->tpl_vars['pageno']->value >= $_smarty_tpl->tpl_vars['total_pages']->value) {?> #<?php } else {
echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
transactionAdminShow/<?php echo $_smarty_tpl->tpl_vars['pageno']->value+1;
}?>"
                                           class="<?php if ($_smarty_tpl->tpl_vars['pageno']->value >= $_smarty_tpl->tpl_vars['total_pages']->value) {?>button small disabled<?php } else { ?>button small<?php }?>">Next</a></li>
                                </ul></td>
                        </tr>

                        </tfoot>
                    </table>
                    <?php } else { ?>
                    <p>Brak transakcji w systemie</p>
                <?php }?>

            </div>

        </section>

    </div>
</section>
<?php
}
}
/* {/block 'content'} */
}
