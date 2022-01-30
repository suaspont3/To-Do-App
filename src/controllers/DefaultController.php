<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function index() {
        $this->render('frontpage');
    }

    public function login() {
        $this->render('login');
    }

    public function signup() {
        $this->render('signup');
    }
}