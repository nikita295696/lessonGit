<?php

// Форма поиска
class FormSearch extends BaseForm{

    private $searchName;

    public function __construct()
    {
        $this->searchName = "";
    }

    /**
     * @return string
     */
    public function render(){
        $arrayProducts = [];
        if(isset($_GET["name"]) && !empty($_GET['name'])){
            $this->searchName = $_GET["name"];
            $arrayProducts = Product::searchByName(ProductsRepository::getArrayProducts(), $_GET["name"]);
        }

        $searchName = $this->searchName;

        ob_start();
        include "views/form_search.php";
        return ob_get_clean();
    }
}