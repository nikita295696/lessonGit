<?php

include "models/IRenderForm.php";
include "models/IFormPost.php";
include "models/Product.php";
include "models/BaseForm.php";
include "widgets/FormAdd.php";
include "models/ProductsRepository.php";
include "widgets/ListProducts.php";
include "widgets/FormSearch.php";
include "models/ProductPhone.php";
include "models/ProductMonitor.php";


// Получаем продукты из файла
ProductsRepository::readFileJSON();


/***********    Формируем форму добавления товаров    ************/
$form = new FormAdd();
if(count($_POST)){
    $form->post();;
}


/***********    Формируем список товаров    ************/
$list = new ListProducts(ProductsRepository::getArrayProducts());


/***********    Формируем форму поиска    ************/
$list2 = new FormSearch();


$output = [
    $form,
    $list,
    $list2
];

foreach ($output as $tag){
    if($tag instanceof BaseForm){
        $tag->post();
        echo $tag->render();
    }
}



$arrayProducts = ProductsRepository::getArrayProducts();

var_dump( min(array_column($arrayProducts, "_price")));