<?php

require_once 'vendor/autoload.php';


session_start();
// var_dump($_POST);

use App\Utils;

// TODO: insérer l'email en bdd
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=hoc_produits;charset=utf8",
        'hoc_produits',
        'hoc_produits'
    );
} catch (PDOException $ex) {
    Utils::redirect('index.php');
}

if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    Utils::redirect('index.php');
}

$stmt = $pdo->prepare('INSERT INTO newsletter(email) VALUES(:email)');

$stmt->execute(array(
    'email' => $$_POST,
));


$email = $_POST['email'];


////////////////////


// // Vérification du paramètre GET 'email'
// if (array_key_exists('email', $_GET)) {
//     $email = $_GET['email'];
// } else {
//     exit('Paramètre incorrect');
// }

// // Définition des paramètres de connexion en BDD
// $host = '127.0.0.1';
// $db   = 'hoc_produits';
// $user = 'hoc_produits';
// $pass = 'hoc_produits';
// $charset = 'utf8mb4';

// // définition du DSN : Data Source Name
// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// try {
//     // Construction d'un nouvel objet PDO
//     // Avec les coordonnées de la base de données
//     $pdo = new PDO($dsn, $user, $pass);
//     var_dump($pdo);
// } catch (\PDOException $e) {
//     // Gestion de l'exception possiblement lancée par le constructeur PDO
//     // de type PDOException
//     // ==> Affichage d'un message d'erreur au lieu d'avoir un bandeau orange généré par PHP
//     echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
// }


////////////////////



// // Enregistrer un message dans la session
// // TODO: Vérifier que la clé notifications est bien vide
// // Sinon, on va écraser toutes les notifications précédentes
// // Donc globalement, on voudra ajouter une notification au tableau
// // Mais vérifier qu'il est défini, et s'il ne l'est pas, le créer
// if (array_key_exists('notifications', $_SESSION) and is_null('notifications', $_SESSION)) {
//     $_SESSION['notifications'] = [
//         'success' => [
//             'Merci, votre email a bien été enregistré',
//             'T bo'
//         ],
//         'info' => [
//             'RGPD : Votre email ne sera pas divulgué pour de la publicité'
//         ]
//     ];
// }

// // rediriger vers la page d'accueil
// Utils::redirect('index.php');
