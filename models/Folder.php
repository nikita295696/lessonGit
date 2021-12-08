<?php

class Folder {

    public $name;
    public $arrFolders;
    public $path;

    public function __construct($name, $path) {
        $this->name = $name;
        $this->path = $path;
    }

    public function getJson() {
        $arrFolders = [];
        if(file_exists('folders.json')) {
            $arrFolders = json_decode(file_get_contents('folders.json'));
        }
        return $arrFolders;
    }

    public function setFolder() {
        $fileFolders = "folders.json";

        $folders = $this->getJson();
        if($this->name != null) {
            $folders[] = [
            "name" => $this->name,
            "files" => [],
            ];
        }

        file_put_contents($fileFolders, json_encode($folders));
    }

    public function createFolder() {
        $showFolders = [];
        $showFolders = json_decode(file_get_contents('folders.json'), true);

        if(!empty($this->name) && !file_exists("$this->path/$this->name")){
            mkdir("$this->path/$this->name");
        }

//        if(!is_dir("uploads/$this->name")) {
//            mkdir("uploads/$this->name");
//        }

        /*foreach($showFolders as $folder) {
            echo "<li>" . "<a href='uploads/".$folder['name']."'>" . $folder['name'] . "</a>" . "</li>";
        }*/
    }
}
