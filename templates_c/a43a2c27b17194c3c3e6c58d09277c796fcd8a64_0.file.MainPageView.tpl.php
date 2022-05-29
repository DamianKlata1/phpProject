<?php
/* Smarty version 4.1.0, created on 2022-05-23 20:30:24
  from 'E:\xampp\htdocs\projectPHP\app\views\MainPageView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_628bd2c034db44_91348290',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a43a2c27b17194c3c3e6c58d09277c796fcd8a64' => 
    array (
      0 => 'E:\\xampp\\htdocs\\projectPHP\\app\\views\\MainPageView.tpl',
      1 => 1653330623,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_628bd2c034db44_91348290 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_406388129628bd2c0349185_01172592', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_406388129628bd2c0349185_01172592 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_406388129628bd2c0349185_01172592',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Banner -->
<section id="banner">
	<div class="inner">
		<!--	<div class="logo"><span class="icon fa-gem"></span></div> -->
		<h2>Biblioteka Online</h2>
		<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
searchBooks">
			<div class="row gtr-uniform">
				<div class="col-6 col-12-xsmall">
					<input type="text" name="searchBar" id="searchBar" value="autor lub tytuł..." /><br>
					<input type="submit" value="Szukaj" class="button primary"></li>

				</div>
			</div></form>
	</div>
</section>

<!-- Wrapper -->
<section id="wrapper">

	<!-- One -->
	<section id="one" class="wrapper spotlight style1">
		<div class="inner">

			<table>
				<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Price</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>Item One</td>
					<td>Ante turpis integer aliquet porttitor.</td>
					<td>29.99</td>
				</tr>
				<tr>
					<td>Item Two</td>
					<td>Vis ac commodo adipiscing arcu aliquet.</td>
					<td>19.99</td>
				</tr>
				<tr>
					<td>Item Three</td>
					<td> Morbi faucibus arcu accumsan lorem.</td>
					<td>29.99</td>
				</tr>
				<tr>
					<td>Item Four</td>
					<td>Vitae integer tempus condimentum.</td>
					<td>19.99</td>
				</tr>
				<tr>
					<td>Item Five</td>
					<td>Ante turpis integer aliquet porttitor.</td>
					<td>29.99</td>
				</tr>
				</tbody>
				<tfoot>
				<tr>
					<td colspan="2"></td>
					<td>100.00</td>
				</tr>
				</tfoot>
			</table>


		</div>
	</section>

	<!-- Two -->


	<!-- Three -->

</section>

<?php
}
}
/* {/block 'content'} */
}
