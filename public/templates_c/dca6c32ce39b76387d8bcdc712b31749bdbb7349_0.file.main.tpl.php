<?php
/* Smarty version 4.1.0, created on 2022-05-30 20:05:46
  from 'E:\xampp\htdocs\projectPHP\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6295077ad53176_18140489',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dca6c32ce39b76387d8bcdc712b31749bdbb7349' => 
    array (
      0 => 'E:\\xampp\\htdocs\\projectPHP\\app\\views\\templates\\main.tpl',
      1 => 1653933945,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6295077ad53176_18140489 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/main.css" />
    <noscript><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app;?>
/assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        <h1><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
mainPageShow">Biblioteka Online</a></h1>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <div class="inner">
            <h2>Menu</h2>
            <ul class="links">
                <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
                    <li>użytkownik: <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
, rola: <?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
</li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout">Wyloguj się</a></li>
                    <?php if (strcmp($_smarty_tpl->tpl_vars['user']->value->role,"systemAdmin") == 0) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
userList">Zarządzaj systemem</a></li>
                    <?php }?>
                    <?php if (strcmp($_smarty_tpl->tpl_vars['user']->value->role,"user") == 0) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
transactionUserShow">Moje transakcje</a></li>
                    <?php }?>
                    <?php if (strcmp($_smarty_tpl->tpl_vars['user']->value->role,"libraryAdmin") == 0) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
transactionAdminShow">Transakcje w systemie</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
bookAdd">Dodaj książke</a></li>
                    <?php }?>

                <?php } else { ?>
                    <li>rola : gość</li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login">Zaloguj się</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
register">Zarejestruj się</a></li>
                <?php }?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
mainPageShow">Strona główna</a></li>
            </ul>
            <a href="#" class="close">Close</a>
        </div>
    </nav>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2223798946295077ad4eb13_82111188', 'content');
?>


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
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/browser.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/util.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/js/main.js"><?php echo '</script'; ?>
>

</body>
</html><?php }
/* {block 'content'} */
class Block_2223798946295077ad4eb13_82111188 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2223798946295077ad4eb13_82111188',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'content'} */
}
