<?php

class Folder {

    public $name;
    public $arrFolders;

    public function __construct($name) {
        $this->name = $name;
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

        var_dump($this->name);
        if(!empty($this->name) && !file_exists("uploads/$this->name")){
            mkdir("uploads/$this->name");
        }

//        if(!is_dir("uploads/$this->name")) {
//            mkdir("uploads/$this->name");
//        }

        /*foreach($showFolders as $folder) {
            echo "<li>" . "<a href='uploads/".$folder['name']."'>" . $folder['name'] . "</a>" . "</li>";
        }*/
    }
}
