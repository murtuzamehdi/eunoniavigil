<?php
$pageTitle = "Thank You | Request Received | Eunoia Vigil 24/7 CCTV Monitoring";
$pageDesc = "Your surveillance inquiry has been successfully received by the Eunoia Vigil Operations Center. Our watch specialists will contact you within 15 minutes.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('includes/head.php'); ?>
</head>
<body>

  <?php include('includes/header.php'); ?>

  <!-- Thank You Hero Section -->
  <section class="page-hero" style="padding: 7rem 0 5rem 0;">
    <div class="container reveal" style="max-width: 800px; text-align: center;">
      <div style="width: 72px; height: 72px; background: rgba(16, 185, 129, 0.15); border: 2px solid #10b981; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
        <svg width="36" height="36" fill="none" stroke="#10b981" stroke-width="2.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>
      </div>

      <span class="section-subtitle" style="color: #34d399;">Request Successfully Dispatched</span>
      <h1 class="page-hero-title" style="margin-bottom: 1.25rem;">
        Thank You! We've Received <br><span class="text-gradient">Your Monitoring Request.</span>
      </h1>
      <p class="page-hero-desc" style="margin: 0 auto 2.5rem auto; font-size: 1.15rem; line-height: 1.7;">
        Your submission has been routed directly to our 24/7 Operations Command Desk. A certified surveillance engineer is reviewing your camera setup right now.
      </p>

      <!-- Next Steps Card Grid -->
      <div class="grid-3 reveal-group" style="text-align: left; margin-bottom: 3rem; gap: 1.25rem;">
        <div class="feature-card" style="padding: 1.5rem;">
          <div style="font-size: 0.8rem; font-weight: 800; color: var(--accent-cyan); text-transform: uppercase; margin-bottom: 0.5rem;">Step 1</div>
          <h4 style="font-size: 1.05rem; margin-bottom: 0.5rem; color: #fff;">Stream & Spec Audit</h4>
          <p style="font-size: 0.85rem; color: var(--text-muted); margin: 0; line-height: 1.5;">
            Our engineers verify your existing NVR/DVR stream compatibility (Hikvision, Dahua, Axis, ONVIF) with zero hardware changes.
          </p>
        </div>

        <div class="feature-card" style="padding: 1.5rem;">
          <div style="font-size: 0.8rem; font-weight: 800; color: #10b981; text-transform: uppercase; margin-bottom: 0.5rem;">Step 2</div>
          <h4 style="font-size: 1.05rem; margin-bottom: 0.5rem; color: #fff;">15-Min Response</h4>
          <p style="font-size: 0.85rem; color: var(--text-muted); margin: 0; line-height: 1.5;">
            You will receive a direct callback or email with your transparent per-camera quote and custom response escalation protocol.
          </p>
        </div>

        <div class="feature-card" style="padding: 1.5rem;">
          <div style="font-size: 0.8rem; font-weight: 800; color: #f59e0b; text-transform: uppercase; margin-bottom: 0.5rem;">Step 3</div>
          <h4 style="font-size: 1.05rem; margin-bottom: 0.5rem; color: #fff;">Rapid Activation</h4>
          <p style="font-size: 0.85rem; color: var(--text-muted); margin: 0; line-height: 1.5;">
            Once approved, our Operations Center activates live monitoring and voice talk-down deterrence within 24 to 48 hours.
          </p>
        </div>
      </div>

      <!-- Immediate Assistance Alert Box -->
      <div class="reveal-scale pulse-glow" style="background: rgba(37, 99, 235, 0.12); border: 1px solid rgba(59, 130, 246, 0.35); border-radius: 12px; padding: 2rem; margin-bottom: 2.5rem; text-align: center;">
        <h3 style="font-size: 1.25rem; color: #fff; margin-bottom: 0.5rem;">Need Immediate Emergency Coverage?</h3>
        <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 1.25rem;">
          If your commercial property requires emergency after-hours coverage tonight, speak directly to our on-duty watch commander:
        </p>
        <a href="tel:8442469291" class="btn btn-primary btn-lg" style="font-size: 1.1rem; padding: 0.9rem 2.2rem; display: inline-flex; align-items: center; gap: 0.6rem;">
          <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
          Call Desk: (844) 246-9291
        </a>
      </div>

      <div class="reveal" style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
        <a href="/" class="btn btn-secondary">
          &larr; Return to Homepage
        </a>
        <a href="services/" class="btn btn-secondary">
          Explore Surveillance Protocols &rarr;
        </a>
      </div>

    </div>
  </section>

  <?php include('includes/footer.php'); ?>

</body>
</html>
