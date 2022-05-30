<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('mainPageShow'); // akcja/ścieżka domyślna
App::getRouter()->setLoginRoute('login'); // akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

Utils::addRoute('mainPageShow',         'MainPageCtrl');
Utils::addRoute('bookList',             'MainPageCtrl');
Utils::addRoute('login',                'LoginCtrl');
Utils::addRoute('logout',               'LoginCtrl');
Utils::addRoute('register',             'RegisterCtrl');

Utils::addRoute('userList',             'userListCtrl',         ['systemAdmin']);
Utils::addRoute('userEdit',             'userEditCtrl',         ['systemAdmin']);
Utils::addRoute('userSave',             'userEditCtrl',         ['systemAdmin']);
Utils::addRoute('userNew',              'userEditCtrl',         ['systemAdmin']);

Utils::addRoute('bookBorrow',           'TransactionUserCtrl',  ['user']);
Utils::addRoute('bookBorrowCancel',     'TransactionUserCtrl',  ['user']);
Utils::addRoute('transactionUserShow',  'TransactionUserCtrl',  ['user']);

Utils::addRoute('transactionAdminShow', 'TransactionAdminCtrl', ['libraryAdmin']);
Utils::addRoute('bookBorrowConfirm',    'TransactionAdminCtrl', ['libraryAdmin']);
Utils::addRoute('bookReturnConfirm',    'TransactionAdminCtrl', ['libraryAdmin']);
Utils::addRoute('bookHistoryShow',      'TransactionAdminCtrl', ['libraryAdmin']);
Utils::addRoute('bookAdd',              'BookAddCtrl',          ['libraryAdmin']);




//Utils::addRoute('addBook',        'BookCtrl' ,     ['libraryAdmin']);


