<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function index() {
        session_start();
        if ($_SESSION['isLoggedIn']) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/tasks");
        }
        $this->render('login');
    }

    public function settings() {
        $this->render('settings');
    }
}