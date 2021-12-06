<?php
/** @var Product[] $arrayProducts */
?>

<ul>
    <?php foreach ($arrayProducts as $product){?>
        <li><?= $product->getProduct(); ?></li>
    <?php } ?>
</ul>
