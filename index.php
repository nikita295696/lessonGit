<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/x-icon" href="./images/favicon.ico" />

    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="./content/style.css">

    <title>File manager</title>
</head>

<body>

<?php
session_start();
$currentFolder = $_SESSION['folder'] ?? realpath('uploads');

include "models/Folder.php";

if(isset($_GET['folder'])) {
    $_SESSION['folder'] = $currentFolder . "/" . $_GET['folder'];
    $_SESSION['folder'] = realpath($_SESSION['folder']);
   header("Location: index.php");
}

$setFolder = new Folder($_POST['folder_name'] ?? "");
$setFolder->setFolder();
$setFolder->createFolder();

chdir($currentFolder);

$files = $_FILES['files'] ?? [];

if(count($files) > 0) {
    $countFile = count($files["name"]);

    for($i = 0; $i < $countFile; $i++) {
        try {
            $fileName = $files["name"][$i];
            $tmpName = $files["tmp_name"][$i];

            if(file_exists($fileName)) {
                throw new Exception("This file exist");
            }

            move_uploaded_file($tmpName, $fileName);
        } catch(Exception $exception) {
            echo $exception->getMessage();
        }
    }
}

?>

    <div class="content">

        <form name="create" id="create_folder" method="post">
            <input type="text" name="folder_name" placeholder="Folder Name">
            <button type="submit">Create folder</button>
        </form>

        <div class="gallery row">
            <ul>
                <?php
                foreach(scandir($currentFolder) as $item) {
                    if($item !== '.' && $item !== '.gitignore' && !(basename($currentFolder) === 'uploads' && $item === '..')) {
                        if(is_dir($item)) {
                            ?> <li><a href="?folder=<?= $item ?>"><?= $item ?></a></li> <?php
                        } else {
                            ?> <li><a href="#" download="<?= $item ?>"><?= $item ?></a></li> <?php
                        }
                    }
                }
                ?>
            </ul>
        </div>

        <form name="upload" method="post" enctype="multipart/form-data">
            <input type="file" name="files[]" multiple>
            <button type="submit">Upload</button>
        </form>

    </div>

    <script src="./services/validation.js"></script>
</body>

</html>