<?php

namespace App\Service;

class NewsletterService extends AbstractService
{
    public function insertEmail(string $email): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO newsletter (email, subscribed) VALUES (:email, :subscribed)");
        $res = $stmt->execute(['email' => $email, 'subscribed' => 1]);

        return $res;
    }
}
