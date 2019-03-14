<?php

//PATHS & DIRS
define('BASE', 'https://localhost/winterphp'); //Production BASE URL
define('THEME', 'default');
define('TEMPLATE_PATH', BASE.'/views/themes/'.THEME);

//General Info
define('SYS_NAME', 'Winter PHP');

//Database
define('DBHOST', 'localhost');
define('DBNAME', 'winterphp');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBPORT', '3306');
define('DBPREF', 'wi');

// DB Tables
define('DB_USER', 'wi_user');

//Default Configs
define('DEFAULT_CONTROLLER', 'home'.'Controller');
define('DEFAULT_ACTION', 'index');
define('DEFAULT_LANGUAGE', 'en-us');

//System folder files
$ArrSys = ['Application', 'Controller', 'Loader', 'Template', 'Model', 'Url'];

foreach ($ArrSys as $file) {
    require_once 'system/'.$file.'.php';
}

//AutoLoader
spl_autoload_register(function ($Class) {
    if (file_exists('controllers/'.$Class.'.php') && is_file('controllers/'.$Class.'.php')):
        require 'controllers/'.$Class.'.php';
    else:
        trigger_error("Classe {$Class} não encontrada", E_USER_ERROR);
        die();
    endif;
});

function dd($value){
    var_dump($value);
    die;
}