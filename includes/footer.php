  <!-- Mandatory Legal Compliance & Crime Prevention Disclaimer -->
  <div class="container" style="margin-top: 3.5rem;">
    <div class="compliance-disclaimer-box">
      <svg class="compliance-icon" width="22" height="22" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
      <div>
        <strong>Legal Operational Notice:</strong> VigilGuard remote video monitoring services provide an additional layer of human vigilance, proactive verification, and emergency alert escalation. Video monitoring services do not promise or guarantee that monitoring prevents crime, stops criminal acts from occurring, or guarantees police or emergency response times, which are subject to local municipal police policies and dispatch availability.
      </div>
    </div>
  </div>

  <!-- Site Footer -->
  <footer class="site-footer" style="margin-top: 5rem;">
    <div class="container footer-grid">
      <div class="footer-brand">
        <a href="/" class="brand-logo">
          <div class="brand-logo-icon">
            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
          </div>
          <div>Vigil<span>Guard</span></div>
        </a>
        <p>
          24/7 Security Monitoring using the cameras you already have. Technology watches. People respond.
        </p>
        <div style="font-size: 0.85rem; color: var(--text-dim);">
          SOC Operations: U.S. Nationwide Monitoring Hub<br>
          Emergency Desk: 24/7/365
        </div>
      </div>

      <div>
        <h4 class="footer-col-title">Navigation</h4>
        <ul class="footer-links-list">
          <li><a href="/" class="footer-link">Home</a></li>
          <li><a href="services/" class="footer-link">Service</a></li>
          <li><a href="clients/" class="footer-link">Our Clients</a></li>
          <li><a href="about/" class="footer-link">About Us</a></li>
          <li><a href="contact/" class="footer-link">Contact Us</a></li>
        </ul>
      </div>

      <div>
        <h4 class="footer-col-title">Featured Links</h4>
        <ul class="footer-links-list">
          <li><a href="#" class="footer-link open-assessment-modal">1. Free Camera Compatibility Assessment</a></li>
          <li><a href="#" class="footer-link open-quote-modal">2. Request a Monitoring Quote</a></li>
          <li><a href="services/#steps" class="footer-link">How It Works (5 Steps)</a></li>
          <li><a href="clients/#gas-stations" class="footer-link">Gas Station Monitoring</a></li>
          <li><a href="clients/#retail" class="footer-link">Retail Shrinkage Solutions</a></li>
        </ul>
      </div>

      <div>
        <h4 class="footer-col-title">Operations Center</h4>
        <div class="footer-contact-item">
          <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
          <span>Toll-Free: (800) 555-CCTV</span>
        </div>
        <div class="footer-contact-item">
          <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
          <span>desk@vigilguardcctv.com</span>
        </div>
        <div class="footer-contact-item">
          <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          <span>Active Shift: 24 Hours / 7 Days / 365 Days</span>
        </div>
      </div>
    </div>

    <div class="container footer-bottom">
      <div>&copy; <?= date('Y') ?> VigilGuard Remote Video Monitoring. All rights reserved.</div>
      <div>Cameras Alone Don't Stop Crime. Monitored Cameras Help Respond.</div>
    </div>
  </footer>

  <!-- MODAL 1: Free Camera Compatibility Assessment -->
  <div class="modal-overlay" id="modal-assessment" role="dialog" aria-modal="true">
    <div class="modal-content">
      <button class="modal-close-btn" aria-label="Close modal">&times;</button>
      <div class="badge badge-blue" style="margin-bottom: 0.75rem;">Instant Compatibility Verification</div>
      <h3 style="font-size: 1.6rem; margin-bottom: 0.5rem;">Get a Free Camera Compatibility Assessment</h3>
      <p style="color: var(--text-muted); font-size: 0.925rem; margin-bottom: 1.5rem;">
        Provide details on your existing system. Our engineers verify camera stream compatibility without any commitment.
      </p>

      <form data-lead-form>
        <div class="grid-2" style="gap: 1rem;">
          <div class="form-group">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" placeholder="Jane Smith" required>
          </div>
          <div class="form-group">
            <label class="form-label">Business Name</label>
            <input type="text" class="form-control" placeholder="Acme Retail Stores" required>
          </div>
        </div>

        <div class="grid-2" style="gap: 1rem;">
          <div class="form-group">
            <label class="form-label">Work Email</label>
            <input type="email" class="form-control" placeholder="jane@acme.com" required>
          </div>
          <div class="form-group">
            <label class="form-label">Direct Phone</label>
            <input type="tel" class="form-control" placeholder="(555) 234-5678" required>
          </div>
        </div>

        <div class="grid-2" style="gap: 1rem;">
          <div class="form-group">
            <label class="form-label">Current Camera Brand / System</label>
            <select class="form-control" required>
              <option value="">Select your existing brand...</option>
              <option value="Hikvision">Hikvision (IP / NVR)</option>
              <option value="Dahua">Dahua (NVR / WizSense)</option>
              <option value="Axis">Axis Communications</option>
              <option value="Lorex">Lorex Commercial</option>
              <option value="Uniview">Uniview (UNV)</option>
              <option value="Reolink">Reolink</option>
              <option value="Ubiquiti">Ubiquiti UniFi Protect</option>
              <option value="Other-ONVIF">Generic ONVIF / RTSP / Analog DVR</option>
              <option value="Not-Sure">I'm not sure (we'll check for you)</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Camera Count</label>
            <select class="form-control" required>
              <option value="1-4">1 to 4 Cameras</option>
              <option value="5-8" selected>5 to 8 Cameras</option>
              <option value="9-16">9 to 16 Cameras</option>
              <option value="17-32">17 to 32 Cameras</option>
              <option value="33+">33+ Cameras (Multi-Site)</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Facility Type</label>
          <select class="form-control">
            <option value="retail">Retail Store / Supermarket</option>
            <option value="gas-station">Gas Station / Convenience Store</option>
            <option value="warehouse">Warehouse / Logistics Yard</option>
            <option value="showroom">Commercial Showroom / Dealership</option>
            <option value="multi-site">Multi-Site Chain / Franchise</option>
            <option value="office">Commercial Building</option>
          </select>
        </div>

        <div class="form-group">
          <label class="form-label">Existing Setup Details (Optional)</label>
          <textarea class="form-control" placeholder="Mention if you already have an internet connection on site, audio speakers, or specific blind spots..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-full btn-lg" style="margin-top: 0.5rem;">
          Submit Compatibility Assessment &rarr;
        </button>
        <p style="font-size: 0.775rem; color: var(--text-dim); text-align: center; margin-top: 0.75rem;">
          No new cameras required. 100% free technical evaluation.
        </p>
      </form>
    </div>
  </div>

  <!-- MODAL 2: Request a Monitoring Quote -->
  <div class="modal-overlay" id="modal-quote" role="dialog" aria-modal="true">
    <div class="modal-content">
      <button class="modal-close-btn" aria-label="Close modal">&times;</button>
      <div class="badge badge-green" style="margin-bottom: 0.75rem;">Transparent Pricing</div>
      <h3 style="font-size: 1.6rem; margin-bottom: 0.5rem;">Request a Monitoring Quote</h3>
      <p style="color: var(--text-muted); font-size: 0.925rem; margin-bottom: 1.5rem;">
        Get an exact weekly or monthly estimate for monitoring your existing camera system.
      </p>

      <form data-lead-form>
        <div class="grid-2" style="gap: 1rem;">
          <div class="form-group">
            <label class="form-label">Contact Name</label>
            <input type="text" class="form-control" placeholder="Mark Davis" required>
          </div>
          <div class="form-group">
            <label class="form-label">Phone Number</label>
            <input type="tel" class="form-control" placeholder="(555) 345-6789" required>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Company Email</label>
          <input type="email" class="form-control" placeholder="mark@company.com" required>
        </div>

        <div class="grid-2" style="gap: 1rem;">
          <div class="form-group">
            <label class="form-label">Hours Required</label>
            <select class="form-control" required>
              <option value="after-hours">After-Hours & Weekends</option>
              <option value="24-7">24/7 Continuous Monitoring</option>
              <option value="custom">Custom Schedule</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Billing Cadence</label>
            <select class="form-control">
              <option value="monthly">Monthly Plan (Predictable)</option>
              <option value="weekly">Weekly Plan (Flexible)</option>
            </select>
          </div>
        </div>

        <div class="grid-2" style="gap: 1rem;">
          <div class="form-group">
            <label class="form-label">Number of Cameras</label>
            <input type="number" class="form-control" min="1" max="250" value="8" required>
          </div>
          <div class="form-group">
            <label class="form-label">Two-Way Voice Talk-Down?</label>
            <select class="form-control">
              <option value="yes">Include Live Talk-Down</option>
              <option value="no">Monitoring & Alert Only</option>
            </select>
          </div>
        </div>

        <button type="submit" class="btn btn-primary btn-full btn-lg" style="margin-top: 0.5rem;">
          Calculate & Send My Quote &rarr;
        </button>
        <p style="font-size: 0.775rem; color: var(--text-dim); text-align: center; margin-top: 0.75rem;">
          Transparent per-camera / per-site plans. No long-term lock-in.
        </p>
      </form>
    </div>
  </div>

  <!-- FLOATING LIVE CHAT BUTTON -->
  <button class="floating-chat-btn open-chat-modal" aria-label="Open 24/7 Live Chat">
    <span class="pulse-dot"></span>
    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
    <span>Live Chat</span>
  </button>

  <!-- MODAL: 24/7 Live Operations Desk Chat -->
  <div class="modal-overlay" id="modal-chat" role="dialog" aria-modal="true">
    <div class="modal-content" style="max-width: 520px; padding: 1.5rem;">
      <button class="modal-close-btn" aria-label="Close modal">&times;</button>
      <div class="chat-window">
        <div class="chat-header-bar">
          <div class="chat-agent-info">
            <div class="chat-agent-avatar">
              <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
              <span class="status-dot"></span>
            </div>
            <div>
              <div style="font-size: 1rem; font-weight: 700; color: var(--text-white);">SOC Watch Commander</div>
              <div style="font-size: 0.775rem; color: #34d399; display: flex; align-items: center; gap: 0.35rem;">
                <span class="pulse-dot" style="width: 6px; height: 6px;"></span>
                Online &bull; 24/7 Remote Monitoring Desk
              </div>
            </div>
          </div>
          <a href="tel:18005552288" class="btn btn-primary btn-sm" style="padding: 0.4rem 0.8rem; font-size: 0.8rem;">Call Us</a>
        </div>
        <div class="chat-messages-container" id="chat-messages">
          <div class="chat-bubble chat-bubble-operator">
            👋 <strong>Welcome to VigilGuard Operations Desk.</strong> I am actively monitoring live security feeds on shift. How can we assist you with your security cameras today?
          </div>
        </div>
        <div class="chat-chips-wrap">
          <button class="chat-chip" data-msg="Can I monitor my existing camera system?">🔍 Check My Cameras</button>
          <button class="chat-chip" data-msg="What are your weekly and monthly pricing plans?">💰 Pricing Plans</button>
          <button class="chat-chip" data-msg="I would like to speak with an operator now.">📞 Speak with Operator</button>
        </div>
        <div class="chat-input-box">
          <input type="text" id="chat-user-input" class="form-control" placeholder="Type a message or ask a question..." style="font-size: 0.875rem;">
          <button id="chat-send-btn" class="btn btn-primary" style="padding: 0.75rem 1.2rem;">
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
          </button>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/main.js?v=<?= time() ?>"></script>
