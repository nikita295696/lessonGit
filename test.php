<?php
session_start();

$isAuth = $_SESSION['auth'] ?? false;
?>


<nav>
    <ul>
        <li><a href="?page=home">Home</a></li>
        <li><a href="?page=about">About</a></li>
        <li><a href="?page=catalog">Catalog</a></li>
        <li><a href="?page=contact">Contact</a></li>
        <li><a href="?page=registration">Registration</a></li>
        <?php if($isAuth){ ?>
            <li><a href="?page=file_gallery">Gallery</a></li>
        <?php } ?>
        <li><a href="?page=login">login</a></li>
    </ul>
</nav>
