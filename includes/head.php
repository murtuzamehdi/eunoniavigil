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
  <title><?= !empty($pageTitle) ? htmlspecialchars($pageTitle) : "Eunoia Vigil | 24/7 Remote Video Monitoring & CCTV Surveillance" ?></title>
  <meta name="description" content="<?= !empty($pageDesc) ? htmlspecialchars($pageDesc) : "Transform existing commercial CCTV cameras into a 24/7 monitored security operations center. Zero new hardware, live audio talk-down, and under 15-second emergency escalation." ?>">
  <meta name="keywords" content="24/7 remote video monitoring, live cctv surveillance, commercial security monitoring, video alarm verification, voice talkdown deterrence, existing camera integration, connectwise consulting inc">
  <meta name="robots" content="index, follow, max-image-preview:large">
  <link rel="canonical" href="<?= $requesMet . '://' . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost') . $_SERVER['REQUEST_URI'] ?>">
  
  <!-- Open Graph / Social Media Meta Tags -->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Eunoia Vigil">
  <meta property="og:title" content="<?= !empty($pageTitle) ? htmlspecialchars($pageTitle) : "Eunoia Vigil | 24/7 Remote Video Monitoring" ?>">
  <meta property="og:description" content="<?= !empty($pageDesc) ? htmlspecialchars($pageDesc) : "Active 24/7 human CCTV monitoring using the cameras you already have. No hardware replacement required." ?>">
  <meta property="og:image" content="<?= $requesMet . '://' . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost') ?>/assets/images/hero-soc.jpg">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= !empty($pageTitle) ? htmlspecialchars($pageTitle) : "Eunoia Vigil | 24/7 Remote CCTV Monitoring" ?>">
  <meta name="twitter:description" content="<?= !empty($pageDesc) ? htmlspecialchars($pageDesc) : "Active 24/7 human CCTV monitoring using the cameras you already have." ?>">
  <meta name="twitter:image" content="<?= $requesMet . '://' . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost') ?>/assets/images/hero-soc.jpg">

  <link rel="icon" type="image/png" href="assets/images/favicon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&family=Outfit:wght@600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css?v=<?= time() ?>">

  <!-- Schema.org Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "SecurityService",
    "name": "Eunoia Vigil",
    "legalName": "Connectwise Consulting Inc",
    "description": "Professional 24/7 remote video monitoring and live CCTV surveillance using existing commercial camera systems.",
    "telephone": "+1-844-246-9291",
    "email": "desk@eunoiavigil.com",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "25722 Kingsland Blvd Suite 114",
      "addressLocality": "Katy",
      "addressRegion": "TX",
      "postalCode": "77494",
      "addressCountry": "US"
    },
    "openingHoursSpecification": {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],
      "opens": "00:00",
      "closes": "23:59"
    },
    "priceRange": "$$"
  }
  </script>
