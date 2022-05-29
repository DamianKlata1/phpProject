<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('mainPageShow'); // akcja/ścieżka domyślna
App::getRouter()->setLoginRoute('login'); // akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

Utils::addRoute('mainPageShow',   'MainPageCtrl');
Utils::addRoute('searchBooks',    'MainPageCtrl');

Utils::addRoute('login',          'LoginCtrl');
Utils::addRoute('logout',         'LoginCtrl');
Utils::addRoute('register',       'RegisterCtrl');

Utils::addRoute('userList',       'userListCtrl',     ['systemAdmin']);
Utils::addRoute('userEdit',       'userEditCtrl',     ['systemAdmin']);
Utils::addRoute('userDeactivate', 'userEditCtrl',     ['systemAdmin']);
Utils::addRoute('userSave',       'userEditCtrl',     ['systemAdmin']);


//Utils::addRoute('addBook',        'BookCtrl' ,     ['libraryAdmin']);


