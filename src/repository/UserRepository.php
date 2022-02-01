<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository {
    public function getUser(string $attribute, string $value): ?User {
        $stmt = new PDOStatement();
        if ($attribute == 'username') {
            $stmt = $this->database->connect()->prepare('
                SELECT * FROM public.users WHERE username = :value
            ');
        } else {
            $stmt = $this->database->connect()->prepare('
                SELECT * FROM public.users WHERE email = :value
            ');
        }
        $stmt->bindParam(':value', $value, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user == false) {
            return null;
        }
        return new User(
            $user['id'],
            $user['username'],
            $user['email'],
            $user['password']
        );
    }

    public function setUser(string $username, string $email, string $password) {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users (username, email, password)
            VALUES (:username, :email, :password)
        ');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
    }
}