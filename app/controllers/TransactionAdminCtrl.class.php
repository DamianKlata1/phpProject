<?php

namespace app\controllers;

use app\forms\SearchForm;
use core\App;
use core\ParamUtils;
use core\Router;
use core\SessionUtils;
use core\Utils;

class TransactionAdminCtrl
{
    private $user;
    private $bookId;
    private $records;
    private $transactionId;
    private $form;
    private $totalPages;
    private $pageNo;
    private $recordsOnOnePage=10;
    private $offset;

    public function __construct()
    {
        //stworzenie potrzebnych obiektów

        $this->form = new SearchForm();
    }
    public function validatePagination(){
        $this->pageNo=ParamUtils::getFromCleanURL(1);
        return isset($this->pageNo);
    }
    public function pagination()
    {
        if (!$this->validatePagination()) {
            $this->pageNo = 1;
        }

        $this->pageNo = intval($this->pageNo);
        $this->offset = ($this->pageNo - 1) * $this->recordsOnOnePage;

    }

    public function validateShow()
    {

        // 1. sprawdzenie, czy parametry zostały przekazane
        // - nie trzeba sprawdzać
        $this->form->searchBar = ParamUtils::getFromRequest('searchBar');

        // 2. sprawdzenie poprawności przekazanych parametrów
        // - nie trzeba sprawdzać

        return !App::getMessages()->isError();
    }
    public function validateHistoryShow()
    {
        $this->bookId = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');

        // 2. sprawdzenie poprawności przekazanych parametrów
        // - nie trzeba sprawdzać

        return !App::getMessages()->isError();
    }

    public function validateBorrowReturn()
    {
        $this->transactionId = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        $this->bookId = ParamUtils::getFromCleanURL(2, true, 'Błędne wywołanie aplikacji');

        return !App::getMessages()->isError();
    }

    public function action_bookBorrowConfirm()
    {
        if ($this->validateBorrowReturn()) {
            try {
                App::getDB()->update("transaction", [
                    "borrowDate" => date("Y-m-d"),
                ], [
                    "idTransaction" => $this->transactionId
                ]);
                Utils::addInfoMessage('Pomyślnie Wypożyczono książke,');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            App::getRouter()->redirectTo('transactionAdminShow');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            App::getRouter()->forwardTo('transactionAdminShow');
        }
    }

    public function action_bookReturnConfirm()
    {
        if ($this->validateBorrowReturn()) {
            try {
                App::getDB()->update("transaction", [
                    "returnDate" => date("Y-m-d"),
                ], [
                    "idTransaction" => $this->transactionId
                ]);
                App::getDB()->update("book", [
                    "available" => "yes",
                ], [
                    "idBook" => $this->bookId
                ]);
                Utils::addInfoMessage('Pomyślnie zwrócono książke,');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            App::getRouter()->redirectTo('transactionAdminShow');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            App::getRouter()->forwardTo('transactionAdminShow');
        }
    }


    public function action_transactionAdminShow()
    {
        $this->validateShow();
        $this->pagination();
        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->form->searchBar) && strlen($this->form->searchBar) > 0) {
            $search_params['login[~]'] = $this->form->searchBar . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
            $search_params['title[~]'] = $this->form->searchBar . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }
        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["OR" => &$search_params];
        } else {
            $where = &$search_params;
        }
        //dodanie frazy sortującej po loginie
        $this->totalPages=ceil(App::getDB()->count("transaction",[
                "[>]book" => ["idBook" => "idBook"],
                "[>]user" => ["idUser" => "idUser"]
                ],"idTransaction",
                $where)/$this->recordsOnOnePage);

        $where ["ORDER"] = ["reservationDate" => "DESC"];
        $where ["LIMIT"] = [$this->offset, $this->recordsOnOnePage];
        //wykonanie zapytania

        try {
            $this->records = App::getDB()->select("transaction",
                [
                    "[>]book" => ["idBook" => "idBook"],
                    "[>]user" => ["idUser" => "idUser"]
                ],
                [
                    "transaction.idTransaction",
                    "user.idUser",
                    "book.idBook",
                    "user.login",
                    "book.title",
                    "transaction.reservationDate",
                    "transaction.borrowDate",
                    "transaction.returnDate",
                    "transaction.cancelReservationDate"
                ],
                $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        $this->generateView();
    }

    public function action_bookHistoryShow()
    {
        if ($this->validateHistoryShow()) {
            try {
                $this->records = App::getDB()->select("transaction",
                    [
                        "[>]book" => ["idBook" => "idBook"],
                        "[>]user" => ["idUser" => "idUser"]
                    ],
                    [
                        "transaction.idTransaction",
                        "user.idUser",
                        "book.idBook",
                        "user.login",
                        "book.title",
                        "transaction.reservationDate",
                        "transaction.borrowDate",
                        "transaction.returnDate",
                        "transaction.cancelReservationDate"
                    ], [
                        "book.idBook" => $this->bookId
                    ]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            $this->generateView();
        }
        else{
            App::getRouter()->forwardTo('MainPageShow');
        }
    }

    public function generateView()
    {
        App::getSmarty()->assign('total_pages', $this->totalPages);
        App::getSmarty()->assign('pageno', $this->pageNo);


        App::getSmarty()->assign('user', SessionUtils::loadObject('user', true));

        App::getSmarty()->assign('page_title', 'Transakcje');
        App::getSmarty()->assign('transactions', $this->records);
        App::getSmarty()->assign('searchForm', $this->form);


        App::getSmarty()->display('TransactionViewAdmin.tpl');
    }



}