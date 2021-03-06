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
use app\forms\SearchForm;
use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;

class MainPageCtrl {

    private $form; //dane formularza wyszukiwania
    private $records; //rekordy pobrane z bazy danych
    private $totalPages;
    private $pageNo;
    private $recordsOnOnePage=10;
    private $offset;

    public function __construct() {
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

    public function validate() {
        // 1. sprawdzenie, czy parametry zostały przekazane
        // - nie trzeba sprawdzać
        if(isset($_REQUEST['searchBar'])){
            $this->form->searchBar = ParamUtils::getFromRequest('searchBar');
        }
        else{
            $this->form->searchBar = ParamUtils::getFromCleanURL(2);
        }
        // 2. sprawdzenie poprawności przekazanych parametrów
        // - nie trzeba sprawdzać

        return !App::getMessages()->isError();
    }




    public function action_bookList() {
        // 1. Walidacja danych formularza (z pobraniem)
        // - W tej aplikacji walidacja nie jest potrzebna, ponieważ nie wystąpią błedy podczas podawania nazwiska.
        //   Jednak pozostawiono ją, ponieważ gdyby uzytkownik wprowadzał np. datę, lub wartość numeryczną, to trzeba
        //   odpowiednio zareagować wyświetlając odpowiednią informację (poprzez obiekt wiadomości Messages)
        $this->validate();
        $this->pagination();

        // 2. Przygotowanie mapy z parametrami wyszukiwania (nazwa_kolumny => wartość)
        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->form->searchBar) && strlen($this->form->searchBar) > 0) {
            $search_params['title[~]'] = $this->form->searchBar . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
            $search_params['author[~]'] = $this->form->searchBar . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }

        // 3. Pobranie listy rekordów z bazy danych
        // W tym wypadku zawsze wyświetlamy listę osób bez względu na to, czy dane wprowadzone w formularzu wyszukiwania są poprawne.
        // Dlatego pobranie nie jest uwarunkowane poprawnością walidacji (jak miało to miejsce w kalkulatorze)
        //przygotowanie frazy where na wypadek większej liczby parametrów
        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["OR" => &$search_params];
        } else {
            $where = &$search_params;
        }
        $this->totalPages=ceil(App::getDB()->count("book",$where)/$this->recordsOnOnePage);
        //dodanie frazy sortującej po loginie
        $where ["ORDER"] = "title";
        $where ["LIMIT"] = [$this->offset, $this->recordsOnOnePage];
        //wykonanie zapytania

        try {
            $this->records = App::getDB()->select("book",
                [
                    "idBook",
                    "title",
                    "author",
                    "releaseDate",
                    "publisher",
                    "available",
                    "page"
                ],
                $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        // 4. wygeneruj widok

        $this->generateView();
    }

    public function action_mainPageShow(){
        $this->generateView();
    }



    /**
     * Wygenerowanie widoku
     */
    public function generateView(){
        App::getSmarty()->assign('total_pages', $this->totalPages);
        App::getSmarty()->assign('pageno', $this->pageNo);

        App::getSmarty()->assign('user',SessionUtils::loadObject('user',true));

        App::getSmarty()->assign('page_title','Biblioteka Online');

        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)

        App::getSmarty()->assign('books', $this->records);  // lista rekordów z bazy danych

        App::getSmarty()->display('MainPageView.tpl');
    }
}
