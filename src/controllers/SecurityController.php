<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{
    public function login()
    {
        $user = new User("tolik", "testakk11122@gmail.com", "admin");

        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($user->getUsername() !== $username) {
            return $this->render('login', ['messages' => ['User with this username does not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

//        TODO change main page
        return $this->render('tasks');
    }
}