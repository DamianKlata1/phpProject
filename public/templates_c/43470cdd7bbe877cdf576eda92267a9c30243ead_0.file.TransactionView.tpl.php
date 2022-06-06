<?php
/* Smarty version 4.1.0, created on 2022-06-06 21:05:48
  from 'E:\xampp\htdocs\projectPHP\app\views\TransactionView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629e500c227be8_57138616',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43470cdd7bbe877cdf576eda92267a9c30243ead' => 
    array (
      0 => 'E:\\xampp\\htdocs\\projectPHP\\app\\views\\TransactionView.tpl',
      1 => 1654541688,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_629e500c227be8_57138616 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_510296314629e500c202714_05769374', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_510296314629e500c202714_05769374 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_510296314629e500c202714_05769374',
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
        <h2>Twoje transakcje</h2>
        <section id="one" class="wrapper spotlight style1">
            <div class="inner">

                <?php if (!empty($_smarty_tpl->tpl_vars['transactions']->value)) {?>
                    <table>
                        <thead>
                        <tr>
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
                            <tr><td><?php echo $_smarty_tpl->tpl_vars['transaction']->value["title"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['transaction']->value["reservationDate"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['transaction']->value["borrowDate"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['transaction']->value["returnDate"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['transaction']->value["cancelReservationDate"];?>
</td><td><?php if (!(isset($_smarty_tpl->tpl_vars['transaction']->value["borrowDate"])) && !(isset($_smarty_tpl->tpl_vars['transaction']->value["returnDate"])) && !(isset($_smarty_tpl->tpl_vars['transaction']->value["cancelReservationDate"]))) {?><a class="button small" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
bookBorrowCancel/<?php echo $_smarty_tpl->tpl_vars['transaction']->value['idTransaction'];?>
/<?php echo $_smarty_tpl->tpl_vars['transaction']->value['idBook'];?>
">Odrezerwuj</a><?php }
if ((isset($_smarty_tpl->tpl_vars['transaction']->value["reservationDate"])) && ((isset($_smarty_tpl->tpl_vars['transaction']->value["returnDate"])) || (isset($_smarty_tpl->tpl_vars['transaction']->value["cancelReservationDate"])))) {?><p>Transakcja zakończona</p><?php }
if ((isset($_smarty_tpl->tpl_vars['transaction']->value["borrowDate"])) && !(isset($_smarty_tpl->tpl_vars['transaction']->value["returnDate"]))) {?><p>Transakcja w toku</p><?php }?></td></tr>
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
transactionUserShow/<?php echo $_smarty_tpl->tpl_vars['pageno']->value-1;
}?>"
                                           class="<?php if ($_smarty_tpl->tpl_vars['pageno']->value <= 1) {?>button small disabled<?php } else { ?>button small<?php }?>">Prev</a></li>
                                    <li><a href="<?php if ($_smarty_tpl->tpl_vars['pageno']->value >= $_smarty_tpl->tpl_vars['total_pages']->value) {?> #<?php } else {
echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
transactionUserShow/<?php echo $_smarty_tpl->tpl_vars['pageno']->value+1;
}?>"
                                           class="<?php if ($_smarty_tpl->tpl_vars['pageno']->value >= $_smarty_tpl->tpl_vars['total_pages']->value) {?>button small disabled<?php } else { ?>button small<?php }?>">Next</a></li>
                                </ul></td>
                        </tr>

                        </tfoot>
                    </table>
                    <?php } else { ?>
                    <p>Nie masz aktualnie żadnych transakcji</p>
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
