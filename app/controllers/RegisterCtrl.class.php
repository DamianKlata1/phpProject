<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\transfer\User;
use app\forms\RegisterForm;
use core\SessionUtils;
use core\Messages;
use Couchbase\Role;

class RegisterCtrl{
    private $form;

    public function __construct(){
        //stworzenie potrzebnych obiektów
        $this->form = new RegisterForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass1 = ParamUtils::getFromRequest('pass1');
        $this->form->pass2 = ParamUtils::getFromRequest('pass2');
        $this->form->email = ParamUtils::getFromRequest('email');
        $this->form->name = ParamUtils::getFromRequest('name');
        $this->form->surname = ParamUtils::getFromRequest('surname');

        if (!isset($this->form->login))
            return false;


        if ((empty($this->form->login))||(empty($this->form->pass1))||(empty($this->form->pass2))||
            (empty($this->form->email))||(empty($this->form->name))||(empty($this->form->surname))) {
            Utils::addErrorMessage('Należy wypełnić wszystkie pola');
        }
        if (strcmp($this->form->pass1, $this->form->pass2) !== 0) {
            Utils::addErrorMessage('Hasła nie są takie same');
        }
        if(Utils::doesLoginExistsInDatabase($this->form->login)){
            Utils::addErrorMessage('Na podany login jest już zarejestrowane konto');
        }
        if(Utils::doesEmailExistsInDatabase($this->form->email)){
            Utils::addErrorMessage('Na podany e-mail jest już zarejestrowane konto');
        }

        return !App::getMessages()->isError();
    }

    public function action_registerShow() {
        $this->generateView();
    }

    public function action_register(){
        {
            $role="user";
            // 1. Walidacja danych formularza (z pobraniem)
            if ($this->validate()) {
                // 2. Zapis danych w bazie
                try {
                        App::getDB()->insert("user", [
                            "login" => $this->form->login,
                            "password" => $this->form->pass1,
                            "name" => $this->form->name,
                            "surname" => $this->form->surname,
                            "e-mail" => $this->form->email,
                            "active" =>"yes"
                        ]);
                        Utils::addInfoMessage('Pomyślnie zarejestrowano, teraz możesz się zalogować');

                }
                 catch (\PDOException $e) {
                    Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                    if (App::getConf()->debug)
                        Utils::addErrorMessage($e->getMessage());
                }

                RoleUtils::addRoleToDatabase($this->form->login,"user");

                // 3b. Po zapisie przejdź na stronę logowania (w ramach tego samego żądania http)
                App::getRouter()->forwardTo('Login');
            } else {
                // 3c. Gdy błąd walidacji to pozostań na stronie
                $this->generateView();
            }
        }


    }


    public function generateView(){

        App::getSmarty()->assign('page_title','Strona rejestrowania');
        App::getSmarty()->assign('form',$this->form);
        App::getSmarty()->display('RegisterView.tpl');
    }
}