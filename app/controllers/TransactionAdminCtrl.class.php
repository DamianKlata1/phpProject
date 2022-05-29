<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\SessionUtils;
use core\Utils;

class TransactionAdminCtrl
{
    private $user;
    private $bookId;
    private $records;
    private $transactionId;

    public function __construct()
    {
        //stworzenie potrzebnych obiektów

    }

    public function action_transactionAdminShow()
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

        App::getSmarty()->assign('user',SessionUtils::loadObject('user',true));

        App::getSmarty()->assign('page_title', 'Transakcje');
        App::getSmarty()->assign('transactions', $this->records);


        App::getSmarty()->display('TransactionViewAdmin.tpl');
    }
}