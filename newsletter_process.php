<?php
session_start();
var_dump($_POST);

// TODO: insérer l'email en bdd

$req = $bdd->prepare('INSERT INTO newsletter(id, email, subscribed) VALUES(:id, :email, :subscribed)');
$req->execute(array(
    'id' => $id,
    'email' => $email,
    'subscribed' => $subscribed,

));

echo $_POST['email'];



// Enregistrer un message dans la session
// TODO: Vérifier que la clé notifications est bien vide
// Sinon, on va écraser toutes les notifications précédentes
// Donc globalement, on voudra ajouter une notification au tableau
// Mais vérifier qu'il est défini, et s'il ne l'est pas, le créer
if (array_key_exists('notifications', $_SESSION) and is_null('notifications', $_SESSION)) {
    $_SESSION['notifications'] = [
        'success' => [
            'Merci, votre email a bien été enregistré',
            'T bo'
        ],
        'info' => [
            'RGPD : Votre email ne sera pas divulgué pour de la publicité'
        ]
    ];
}



// rediriger vers la page d'accueil
// TODO: factoriser cette méthode dans une classe utilitaire
header('Location: index.php');
exit;
