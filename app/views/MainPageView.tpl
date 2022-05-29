{extends file="main.tpl"}
{block name=content}
<!-- Banner -->
<section id="banner">
	<div class="inner">
		<!--	<div class="logo"><span class="icon fa-gem"></span></div> -->
		{include file='messages.tpl'}
		<h2>Biblioteka Online</h2>
		<p>Wyszukaj książke po tytule lub autorze:</p>
		<form method="post" action="{$conf->action_root}searchBooks">
			<div class="row gtr-uniform">
				<div class="col-6 col-12-xsmall">
					<input type="text" name="searchBar" id="searchBar" value="" /><br>
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

{/block}