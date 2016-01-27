<?php

namespace Utils;


class ImageUpload {

	private $fileToUpload;
    private $isValid;
    private $errors;
    private $fileName;
    private $route;

    // on crée une instance avec les données $_FILE du fichier à télécharger
    public function __construct($file , $route) {
        $this->fileToUpload = $file ;
        $this->route = $route;
        $this->isValid = True;
    }

    private function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    public function getFileName()
    {
        return $this->fileName;    
    }    

    public function getRoute()
    {
        return $this->route;    
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function isValid() {
        return $this->isValid;
    }    

    // 'assets/img/formations/src/'
    public function uploadFile() {
        $file_info = finfo_open(FILEINFO_MIME_TYPE);
        $infos = finfo_file($file_info, $this->fileToUpload['tmp_name']);

        finfo_close($file_info);

        if ($this->fileToUpload['error'] ) {
            $this->errors = "Erreur dans le téléchargement du fichier";
            $this->isValid = false;
        }
        elseif ( !in_array($infos, ['image/jpg', 'image/jpeg', 'image/gif','image/png']) ) {
            $this->errors = "Extension non authorisée pour le fichier " ;
            $this->isValid = false;               
        } else {
            $tmp_name = $this->fileToUpload['tmp_name'];
            $ext = substr($infos, 6);
            $this->setFileName(uniqid(). '.' .$ext);
            //$this->file_name = uniqid(). '.' .$ext; 
            $target = $this->route . $this->getFileName();

            move_uploaded_file($tmp_name, $target); 
        }
    }

    // function de réduction de l'image
    // $this->route : chemin fichier origine 
    // $routeDest : 'assets/img/formations/thumbnail/'
    public function reduceImage($routeDest) {
        $img = new \abeautifulsite\SimpleImage($this->route.$this->getFileName());
        $img->fit_to_width(300);
        $img->save();
        $img->thumbnail(100, 75);
        $img->save($routeDest . $this->fileName);         
    }
}