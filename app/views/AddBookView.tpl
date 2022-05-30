{extends file="main.tpl"}
{block name=content}

    <!-- Wrapper -->
    <section id="wrapper">

        <header>
            <div class="inner">
                <h2>Dodaj książke</h2>
                <form method="post" action="{$conf->action_root}bookAdd">
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall">
                            <label for="title">Tytuł</label>
                            <input type="text" name="title" id="title" value="" />

                            <label for="author">Autor</label>
                            <input type="text" name="author" id="author" value="" />

                            <label for="releaseDate">Data opublikowania</label>
                            <input type="text" name="releaseDate" id="releaseDate" value="" />

                            <label for="page">Liczba stron</label>
                            <input type="text" name="page" id="page" value="" />

                            <label for="publisher">Wydawnictwo</label>
                            <input type="text" name="publisher" id="publisher" value="" />

                            <div class="col-6 col-12-xsmall">
                                <input type="submit" value="Dodaj" class="button primary"></li>
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