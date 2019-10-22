<?php if (!empty($_SESSION['notifications'])) {
    foreach ($_SESSION['notifications'] as $type => $messages) {
        foreach ($messages as $msg) { ?>
            <div class="alert alert-<?php echo $type; ?>" role="alert">
                <?php echo $msg; ?>
            </div>
<?php }
    }
    $_SESSION['notifications'] = [];
} ?>