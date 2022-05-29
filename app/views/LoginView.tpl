{extends file="main.tpl"}
{block name=content}
    <section id="banner">
        <div class="inner">
            <!--	<div class="logo"><span class="icon fa-gem"></span></div> -->
            <h2>Zaloguj się</h2>
            <form method="post" action="{$conf->action_root}login">
                <div class="row gtr-uniform">
                    <div class="col-6 col-12-xsmall">
                        <label for="demo-name">Login</label>
                        <input type="text" name="login" id="login" value="" />
                        <label for="demo-name">Hasło</label>
                        <input type="password" name="pass" id="pass" value="" />
                        <div class="col-6 col-12-xsmall">
                            <input type="submit" value="Zaloguj" class="button primary"></li>
                            <p>Nie masz konta?<a href="{$conf->action_root}register">zarejestruj się</a></p>

                        </div>
                    </div>
                    {include file='messages.tpl'}
                </div>

            </form>

        </div>
    </section>
    <!-- Wrapper -->

{/block}