<?php

namespace app\controllers;

use core\App;
use core\RoleUtils;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\UserEditForm;
use Couchbase\Role;
use core\SessionUtils;

class UserEditCtrl {

    private $form; //dane formularza

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new UserEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() {
        //0. Pobranie parametrów
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji1');
        $this->form->login = ParamUtils::getFromRequest('login', true, 'Błędne wywołanie aplikacji2');
        $this->form->password = ParamUtils::getFromRequest('password', true, 'Błędne wywołanie aplikacji3');
        $this->form->name = ParamUtils::getFromRequest('name', true, 'Błędne wywołanie aplikacji4');
        $this->form->surname = ParamUtils::getFromRequest('surname', true, 'Błędne wywołanie aplikacji5');
        $this->form->email = ParamUtils::getFromRequest('email', true, 'Błędne wywołanie aplikacji6');
        $this->form->active = ParamUtils::getFromPost('active', true, 'Błędne wywołanie aplikacji7');
        $this->form->role = ParamUtils::getFromPost('role', true, 'Błędne wywołanie aplikacji8');


        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if ((empty($this->form->login))||(empty($this->form->password))||
            (empty($this->form->email))|| (empty($this->form->name))||(empty($this->form->surname))||
            (empty($this->form->active))|| (empty($this->form->role))) {
            Utils::addErrorMessage('Należy wypełnić wszystkie pola');
        }

        if (App::getMessages()->isError())
            return false;

        // 2. sprawdzenie poprawności przekazanych parametrów




        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_userNew() {
        $this->generateView();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_userEdit() {
        // 1. walidacja id osoby do edycji
        if ($this->validateEdit()) {
            try {
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("user", "*", [
                    "idUser" => $this->form->id
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->id = $record['idUser'];
                $this->form->name = $record['name'];
                $this->form->surname = $record['surname'];
                $this->form->login = $record['login'];
                $this->form->password = $record['password'];
                $this->form->email = $record['e-mail'];
                $this->form->active = $record['active'];
                $this->form->role= RoleUtils::checkRoleInDatabase($this->form->login);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateView();
    }

    public function action_userDeactivate() {
        // 1. walidacja id osoby do deaktywacji
        if ($this->validateEdit()) {

            try {
                // 2. deaktywacja uzytkownika
                App::getDB()->update("user", [
                    "active" => "no"
                ], [
                    "idUser" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie dezaktywowano użytkownika');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        App::getRouter()->forwardTo('userList');
    }

    public function action_userSave()
    {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSave()) {
            // 2. Zapis danych w bazie
            try {
                //2.1 Nowy rekord
                if ($this->form->id == '') {
                    App::getDB()->insert("user", [
                        "login" => $this->form->login,
                        "password" => $this->form->password,
                        "name" => $this->form->name,
                        "surname" => $this->form->surname,
                        "e-mail" => $this->form->email,
                        "active" => $this->form->active
                    ]);
                    RoleUtils::addRoleToDatabase($this->form->login,$this->form->role);
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("user", [
                        "login" => $this->form->login,
                        "password" => $this->form->password,
                        "name" => $this->form->name,
                        "surname" => $this->form->surname,
                        "e-mail" => $this->form->email,
                        "active" => $this->form->active
                    ], [
                        "idUser" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            App::getRouter()->forwardTo('personList');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('user',SessionUtils::loadObject('user',true));
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('UserEditView.tpl');
    }

}
