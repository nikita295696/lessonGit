<?php

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

ProductsRepository::setProduct(new ProductPhone("Phone 1", 5000, 1));
ProductsRepository::setProduct(new ProductMonitor("Monitor 1", 10000, 50));

ProductsRepository::saveFileJSON();


foreach (ProductsRepository::getArrayProducts() as $product){
    // проверяет, что класс наследует класс
    if($product instanceof Product){
        echo $product->getProduct() . "<br/>";
    }
}