!<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form id="create_folder" method="post">
    <input type="text" name="folder_name" placeholder="Folder Name">
    <button type="submit">Create folder</button>
</form>

<ul>
    <li><a href="#">Folder 1</a> </li>
    <li><a href="#">File</a> </li>
</ul>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="files" multiple>
    <button type="submit">Upload</button>
</form>

</body>
</html>