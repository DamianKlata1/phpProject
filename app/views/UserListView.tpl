{extends file="main.tpl"}
{block name=content}
    <section id="banner">
        <div class="inner">
            <h2>Zarządzenie systemem</h2>
            <p>Wyszukaj użytkownika po loginie:</p>
            <form method="post" action="{$conf->action_root}userList">
                <div class="row gtr-uniform">
                    <div class="col-6 col-12-xsmall">
                        <input type="text" name="login" id="login" value="{$searchForm->searchBar}" /><br>
                        <input type="submit" value="Szukaj" class="button primary"></li>
                        <a class="button primary" href="{$conf->action_url}userNew">Dodaj użytkownika</a>
                    </div>
                </div></form>
        </div>
    </section>

    <!-- Wrapper -->
{*    <section id="wrapper">*}

        <!-- One -->
        <section id="one" class="wrapper spotlight style1">
            <div class="inner">

                <table>
                    <thead>
                    <tr>
                        <th>Login</th>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>E-Mail</th>
                        <th>Rola</th>
                        <th>Konto aktywne</th>
                        <th>Opcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach $users as $u}
                        {strip}
                            <tr>
                                <td>{$u["login"]}</td>
                                <td>{$u["name"]}</td>
                                <td>{$u["surname"]}</td>
                                <td>{$u["e-mail"]}</td>
                                <td>{$u["nameOfRole"]}</td>
                                <td>{$u["active"]}</td>

                                <td>
                                    <a class="button small" href="{$conf->action_url}userEdit/{$u['idUser']}">Edytuj</a>
                                </td>
                            </tr>
                        {/strip}
                    {/foreach}

                    </tbody>
                </table>


            </div>

        </section>
        <!-- Two -->
        <!-- Three -->
{*    </section>*}
{/block}