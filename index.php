<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('tasks', 'TaskController');
Routing::post('login', 'SecurityController');
Routing::post('signup', 'SecurityController');
Routing::post('settings', 'SettingsController');
Routing::post('addTask', 'TaskController');
Routing::post('deleteTask', 'TaskController');
Routing::post('logout', 'SecurityController');


Routing::run($path);