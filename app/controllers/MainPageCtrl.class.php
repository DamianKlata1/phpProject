<?php
// W skrypcie definicji kontrolera nie trzeba dołączać już niczego.
// Kontroler wskazuje tylko za pomocą 'use' te klasy z których jawnie korzysta
// (gdy korzysta niejawnie to nie musi - np używa obiektu zwracanego przez funkcję)

// Zarejestrowany autoloader klas załaduje odpowiedni plik automatycznie w momencie, gdy skrypt będzie go chciał użyć.
// Jeśli nie wskaże się klasy za pomocą 'use', to PHP będzie zakładać, iż klasa znajduje się w bieżącej
// przestrzeni nazw - tutaj jest to przestrzeń 'app\controllers'.

// Przypominam, że tu również są dostępne globalne funkcje pomocnicze - o to nam właściwie chodziło

namespace app\controllers;

//zamieniamy zatem 'require' na 'use' wskazując jedynie przestrzeń nazw, w której znajduje się klasa
use app\forms\MainPageForm;
use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\PersonSearchForm;
use core\Config;
use core\SessionUtils;

class MainPageCtrl {

    private $form;   //dane formularza (do obliczeń i dla widoku)

    /**
     * Konstruktor - inicjalizacja właściwości
     */
    public function __construct(){
        //stworzenie potrzebnych obiektów
        $this->form = new MainPageForm();
    }

    /**
     * Pobranie parametrów
     */
    public function getParams(){
        $this->form->searchBar = ParamUtils::getFromRequest('searchBar');

    }

    /**
     * Walidacja parametrów
     * @return true jeśli brak błedów, false w przeciwnym wypadku
     */
    public function validate() {
        // sprawdzenie, czy parametry zostały przekazane
        if (! (isset ( $this->form->searchBar ) )) {
            // sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
            return false;
        }

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if ($this->form->searchBar == "") {
            Utils::addErrorMessage('Brak wyszukania');
        }


        return ! getMessages()->isError();
    }

    /**
     * Pobranie wartości, walidacja, obliczenie i wyświetlenie
     */
    public function action_searchBooks(){

        $this->getParams();

        if ($this->validate()) {


            //wykonanie operacji
            Utils::addInfoMessage("Wykonuję operację");


        }

        $this->generateView();
    }

    public function action_mainPageShow(){
        $this->generateView();
    }



    /**
     * Wygenerowanie widoku
     */
    public function generateView(){
       // if (count(App::getConf()->roles)>0){
        App::getSmarty()->assign('user',SessionUtils::loadObject('user',true));
       // }

        App::getSmarty()->assign('page_title','Biblioteka Online');

        App::getSmarty()->assign('form',$this->form);

        App::getSmarty()->display('MainPageView.tpl');
    }
}
