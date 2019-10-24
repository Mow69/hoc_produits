<?php

namespace App\Service;

class UserService extends AbstractService
{
    public function addUser(string $login, string $password): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO user (login, password, live) VALUES (:login, :password, :live)");
        $res = $stmt->execute(['login' => $login, 'password' => $password, 'live' => 1]);

        return $res;
    }
}
