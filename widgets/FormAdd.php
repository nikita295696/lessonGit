<?php


// Форма добавления
class FormAdd extends BaseForm
{
    private $name;
    private $price;

    public function post(){
        $this->name = $_POST["name"] ?? "";
        $this->price = $_POST["price"] ?? "";

        $product = new Product($this->name, $this->price);


        if($product->isValid()) {
            ProductsRepository::setProduct($product);
            ProductsRepository::saveFileJSON();

            header("Location: index.php");
        }
    }

    public function render()
    {
        ob_start();

        include "views/form_add.php";

        return ob_get_clean();
    }
}