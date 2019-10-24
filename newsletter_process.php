<?php
require_once 'vendor/autoload.php';
session_start();

use App\Service\NewsletterService;
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

// TODO: générer notification selon réussite ou échec de la requête

// Enregistrer un message dans la session
// TODO: Vérifier que la clé notifications est bien vide
// Sinon, on va écraser toutes les notifications précédentes
// Donc globalement, on voudra ajouter une notification au tableau
// Mais vérifier qu'il est défini, et s'il ne l'est pas, le créer
// $_SESSION['notifications'] = [
//     'success' => [
//         'Merci, votre email a bien été enregistré',
//         'T bo'
//     ],
//     'info' => [
//         'RGPD : Votre email ne sera pas divulgué pour de la publicité'
//     ]
// ];

// rediriger vers la page d'accueil
//Utils::redirect('index.php');
