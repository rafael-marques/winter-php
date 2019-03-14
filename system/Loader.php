<?php

class Loader {

    public $db;
    public $lang;

    public function controller($Controller) {

        $ControllerFile = 'controllers/' . $Controller . 'Controller.php';

        if (file_exists($ControllerFile) && is_file($ControllerFile)) {
            require_once $ControllerFile;
            $Controller = $Controller . "Controller";
            $this->controller = new $Controller();
            $this->controller->index();
        } else {
            trigger_error("{$Controller} not found", E_USER_ERROR);
        }
    }

    public function view($View, $Data = false) {

        if (is_array($Data)) {
            extract($Data);
        }

        $ViewFile = 'views/themes/' . THEME . '/' . $View . '.php';
        if (file_exists($ViewFile) && is_file($ViewFile)) {
            require_once $ViewFile;
        } else {
            trigger_error("{$View} not found", E_USER_ERROR);
        }
    }

    public function model($path) {
        
        if(strstr($path, '/')){
            $split_path = explode('/', $path);
            $Model = end($split_path);
        }else{
            $Model = $path;
        }

        $ModelFile = 'models/' . $path . '.php';
        
        if (file_exists($ModelFile) && is_file($ModelFile)) {
            require_once $ModelFile;
            $this->db = new $Model();
        } else {
            trigger_error("{$ModelFile} not found", E_USER_ERROR);
        }
    }

    public function language($Language) {
        $LanguageFile = 'languages/' . DEFAULT_LANGUAGE . '/' . $Language . '.php';
        if (file_exists($LanguageFile) && is_file($LanguageFile)) {
            require_once $LanguageFile;
            foreach ($_ as $lang_param => $lang_value) {
                $this->$lang_param = $lang_value;
            }
        } else {
            trigger_error("{$LanguageFile} not found", E_USER_ERROR);
        }
    }

}
