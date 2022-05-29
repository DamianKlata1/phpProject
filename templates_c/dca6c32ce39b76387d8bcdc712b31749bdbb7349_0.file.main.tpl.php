<?php
/* Smarty version 4.1.0, created on 2022-05-23 20:28:04
  from 'E:\xampp\htdocs\projectPHP\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_628bd234c51b08_72672837',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dca6c32ce39b76387d8bcdc712b31749bdbb7349' => 
    array (
      0 => 'E:\\xampp\\htdocs\\projectPHP\\app\\views\\templates\\main.tpl',
      1 => 1653330483,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_628bd234c51b08_72672837 (Smarty_Internal_Template $_smarty_tpl) {
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
    <noscript><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        <h1><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/index.php">Biblioteka Online</a></h1>
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
                <?php } else { ?>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login">Zaloguj się</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
register">Zarejestruj się</a></li>
                <?php }?>
            </ul>
            <a href="#" class="close">Close</a>
        </div>
    </nav>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_747387602628bd234c50be3_59418734', 'content');
?>


    <!-- Footer -->
    <section id="footer">
        <div class="inner">
            <h2 class="major">Get in touch</h2>
            <p>Cras mattis ante fermentum, malesuada neque vitae, eleifend erat. Phasellus non pulvinar erat. Fusce tincidunt, nisl eget mattis egestas, purus ipsum consequat orci, sit amet lobortis lorem lacus in tellus. Sed ac elementum arcu. Quisque placerat auctor laoreet.</p>
            <form method="post" action="#">
                <div class="fields">
                    <div class="field">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" />
                    </div>
                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" />
                    </div>
                    <div class="field">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" rows="4"></textarea>
                    </div>
                </div>
                <ul class="actions">
                    <li><input type="submit" value="Send Message" /></li>
                </ul>
            </form>
            <ul class="contact">
                <li class="icon solid fa-home">
                    Untitled Inc<br />
                    1234 Somewhere Road Suite #2894<br />
                    Nashville, TN 00000-0000
                </li>
                <li class="icon solid fa-phone">(000) 000-0000</li>
                <li class="icon solid fa-envelope"><a href="#">information@untitled.tld</a></li>
                <li class="icon brands fa-twitter"><a href="#">twitter.com/untitled-tld</a></li>
                <li class="icon brands fa-facebook-f"><a href="#">facebook.com/untitled-tld</a></li>
                <li class="icon brands fa-instagram"><a href="#">instagram.com/untitled-tld</a></li>
            </ul>
            <ul class="copyright">
                <li>&copy; Untitled Inc. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </div>
    </section>

</div>

<!-- Scripts -->
<?php echo '<script'; ?>
 src="http://localhost/projectPHP/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="http://localhost/projectPHP/assets/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="http://localhost/projectPHP/assets/js/browser.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="http://localhost/projectPHP/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="http://localhost/projectPHP/assets/js/util.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="http://localhost/projectPHP/assets/js/main.js"><?php echo '</script'; ?>
>

</body>
</html><?php }
/* {block 'content'} */
class Block_747387602628bd234c50be3_59418734 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_747387602628bd234c50be3_59418734',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'content'} */
}
