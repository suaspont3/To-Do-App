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
        session_start();
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $username = $_POST["username"];
        $password = $_POST['password'];

        $user = $this->userRepository->getUser('username', $username);
        if (!$user) {
            return $this->render('login', ['messages' => ['User with this username does not exist!']]);
        }

        $status = password_verify($password, $user->getPassword());
        if (!$status) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $_SESSION['id'] = $user->getId();
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['password'] = $user->getPassword();
        $_SESSION['logged_in'] = true;

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/tasks");
    }

    public function signup() {
        if (!$this->isPost()) {
            return $this->render('signup');
        }

        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user = $this->userRepository->getUser('email', $email);
        if ($user) {
            return $this->render('signup', ['messages' => ['Given email already exists!']]);
        }

        $user = $this->userRepository->getUser('username', $username);
        if ($user) {
            return $this->render('signup', ['messages' => ['Given username already exists!']]);
        }

        $this->userRepository->setUser($username, $email, $password);
        $this->render('login', ['messages' => ['You have registered successfully, please log in']]);
    }
}