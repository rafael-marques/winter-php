<?php
session_start();

require_once 'config.php';

$App = new Application;
$App->startup();