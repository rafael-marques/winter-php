<?php
session_start();

require_once 'vendor/autoload.php';
require_once 'config.php';

$App = new System\Application;
$App->startup();
