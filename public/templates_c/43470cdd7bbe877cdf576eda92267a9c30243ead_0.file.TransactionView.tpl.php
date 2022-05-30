<?php
/* Smarty version 4.1.0, created on 2022-05-30 15:26:31
  from 'E:\xampp\htdocs\projectPHP\app\views\TransactionView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6294c6074e4d86_57296511',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43470cdd7bbe877cdf576eda92267a9c30243ead' => 
    array (
      0 => 'E:\\xampp\\htdocs\\projectPHP\\app\\views\\TransactionView.tpl',
      1 => 1653916593,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6294c6074e4d86_57296511 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19972788496294c6074a35e3_56406991', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_19972788496294c6074a35e3_56406991 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_19972788496294c6074a35e3_56406991',
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
