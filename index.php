<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('settings', 'DefaultController');
Routing::get('tasks', 'TaskController');
Routing::post('addTask', 'TaskController');
Routing::post('deleteTask', 'TaskController');
Routing::post('login', 'SecurityController');
Routing::post('signup', 'SecurityController');


Routing::run($path);