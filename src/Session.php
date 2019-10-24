<?php

namespace App;

class Session
{
    private static $instance = null;

    private function __construct()
    {
        session_start();
    }

    public static function getInstance(): ?Session
    {
        if (self::$instance == null) {
            self::$instance = new Session();
        }

        return self::$instance;
    }

    public function __set(string $name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function __get(string $name)
    {
        // Equivalent :
        // return ($_SESSION[$name] != null) ? $_SESSION[$name] : null;
        return $_SESSION[$name] ?? null;
    }
}
