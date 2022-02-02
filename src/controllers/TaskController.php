<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Task.php';
require_once __DIR__.'/../repository/TaskRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class TaskController extends AppController {
    private $taskRepository;
    private $userRepository;

    public function __construct() {
        parent::__construct();
        $this->taskRepository = new TaskRepository();
        $this->userRepository = new UserRepository();
    }

    public function adminPanel() {
        session_start();
        if (!$_SESSION['isLoggedIn']) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}");
        }

        if ($_SESSION['group_id'] == 1) {
            $users = $this->userRepository->getUsers(2);
            $this->render('adminPanel', ['users' => $users]);
        } else {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/tasks");
        }
    }

    public function tasks() {
        session_start();
        if (!$_SESSION['isLoggedIn']) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}");
        }

        $userID = $_SESSION['id'];
        $tasks = $this->taskRepository->getTasks($userID);
        if (!$tasks) {
            $this->render('tasks', ['tasks' => ['You don\'t have anything to do']]);
        }
        $this->render('tasks', ['tasks' => $tasks]);
    }

    public function addTask() {
        session_start();
        if (!$_SESSION['isLoggedIn']) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}");
        }

        if (!$this->isPost()) {
            return $this->render('addTask');
        }

        $userID = $_SESSION['id'];
        $content = strval($_POST['content']);

        if ($content == '') {
            return $this->render('addTask', ['messages' => ['Enter something that you want to do']]);
        }

        $this->taskRepository->addTask($userID, $content);
        $this->render('addTask', ['messages' => ['Task has been added to your to-do list!']]);
    }

    public function deleteTask() {
        session_start();
        if (!$_SESSION['isLoggedIn']) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}");
        }

        if(!$this->isPost()) {
            return $this->render('tasks');
        }

        $userID = $_SESSION['id'];
        $tasks = $this->taskRepository->getTasks($userID);
        foreach ($tasks as $task) {
            $taskId = $task->getId();
            if (isset($_POST[$taskId])) {
                $this->taskRepository->removeTask($taskId);
            }
        }

        $tasks = $this->taskRepository->getTasks($userID);
        $this->render('tasks', ['tasks' => $tasks]);
    }
}