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

        $fileAndPath = "$this->path/$this->name";

        if(!empty($this->name) && !file_exists($fileAndPath)){
            mkdir($fileAndPath);
        } else if(file_exists($fileAndPath) && !empty($this->name) ) {
            throw new Exception("Папка " . $this->name . " уже существует");
        }

    }
}
