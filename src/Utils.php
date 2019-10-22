<?php

namespace App;

class Utils
{
    private function __construct()
    { }

    static public function redirect(string $location)
    {
        // rediriger vers la page d'accueil
        // DONE: factoriser cette méthode dans une classe utilitaire
        header('Location: index.php');
        exit;
    }
}
