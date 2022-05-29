{extends file="main.tpl"}
{block name=content}

    <!-- Wrapper -->
    <section id="wrapper">

        <header>
            <div class="inner">
                {if !empty($form->id)}
                    <h2>Edycja użytkownika</h2>
                {else}
                    <h2>Dodanie użytkownika</h2>
                {/if}
                <form method="post" action="{$conf->action_root}userSave">
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall">
                            <label for="demo-name">Login</label>
                            <input type="text" name="login" id="login" value="{$form->login}" />

                            <label for="demo-name">Hasło</label>
                            <input type="password" name="password" id="password" value="{$form->password}" />

                            <label for="demo-name">E-mail</label>
                            <input type="text" name="email" id="email" value="{$form->email}" />

                            <label for="demo-name">Imię</label>
                            <input type="text" name="name" id="name" value="{$form->name}" />

                            <label for="demo-name">Nazwisko</label>
                            <input type="text" name="surname" id="surname" value="{$form->surname}" />

                            <label for="demo-name">Konto aktywne</label>
                            <div class="col-4 col-12-small">
                                <input type="radio" id="yes" name="active" {if (strcmp($form->active,"yes")==0)||!isset($form->active)}checked{/if} value="yes">
                                <label for="yes">Tak</label>
                            </div>

                            <div class="col-4 col-12-small">
                                <input type="radio" id="no" name="active" {if (strcmp($form->active,"no")==0)}checked{/if} value ="no">
                                <label for="no">Nie</label>
                            </div>

                            <label for="role">Rola</label>
                            <select name="role" id="role">
                                {foreach $rolesFromDatabase as $r}
                                    {if strcmp($r['nameOfRole'],"guest")==0}
                                        {else}
                                            <option value="{$r['nameOfRole']}" {if (strcmp($r['nameOfRole'],$form->role)==0)}selected{/if}>{$r['nameOfRole']}</option>
                                    {/if}
                                {/foreach}
                            </select>

                            <div class="col-6 col-12-xsmall">
                                <input type="submit" value="{if !empty($form->id)}Edytuj{else}Dodaj{/if}" class="button primary"></li>
                            </div>
                        </div>
                        {include file='messages.tpl'}
                    </div>
                    <input type="hidden" name="id" value="{$form->id}">
                </form>
            </div>

        </header>
        <!-- Content -->

    </section>
{/block}