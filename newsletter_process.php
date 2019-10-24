<?php
require_once 'vendor/autoload.php';

use App\Service\NewsletterService;
use App\Session;
use App\Utils;

if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    // TODO: générer une notification d'erreur sur le format de l'adresse email
    Utils::redirect('index.php');
}

try {
    $newsletterService = new NewsletterService();
    $res = $newsletterService->insertEmail($_POST['email']);

    if (!$res) {
        throw new \Exception("Erreur lors de l'enregistrement de l'email");
    }
} catch (\Exception $ex) {
    // TODO: générer une notification d'erreur sur le service newsletter
    Utils::redirect('index.php');
}

var_dump($res);

$session = Session::getInstance();
$session->notifications = [
    'success' => [
        'Merci, votre email a bien été enregistré',
        'T bo'
    ],
    'info' => [
        'RGPD : Votre email ne sera pas divulgué pour de la publicité'
    ]
];

// rediriger vers la page d'accueil
Utils::redirect('index.php');
