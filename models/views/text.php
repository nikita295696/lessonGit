<?php

/** @var Text $this */

?>

<textarea
        style="background-color: <?= $this->getBackground()?>; width: <?= $this->getWidth()?>px; height: <?= $this->getHeight();?>"
        name="<?= $this->getName()?>" id="<?= $this->getName()?>" placeholder="<?= $this->getPlaceholder()?>"><?= $this->getValue()?></textarea>
