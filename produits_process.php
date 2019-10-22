<?php

$req = $bdd->prepare('INSERT INTO produit(id, reference, produit_image, description, prix_ht, homepage, nom) VALUES(:id, :reference, :produit_image, :description, :prix_ht, :homepage, :nom)');
$req->execute(array(
    'id' => $id,
    'reference' => $reference,
    'produit_image' => $produit_image,
    'description' => $description,
    'prix_ht' => $prix_ht,
    'homepage' => $homepage,
    'nom' => $nom
));
