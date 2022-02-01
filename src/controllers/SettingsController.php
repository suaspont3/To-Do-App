<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SettingsController extends AppController {
    private $userRepository;

    public function __construct() {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function settings() {
        session_start();
        if (!$this->isPost()) {
            return $this->render('settings');
        }

        $id = $_SESSION['id'];
        $isAnyChange = false;

        $username = $_POST['username'];
        if ($username) {
            $this->userRepository->modifyUser('username', $username, $id);
            $isAnyChange = true;
        }

        $email = $_POST['email'];
        if ($email) {
            $this->userRepository->modifyUser('email', $email, $id);
            $isAnyChange = true;
        }

        $oldPassword = $_POST['password-old'];
        $newPassword = $_POST['password-new'];
        if ($oldPassword && $newPassword) {
            $user = $this->userRepository->getUser('username', $_SESSION['username']);
            if (password_verify($oldPassword, $user->getPassword())) {
                $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $this->userRepository->modifyUser('password', $newPassword, $id);
                $isAnyChange = true;
            }
            $this->render('settings', ['messages' => ['You have entered wrong password']]);
        }

        if ($isAnyChange) {
            $this->render('settings', ['messages' => ['Your data has been updated.']]);
        } else {
            $this->render('settings', ['messages' => ['Please fill in blanks']]);
        }
    }
}