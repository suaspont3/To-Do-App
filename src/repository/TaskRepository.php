<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Task.php';

class TaskRepository extends Repository {
    public function addTask(int $userID, string $content) {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.tasks (user_id, content) VALUES (:userID, :content)
        ');
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function removeTask(int $taskID) {
        $stmt = $this->database->connect()->prepare('
            DELETE FROM public.tasks WHERE id = :taskID
        ');
        $stmt->bindParam(':taskID', $taskID, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getTasks(int $userID): ?array {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.tasks WHERE user_id = :userID
        ');
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();

        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($tasks) {
            foreach ($tasks as $task) {

                $output[] = new Task(
                    $task['id'],
                    $task['user_id'],
                    $task['content']
                );
            }
        }else{
            $output[] = new Task(
                null,
                null,
                "Here can be your task!"
            );
        }
        return $output;
    }
}