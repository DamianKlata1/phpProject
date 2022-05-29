{extends file="main.tpl"}
{block name=content}

    <!-- Wrapper -->
    <section id="wrapper">

        <header>
            <div class="inner">
                <h2>Zarejestruj się</h2>
                <form method="post" action="{$conf->action_root}register">
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall">
                            <label for="demo-name">Login</label>
                            <input type="text" name="login" id="login" value="" />

                            <label for="demo-name">Hasło</label>
                            <input type="password" name="pass1" id="pass1" value="" />

                            <label for="demo-name">Potwierdź hasło</label>
                            <input type="password" name="pass2" id="pass2" value="" />

                            <label for="demo-name">E-mail</label>
                            <input type="text" name="email" id="email" value="" />

                            <label for="demo-name">Imię</label>
                            <input type="text" name="name" id="name" value="" />

                            <label for="demo-name">Nazwisko</label>
                            <input type="text" name="surname" id="surname" value="" />

                            <div class="col-6 col-12-xsmall">
                                <input type="submit" value="Zarejestruj" class="button primary"></li>

                                <p>Masz już konto?<a href="{$conf->action_root}login">zaloguj się</a></p>

                            </div>
                        </div>
                        {include file='messages.tpl'}
                    </div>
                </form>
            </div>

        </header>
        <!-- Content -->

    </section>
{/block}