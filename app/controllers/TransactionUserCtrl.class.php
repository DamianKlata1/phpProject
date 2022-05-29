<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\SessionUtils;
use core\Utils;

class TransactionUserCtrl
{
    private $user;
    private $bookId;
    private $records;
    private $transactionId;

    public function __construct()
    {
        //stworzenie potrzebnych obiektów
        $this->user = SessionUtils::loadObject('user', true);

    }

    public function validateBorrow()
    {
        $this->bookId = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        if (!Utils::isBookAvailable($this->bookId)) {
            Utils::addErrorMessage("Błędne wywołanie aplikacji");
        }
        return !App::getMessages()->isError();
    }

    public function validateBorrowCancel()
    {
        $this->transactionId = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        $this->bookId = ParamUtils::getFromCleanURL(2, true, 'Błędne wywołanie aplikacji');

        return !App::getMessages()->isError();
    }

    public function action_bookBorrow()
    {
        if ($this->validateBorrow()) {
            try {
                App::getDB()->insert("transaction", [
                    "idUser" => Utils::getUserIdByLogin($this->user->login),
                    "idBook" => $this->bookId,
                    "reservationDate" => date("Y-m-d"),
                ]);
                App::getDB()->update("book", [
                    "available" => "no"
                ], [
                    "idBook" => $this->bookId
                ]);
                Utils::addInfoMessage('Pomyślnie zarezerwowano książke,');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            App::getRouter()->forwardTo('transactionUserShow');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            App::getRouter()->forwardTo('MainPageShow');
        }

    }

    public function action_bookBorrowCancel()
    {
        if ($this->validateBorrowCancel()) {
            try {
                App::getDB()->update("transaction", [
                    "cancelReservationDate" => date("Y-m-d"),
                ], [
                    "idTransaction" => $this->transactionId
                ]);
                App::getDB()->update("book", [
                    "available" => "yes"
                ], [
                    "idBook" => $this->bookId
                ]);
                Utils::addInfoMessage('Pomyślnie anulowano rezerwacje');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            App::getRouter()->forwardTo('transactionUserShow');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function action_transactionUserShow()
    {
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
                [
                    "user.login" => $this->user->login
                ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        $this->generateView();
    }


    public function generateView()
    {

        App::getSmarty()->assign('user', $this->user);

        App::getSmarty()->assign('page_title', 'Transakcje');
        App::getSmarty()->assign('transactions', $this->records);


        App::getSmarty()->display('TransactionView.tpl');
    }
}