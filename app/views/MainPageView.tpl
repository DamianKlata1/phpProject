{extends file="main.tpl"}
{block name=content}
<!-- Banner -->
<section id="banner">
	<div class="inner">
		<!--	<div class="logo"><span class="icon fa-gem"></span></div> -->
		{include file='messages.tpl'}
		<h2>Biblioteka Online</h2>
		<p>Wyszukaj książke po tytule lub autorze:</p>
		<form method="post" action="{$conf->action_root}bookList">
			<div class="row gtr-uniform">
				<div class="col-6 col-12-xsmall">
					<input type="text" name="searchBar" id="searchBar" value="{$searchForm->searchBar}" /><br>
					<input type="submit" value="Szukaj" class="button primary"></li>
				</div>
			</div></form>
	</div>
</section>

    <!-- Wrapper -->
{*    <section id="wrapper">*}

        <!-- One -->
        <section id="one" class="wrapper spotlight style1">
            <div class="inner">

	{if !empty($books)}
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
                    {foreach $books as $book}
                        {if strcmp($book["available"],"yes")==0}
                        {strip}
                            <tr>
                                <td>{$book["title"]}</td>
                                <td>{$book["author"]}</td>
                                <td>{$book["publisher"]}</td>
                                <td>{$book["releaseDate"]}</td>
                                <td>{$book["page"]}</td>
                                <td>
                                    {if isset($user->role)&&strcmp($user->role,"libraryAdmin")==0}
                                        <a class="button small" href="{$conf->action_url}bookHistoryShow/{$book['idBook']}">Historia</a>
                                    {/if}
                                    {if !isset($user->role)||strcmp($user->role,"user")==0}
                                        <a class="button small" href="{$conf->action_url}bookBorrow/{$book['idBook']}">Zarezerwuj</a>
                                    {/if}
                                </td>
                            </tr>
                        {/strip}
                        {/if}
                    {/foreach}

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5"></td>
                        <td><ul class="pagination">
                                <li><a href="{if $pageno <= 1}# {else}{$conf->action_url}bookList/{$pageno - 1}/{$searchForm->searchBar}{/if}"
                                       class="{if $pageno <= 1}button small disabled{else}button small{/if}">Prev</a></li>
                                <li><a href="{if $pageno >= $total_pages} #{else}{$conf->action_url}bookList/{$pageno + 1}/{$searchForm->searchBar}{/if}"
                                       class="{if $pageno >= $total_pages}button small disabled{else}button small{/if}">Next</a></li>
                            </ul></td>
                    </tr>

                    </tfoot>
                </table>



            </div>


        </section>



    {/if}
        <!-- Two -->
        <!-- Three -->
{*    </section>*}
{/block}