<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
session_start();
$currentFolder = $_SESSION['folder'] ?? realpath('uploads');

if(isset($_GET['folder'])) {
    $_SESSION['folder'] = $_SESSION['folder'] . "/" . $_GET['folder'];
    $_SESSION['folder'] = realpath($_SESSION['folder']);
    header("Location: index.php");
}

chdir($_SESSION['folder']);

?>

<form id="create_folder" method="post">
    <input type="text" name="folder_name" placeholder="Folder Name">
    <button type="submit">Create folder</button>
</form>

<ul>
    <?php
        foreach(scandir($_SESSION['folder']) as $item) {
            if($item !== '.' && $item !== '.gitignore' && !(basename($_SESSION['folder']) === 'uploads' && $item === '..')) {
                if(is_dir($item)) {
                    ?> <li><a href="?folder=<?= $item ?>"><?= $item ?></a></li> <?php
                } else {
                    ?> <li><a href="#" download="<?= $item ?>"><?= $item ?></a></li> <?php
                }
            }
        } 
    ?>
</ul>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="files" multiple>
    <button type="submit">Upload</button>
</form>

</body>
</html>