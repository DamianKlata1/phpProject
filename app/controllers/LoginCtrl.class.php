<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\transfer\User;
use app\forms\LoginForm;
use core\SessionUtils;
use core\Messages;

class LoginCtrl{
    private $form;

    public function __construct(){
        //stworzenie potrzebnych obiektów
        $this->form = new LoginForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        if (!isset($this->form->login))
            return false;

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
        }
        if(!Utils::isUserActive($this->form->login)){
            Utils::addErrorMessage('Twoje konto jest niaktywne');
        }

        //nie ma sensu walidować dalej, gdy brak wartości
        if (App::getMessages()->isError())
            return false;


        $passwordfromdatabase = App::getDB()->get("user", "password", [
            "login" => $this->form->login
        ]);


        if ($this->form->pass == $passwordfromdatabase) {
            RoleUtils::addRoleFromDatabase($this->form->login);

            $user = new User($this->form->login, RoleUtils::checkRoleInDatabase($this->form->login));
            SessionUtils::storeObject('user', $user);

        }  else {
            Utils::addErrorMessage('Niepoprawny login lub hasło');
        }


        return !App::getMessages()->isError();
    }

    public function action_loginShow() {
        $this->generateView();
    }

    public function action_login(){

        if ($this->validate()){
            Utils::addErrorMessage('Poprawnie zalogowano do systemu');
            App::getRouter()->redirectTo('mainPageShow');
        } else {
            //niezalogowany => wyświetl stronę logowania
            $this->generateView();
        }

    }

    public function action_logout() {
        // 1. zakończenie sesji

        session_destroy();

        App::getRouter()->redirectTo('mainPageShow');
    }

    public function generateView(){

        App::getSmarty()->assign('page_title','Strona logowania');
        App::getSmarty()->assign('form',$this->form);
        App::getSmarty()->display('LoginView.tpl');
    }
}