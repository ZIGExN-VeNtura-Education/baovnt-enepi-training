<?php
function viteAsset(string $entry) {
    if (isset($_SERVER['HTTP_HOST']) && str_contains($_SERVER['HTTP_HOST'], 'localhost')) {
        if (str_ends_with($entry, '.js')) {
            echo '<script type="module" src="http://localhost:5173/' . $entry . '"></script>';
            return;
        }
        if (str_ends_with($entry, '.css')) {
            echo '<link rel="stylesheet" href="http://localhost:5173/' . $entry . '">';
            return;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enepi Training Page</title>
    <?php viteAsset('resources/css/app.css'); ?>
    <?php viteAsset('resources/js/app.js'); ?>
</head>
<body>
    <?php include __DIR__ . '/../resources/views/partials/header.php'; ?>
    <?php include __DIR__ . '/../resources/views/partials/banner.php'; ?>
    <?php include __DIR__ . '/../resources/views/main.php'; ?>
    <?php include __DIR__ . '/../resources/views/partials/privacy-modal.php'; ?>
</body>
</html>
