<?php
/* Smarty version 4.1.0, created on 2022-05-30 15:29:38
  from 'E:\xampp\htdocs\projectPHP\app\views\TransactionViewAdmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6294c6c2e3dc70_19069605',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a97e1c5aa5f0b70fcaa72d9b746378b2ac7266db' => 
    array (
      0 => 'E:\\xampp\\htdocs\\projectPHP\\app\\views\\TransactionViewAdmin.tpl',
      1 => 1653917376,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6294c6c2e3dc70_19069605 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4587833476294c6c2e1ea40_54663198', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_4587833476294c6c2e1ea40_54663198 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_4587833476294c6c2e1ea40_54663198',
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
