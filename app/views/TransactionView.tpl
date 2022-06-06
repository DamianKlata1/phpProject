{extends file="main.tpl"}
{block name=content}
<!-- Banner -->
<section id="banner">
    <div class="inner">
        <!--	<div class="logo"><span class="icon fa-gem"></span></div> -->
        {include file='messages.tpl'}
        <h2>Twoje transakcje</h2>
        <section id="one" class="wrapper spotlight style1">
            <div class="inner">

                {if !empty($transactions)}
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
                        {foreach $transactions as $transaction}
                            {strip}
                                <tr>
                                    <td>{$transaction["title"]}</td>
                                    <td>{$transaction["reservationDate"]}</td>
                                    <td>{$transaction["borrowDate"]}</td>
                                    <td>{$transaction["returnDate"]}</td>
                                    <td>{$transaction["cancelReservationDate"]}</td>
                                    <td>
                                        {if !isset($transaction["borrowDate"])&&!isset($transaction["returnDate"])
                                        &&!isset($transaction["cancelReservationDate"])}

                                        <a class="button small" href="{$conf->action_url}bookBorrowCancel/
                                            {$transaction['idTransaction']}/{$transaction['idBook']}">Odrezerwuj</a>

                                        {/if}

                                        {if isset($transaction["reservationDate"])&&(isset($transaction["returnDate"])
                                        ||isset($transaction["cancelReservationDate"]))}

                                            <p>Transakcja zakończona</p>

                                        {/if}

                                        {if isset($transaction["borrowDate"])&&!isset($transaction["returnDate"])}

                                            <p>Transakcja w toku</p>

                                        {/if}

                                    </td>
                                </tr>
                            {/strip}
                        {/foreach}

                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5"></td>
                            <td><ul class="pagination">
                                    <li><a href="{if $pageno <= 1}# {else}{$conf->action_url}transactionUserShow/{$pageno - 1}{/if}"
                                           class="{if $pageno <= 1}button small disabled{else}button small{/if}">Prev</a></li>
                                    <li><a href="{if $pageno >= $total_pages} #{else}{$conf->action_url}transactionUserShow/{$pageno + 1}{/if}"
                                           class="{if $pageno >= $total_pages}button small disabled{else}button small{/if}">Next</a></li>
                                </ul></td>
                        </tr>

                        </tfoot>
                    </table>
                    {else}
                    <p>Nie masz aktualnie żadnych transakcji</p>
                {/if}

            </div>

        </section>

    </div>
</section>
{/block}