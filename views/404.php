<?php
$pageTitle = "404 - Feed Signal Lost | Eunoia Vigil 24/7 CCTV Monitoring";
$pageDesc = "The requested surveillance feed or page could not be located on the operations center server.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('includes/head.php'); ?>
</head>
<body>

  <?php include('includes/header.php'); ?>

  <!-- 404 Error Section -->
  <section class="page-hero" style="min-height: 65vh; display: flex; align-items: center; justify-content: center; text-align: center;">
    <div class="container" style="max-width: 680px;">
      <div class="badge badge-amber" style="margin-bottom: 1.25rem;">
        <span class="pulse-dot" style="background: #f59e0b;"></span>
        Stream Disconnected &bull; Error 404
      </div>
      <h1 class="page-hero-title" style="font-size: 3.5rem; margin-bottom: 1rem;">
        Feed Signal <span class="text-gradient">Lost</span>
      </h1>
      <p class="page-hero-desc" style="font-size: 1.15rem; margin-bottom: 2rem;">
        The surveillance feed or page you requested does not exist or has been relocated to another sector.
      </p>

      <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
        <a href="/" class="btn btn-primary btn-lg">
          <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
          Return to Operations Feed
        </a>
        <a href="contact/" class="btn btn-secondary btn-lg">
          <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
          Contact 24/7 Desk
        </a>
      </div>
    </div>
  </section>

  <?php include('includes/footer.php'); ?>

</body>
</html>
