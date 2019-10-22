<?php
session_start();
require_once 'data/produits.php';
require_once 'templates/header.php';
?>

<header>
    <?php
    require_once 'templates/navbar.php';
    require_once 'templates/notifications.php';
    ?>
    <?php
    foreach ($produits as $produit) {
        if ($produit["homepage"]) {
            ?>
            <?php require_once 'templates/produits/item-jumbotron.php'; ?>
    <?php
        }
    }
    ?>
</header>

<?php require_once 'templates/subscription_section.php';
require_once 'templates/footer.php'; ?>