<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository {
    public function getUserByUsername(string $username): ?User {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE username = :username
        ');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['username'],
            $user['email'],
            $user['password']
        );
    }

    public function getUserByEmail(string $email): ?User {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
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