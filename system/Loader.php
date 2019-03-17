<?php

namespace System;

class Loader
{

    public $db;
    public $lang;

    public function controller($Controller)
    {
        $ControllerFile = 'controllers/' . $Controller . 'Controller.php';

        if (file_exists($ControllerFile) && is_file($ControllerFile)) {
            if (strstr($Controller, "/")) {
                $split_controller = explode("/", $Controller);
                $split_controller = array_map('ucfirst', $split_controller);
                $controller_name = ucfirst(array_pop($split_controller));
                $controller_path = implode("\\", $split_controller);
                $Controller = $controller_path.'\\'.$controller_name;
            } else {
                $Controller = ucfirst($Controller);
            }

            $Controller = CONTROLLER_NAMESPACE.$Controller . "Controller";
            $Controller = ucfirst($Controller);
            
            $this->controller = new $Controller();
            $this->controller->index();
        } else {
            trigger_error("Controller {$Controller} not found", E_USER_ERROR);
        }
    }

    public function view($View, $Data = false)
    {

        if (is_array($Data)) {
            extract($Data);
        }

        if (strstr($View, "/")) {
            $split_view = explode("/", $View);
            $view_name = array_pop($split_view);
            $view_path = implode("/", $split_view);
            $View = TEMPLATE_DIR . '/' . $view_path;

            $ViewFile = $View  . '/' . $view_name . '.twig';
        } else {
            $View = TEMPLATE_DIR . '/' . $View;
            $ViewFile = $View  . '.twig';
        }

        
        if (file_exists($ViewFile) && is_file($ViewFile)) {
            //require_once $ViewFile;
            $loader = new \Twig\Loader\FilesystemLoader($View);
            $twig = new \Twig\Environment($loader, [
                'cache' => TWIG_CACHE_DIR,
            ]);

            echo $twig->render($view_name . '.twig', $Data);
        } else {
            trigger_error("{$View} not found", E_USER_ERROR);
        }
    }

    public function model($path)
    {
        
        if (strstr($path, '/')) {
            $split_path = explode('/', $path);
            $Model = end($split_path);
        } else {
            $Model = $path;
        }

        $ModelFile = 'models/' . $path . '.php';
        
        if (file_exists($ModelFile) && is_file($ModelFile)) {
            require_once $ModelFile;
            $Model = MODEL_NAMESPACE.$Model;
            $this->db = new $Model();
        } else {
            trigger_error("{$ModelFile} not found", E_USER_ERROR);
        }
    }

    public function language($Language)
    {
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
