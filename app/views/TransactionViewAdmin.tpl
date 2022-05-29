{extends file="main.tpl"}
{block name=content}
<!-- Banner -->
<section id="banner">
    <div class="inner">
        <!--	<div class="logo"><span class="icon fa-gem"></span></div> -->
        {include file='messages.tpl'}
        <h2>Transakcje w systemie</h2>
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
                                    <td>
                                        <p>Jakies opcje</p>
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