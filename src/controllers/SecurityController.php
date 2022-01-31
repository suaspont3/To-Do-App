<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {
    private $userRepository;

    public function __construct() {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login() {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $username = $_POST["username"];
        $password = md5($_POST["password"]);

        $user = $this->userRepository->getUserByUsername($username);

        if (!$user) {
            return $this->render('login', ['messages' => ['User with this username does not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/tasks");
    }

    public function signup() {
        if (!$this->isPost()) {
            return $this->render('signup');
        }

        $username = $_POST["username"];
        $password = md5($_POST["password"]);
        $email = $_POST["email"];

        $user = $this->userRepository->getUserByEmail($email);
        if ($user) {
            return $this->render('signup', ['messages' => ['Given email already exists!']]);
        }

        $user = $this->userRepository->getUserByUsername($username);
        if ($user) {
            return $this->render('signup', ['messages' => ['Given username already exists!']]);
        }

        $this->userRepository->setUser($username, $email, $password);

        $this->render('login', ['messages' => ['You have registered successfully, please log in']]);
//        $url = "http://$_SERVER[HTTP_HOST]";
//        header("Location: {$url}/login");
    }
}