<?php
ob_start();
session_start();

$url = $_SERVER['REQUEST_URI'];

$current_url = explode('?', $url);
$url = $current_url[0];

// Normalize requested path by trimming slashes
$trimmed_url = trim($url, '/');

$dir = __DIR__ . '/views';

$files = array_slice(scandir($dir), 2); 
$fileWithOutExt = array();

foreach ($files as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
        $fileWithOutExt[] = pathinfo($file, PATHINFO_FILENAME);
    }
}

// Root requests (home)
if ($trimmed_url === '' || $trimmed_url === 'index' || $trimmed_url === 'index.php' || $trimmed_url === 'home') {
    require $dir . '/home.php';
    die();
}

// Route to corresponding view
if (in_array($trimmed_url, $fileWithOutExt)) {
    require $dir . '/' . $trimmed_url . '.php';
    die();
} else {
    http_response_code(404);
    require $dir . '/404.php';
    die();
}
?>
