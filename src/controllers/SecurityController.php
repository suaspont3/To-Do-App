<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../controllers/TaskController.php';

class SecurityController extends AppController {
    private $userRepository;
    private $taskController;

    public function __construct() {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->taskController = new TaskController();
    }

    public function login() {
        session_start();
        if ($_SESSION['isLoggedIn']) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/tasks");
        }

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $username = $_POST["username"];
        $password = $_POST['password'];

        if (!$username || !$password) {
            return $this->render('login', ['messages' => ['Please fill in blanks!']]);
        }

        $user = $this->userRepository->getUser('username', $username);
        if (!$user) {
            return $this->render('login', ['messages' => ['User with this username does not exist!']]);
        }

        $status = password_verify($password, $user->getPassword());
        if (!$status) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $_SESSION['id'] = $user->getId();
        $_SESSION['group_id'] = $user->getGroupId();
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['password'] = $user->getPassword();
        $_SESSION['isLoggedIn'] = true;

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/tasks");
    }

    public function signup() {
        session_start();
        if ($_SESSION['isLoggedIn']) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/tasks");
        }

        if (!$this->isPost()) {
            return $this->render('signup');
        }

        $group_id = $_POST['password'] === "admin" ? 1 : 2;
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (!$username || !$email || !$password) {
            return $this->render('signup', ['messages' => ['Please fill in blanks!']]);
        }

        $user = $this->userRepository->getUser('email', $email);
        if ($user) {
            return $this->render('signup', ['messages' => ['Given email already exists!']]);
        }

        $user = $this->userRepository->getUser('username', $username);
        if ($user) {
            return $this->render('signup', ['messages' => ['Given username already exists!']]);
        }

        $this->userRepository->setUser($group_id, $username, $email, $password);
        $this->render('login', ['messages' => ['You have registered successfully, please log in']]);
    }

    public function logout() {
        session_start();
        if (!$this->isPost()) {
            return $this->render('settings');
        }

        session_unset();
        unset($_SESSION['id']);
        unset($_SESSION['group_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['isLoggedIn']);
        session_destroy();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }
}