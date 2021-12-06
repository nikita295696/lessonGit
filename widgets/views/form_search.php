<?php
/** @var Product[] $arrayProducts */
/** @var string $searchName */

$arr = ProductsRepository::getArrayProducts();
?>
<form method="get">
    <input name="name" value="<?= $searchName?>" type="text" placeholder="Product Name">
    <button type="submit">search</button>
</form>

<ul>
    <?php foreach ($arr as $product){?>
        <li><?= $product->getProduct(); ?></li>
    <?php } ?>
</ul>
