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

    <div class="content">
        <form name="create" id="create_folder" method="post">
            <input type="text" name="folder_name" placeholder="Folder Name">
            <button type="submit">Create folder</button>
        </form>


    <ul>
        <?php include "models/Folder.php";
            $setFolder = new Folder($_POST['folder_name'] ?? "");
            $setFolder->setFolder();
            echo $setFolder->createFolder();
        ?>
    </ul>

        <form name="upload" method="post" enctype="multipart/form-data">
            <input type="file" name="files" multiple>
            <button type="submit">Upload</button>
        </form>

        <div class="gallery row">
            
        </div>
    </div>

    <script src="./services/validation.js"></script>
</body>

</html>