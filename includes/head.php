<?php 
require_once(__DIR__ . "/token.php");
if ((isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] === 'on' || $_SERVER['HTTPS'] === 1)) || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')) {
    $requesMet = "https";
} else {
    $requesMet = "http";
}
?>

  <base href="<?= $requesMet . '://' . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost') . '/' ?>">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= !empty($pageTitle) ? htmlspecialchars($pageTitle) : "Eunoia Vigil | 24/7 Remote CCTV Video Monitoring Using Your Existing Cameras" ?></title>
  <meta name="description" content="<?= !empty($pageDesc) ? htmlspecialchars($pageDesc) : "Cameras alone don't stop crime. Transform your existing CCTV cameras into an active 24/7 monitored security operations center with Eunoia Vigil. No new hardware, no installation required." ?>">
  <link rel="icon" type="image/png" href="assets/images/favicon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&family=Outfit:wght@600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css?v=<?= time() ?>">
