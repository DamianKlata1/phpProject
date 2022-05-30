<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>{$page_title|default:"Tytuł domyślny"}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css" />
    <noscript><link rel="stylesheet" href="{$conf->app}/assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        <h1><a href="{$conf->action_root}mainPageShow">Biblioteka Online</a></h1>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <div class="inner">
            <h2>Menu</h2>
            <ul class="links">
                {if count($conf->roles)>0}
                    <li>użytkownik: {$user->login}, rola: {$user->role}</li>
                    <li><a href="{$conf->action_root}logout">Wyloguj się</a></li>
                    {if strcmp($user->role,"systemAdmin")==0}
                        <li><a href="{$conf->action_root}userList">Zarządzaj systemem</a></li>
                    {/if}
                    {if strcmp($user->role,"user")==0}
                        <li><a href="{$conf->action_root}transactionUserShow">Moje transakcje</a></li>
                    {/if}
                    {if strcmp($user->role,"libraryAdmin")==0}
                        <li><a href="{$conf->action_root}transactionAdminShow">Transakcje w systemie</a></li>
                        <li><a href="{$conf->action_root}bookAdd">Dodaj książke</a></li>
                    {/if}

                {else}
                    <li>rola : gość</li>
                    <li><a href="{$conf->action_root}login">Zaloguj się</a></li>
                    <li><a href="{$conf->action_root}register">Zarejestruj się</a></li>
                {/if}
                <li><a href="{$conf->action_root}mainPageShow">Strona główna</a></li>
            </ul>
            <a href="#" class="close">Close</a>
        </div>
    </nav>
    {block name=content} {/block}

    <!-- Footer -->
    <section id="footer">
        <div class="inner">
            <h2 class="major">Skontaktuj się z nami</h2>
            <ul class="contact">
                <li class="icon solid fa-home">
                    Biblioteka Online<br />
                    Wojska Polskiego 21<br />
                    Sosnowiec,41-200
                </li>
                <li class="icon solid fa-phone">(12) 345-6789</li>
                <li class="icon solid fa-envelope"><a href="#">biblioteka@online.pl</a></li>
                <li class="icon brands fa-twitter"><a href="#">twitter.com/bibliotekaOnline</a></li>
                <li class="icon brands fa-facebook-f"><a href="#">facebook.com/bibliotekaOnline</a></li>
                <li class="icon brands fa-instagram"><a href="#">instagram.com/bibliotekaOnline</a></li>
            </ul>
            <ul class="copyright">
                <li>&copy; Untitled Inc. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </div>
    </section>

</div>

<!-- Scripts -->
<script src="{$conf->app_url}/assets/js/jquery.min.js"></script>
<script src="{$conf->app_url}/assets/js/jquery.scrollex.min.js"></script>
<script src="{$conf->app_url}/assets/js/browser.min.js"></script>
<script src="{$conf->app_url}/assets/js/breakpoints.min.js"></script>
<script src="{$conf->app_url}/assets/js/util.js"></script>
<script src="{$conf->app_url}/assets/js/main.js"></script>

</body>
</html>