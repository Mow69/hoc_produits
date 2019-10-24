<?php

namespace App\Service;

class NewsletterService extends AbstractService
{
    public function insertEmail(string $email): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO newsletter (email) VALUES (:email)");
        $res = $stmt->execute(['email' => $email]);

        return $res;
    }
}
