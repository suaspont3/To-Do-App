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
//        User configuration backup
        $oldUser = $this->userRepository->getUser('id', $id);
        $isAnyChange = false;

        $username = $_POST['username'];
        if ($username) {
//            Searching for users with the same username
            $user = $this->userRepository->getUser('username', $username);
            if (!$user) {
                $this->userRepository->modifyUser('username', $username, $id);
                $isAnyChange = true;
            } else {
                $this->render('settings', ['messages' => ['User '.$username.' already exists!']]);
            }
        }

        $email = $_POST['email'];
        if ($email) {
//            Searching for users with the same email
            $user = $this->userRepository->getUser('email', $email);
            if (!$user) {
                $this->userRepository->modifyUser('email', $email, $id);
                $isAnyChange = true;
            } else {
                $this->render('settings', ['messages' => ['Email '.$email.' already exists!']]);
            }
        }

        $oldPassword = $_POST['password-old'];
        $newPassword = $_POST['password-new'];
        if ($oldPassword && $newPassword) {
            if (password_verify($oldPassword, $oldUser->getPassword())) {
                $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $this->userRepository->modifyUser('password', $newPassword, $id);
                $isAnyChange = true;
            } else {
                $this->render('settings', ['messages' => ['You have entered wrong password']]);
            }
        }

        if ($isAnyChange) {
            $this->render('settings', ['messages' => ['Your data has been updated.']]);
        } else {
            $this->render('settings', ['messages' => ['Please fill in blanks']]);
        }
    }
}