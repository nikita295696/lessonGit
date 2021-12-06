<?php

/** @var Button $this */

?>

<button
    style="background-color: <?= $this->getBackground()?>; width: <?= $this->getWidth()?>px; height: <?= $this->getHeight();?>"
    type="<?= $this->getSubmitState() ? "submit" : "button"?>"
>Button</button>
