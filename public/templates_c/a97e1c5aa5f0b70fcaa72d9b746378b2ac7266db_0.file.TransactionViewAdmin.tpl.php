<?php
/* Smarty version 4.1.0, created on 2022-05-29 23:19:00
  from 'E:\xampp\htdocs\projectPHP\app\views\TransactionViewAdmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6293e344ee3b39_01599014',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a97e1c5aa5f0b70fcaa72d9b746378b2ac7266db' => 
    array (
      0 => 'E:\\xampp\\htdocs\\projectPHP\\app\\views\\TransactionViewAdmin.tpl',
      1 => 1653856115,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6293e344ee3b39_01599014 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17638421836293e344ecf078_96376112', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_17638421836293e344ecf078_96376112 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_17638421836293e344ecf078_96376112',
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
</td><td><p>Jakies opcje</p></td></tr>
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
