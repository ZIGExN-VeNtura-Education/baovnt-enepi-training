<?php
function viteAsset(string $entry) {
    if (file_exists(__DIR__ . '/../resources/css/app.css')) {
         echo '<script type="module" src="/resources/js/@vite/client"></script>';
         echo '<link rel="stylesheet" href="/resources/css/app.css">';
         echo '<script type="module" src="/' . $entry . '"></script>';
         return;
    }

    $manifestPath = __DIR__ . '/build/.vite/manifest.json';
    if (!file_exists($manifestPath)) {
        die('Vite manifest file not found. Run `npm run build`.' . $manifestPath);
    }

    $manifest = json_decode(file_get_contents($manifestPath), true);

    if (!isset($manifest[$entry])) {
        die("Entry '{$entry}' not found in Vite manifest.");
    }

    $file = $manifest[$entry]['file'];
    $css = $manifest[$entry]['css'] ?? [];
    $imports = $manifest[$entry]['imports'] ?? [];

    foreach ($css as $cssFile) {
        echo '<link rel="stylesheet" href="/build/' . $cssFile . '">';
    }

    foreach ($imports as $importFile) {
        echo '<script type="module" src="/build/' . $manifest[$importFile]['file'] . '"></script>';
    }
    echo '<script type="module" src="/build/' . $file . '"></script>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enepi Training Page</title>
    <?php viteAsset('resources/css/app.css'); ?>
</head>
<body>
    
</body>
</html>
