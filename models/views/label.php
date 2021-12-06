<?php

/** @var Label $this */

?>

<label
        style="background-color: <?= $this->getBackground()?>; width: <?= $this->getWidth()?>px; height: <?= $this->getHeight();?>"
        for="<?= $this->getParentName()?>"><?= $this->getParentName()?></label>
