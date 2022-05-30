{extends file="main.tpl"}
{block name=content}
<!-- Banner -->
<section id="banner">
    <div class="inner">
        <!--	<div class="logo"><span class="icon fa-gem"></span></div> -->
        {include file='messages.tpl'}
        <h2>Transakcje w systemie</h2>
        <p>Wyszukaj transakcje</p>
        <form method="post" action="{$conf->action_root}transactionAdminShow">
            <div class="row gtr-uniform">
                <div class="col-6 col-12-xsmall">
                    <input type="text" name="searchBar" id="searchBar" value="{$searchForm->searchBar}" /><br>
                    <input type="submit" value="Szukaj" class="button primary"></li>
                </div>
            </div></form>
        <section id="one" class="wrapper spotlight style1">
            <div class="inner">
                {if !empty($transactions)}
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
                        {foreach $transactions as $transaction}
                            {strip}
                                <tr>
                                    <td>{$transaction["login"]}</td>
                                    <td>{$transaction["title"]}</td>
                                    <td>{$transaction["reservationDate"]}</td>
                                    <td>{$transaction["borrowDate"]}</td>
                                    <td>{$transaction["returnDate"]}</td>
                                    <td>{$transaction["cancelReservationDate"]}</td>
                                    <td>{if isset($transaction["reservationDate"])&&!isset($transaction["borrowDate"])&&
                                        !isset($transaction["cancelReservationDate"])}
                                            <a class="button small" href="{$conf->action_url}bookBorrowConfirm/
                                                {$transaction['idTransaction']}/{$transaction['idBook']}">Wypożycz</a>
                                        {/if}
                                        {if isset($transaction["borrowDate"])&&!isset($transaction["returnDate"])}
                                            <a class="button small" href="{$conf->action_url}bookReturnConfirm/
                                                {$transaction['idTransaction']}/{$transaction['idBook']}">Zwrot</a>
                                        {/if}
                                        {if (isset($transaction["reservationDate"])&&$transaction["cancelReservationDate"])
                                            ||(isset($transaction["borrowDate"])&&isset($transaction["returnDate"]))}
                                            <p>Transakcja zakończona</p>
                                            {/if}
                                    </td>
                                </tr>
                            {/strip}
                        {/foreach}

                        </tbody>
                    </table>
                    {else}
                    <p>Brak transakcji w systemie</p>
                {/if}

            </div>

        </section>

    </div>
</section>
{/block}