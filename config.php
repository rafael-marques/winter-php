<?php
//PATHS & DIRS
define('BASE', 'https://localhost/winterphp'); //Production BASE URL
define('THEME', 'default');
define('TEMPLATE_PATH', BASE.'/views/themes/'.THEME);
define('TEMPLATE_DIR', 'views/themes/'.THEME);
define('TWIG_CACHE_DIR', 'twig_cache');

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
define('DEFAULT_CONTROLLER', 'General\Home'.'Controller');
define('DEFAULT_ACTION', 'index');
define('DEFAULT_LANGUAGE', 'en-us');

define('CONTROLLER_NAMESPACE', '\Controller\\');
define('MODEL_NAMESPACE', '\Model\\');
