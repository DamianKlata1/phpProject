<?php
namespace app\controllers;

use app\forms\BookAddForm;
use core\App;
use core\SessionUtils;
use core\Utils;
use core\Validator;
use DateTime;

class BookAddCtrl{
    private $form;
    private $v;

    public function __construct(){
        $this->form=new BookAddForm();
        $this->v=new Validator();
    }
    public function validate(){
        $this->form->title=$this->v->validateFromRequest('title',[
            'min_length' => 1,
            'max_length' => 30,
            'validator_message'=>'Niepoprawny tytuł',
        ]);
        $this->form->author=$this->v->validateFromRequest('author',[
            'min_length' => 2,
            'max_length' => 30,
            'validator_message'=>'Niepoprawny autor',
        ]);
        $this->form->releaseDate=$this->v->validateFromRequest('releaseDate',[
            'date_format'=> 'Y-m-d',
            'validator_message'=>'Niepoprawna data',
        ]);
        $this->form->publisher=$this->v->validateFromRequest('publisher',[
            'min_length' => 1,
            'max_length' => 30,
            'validator_message'=>'Niepoprawny wydawca'
        ]);
        $this->form->page=$this->v->validateFromRequest('page',[
            'int'=>true,
            'validator_message'=>'Ilość stron musi być liczbą całkowitą'
        ]);

        if (!isset($this->form->title))
            return false;

        if ((empty($this->form->title))||(empty($this->form->author))||(empty($this->form->releaseDate))||
            (empty($this->form->publisher))||(empty($this->form->page))) {
            Utils::addErrorMessage('Należy wypełnić wszystkie pola');
        }
        return !App::getMessages()->isError();
    }
    public function action_bookAdd(){

            // 1. Walidacja danych formularza (z pobraniem)
            if ($this->validate()) {
                // 2. Zapis danych w bazie
                try {
                    App::getDB()->insert("book", [
                        "title" => $this->form->title,
                        "author" => $this->form->author,
                        "releaseDate" => $this->form->releaseDate->format('Y-m-d'),
                        "publisher" => $this->form->publisher,
                        "page" => $this->form->page,
                        "available" => "yes"
                    ]);
                    Utils::addInfoMessage('Pomyślnie dodano książke');
                }
                catch (\PDOException $e) {
                    Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                    if (App::getConf()->debug)
                        Utils::addErrorMessage($e->getMessage());
                }


                // 3b. Po zapisie przejdź na stronę logowania (w ramach tego samego żądania http)

                App::getRouter()->forwardTo("MainPageShow");
            } else {
                // 3c. Gdy błąd walidacji to pozostań na stronie
                $this->generateView();
            }



    }
    public function generateView(){
        App::getSmarty()->assign('user',SessionUtils::loadObject('user',true));
        App::getSmarty()->assign('page_title','Strona dodawania książki');
        App::getSmarty()->assign('form',$this->form);
        App::getSmarty()->display('AddBookView.tpl');
    }
}