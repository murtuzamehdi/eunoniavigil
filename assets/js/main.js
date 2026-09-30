/**
 * EUNOIA VIGIL 24/7 CCTV MONITORING - CORE JAVASCRIPT
 * Connectwise Consulting Inc
 */

document.addEventListener('DOMContentLoaded', () => {
  initMobileNav();
  initCctvClocks();
  initModals();
  initLiveChat();
  initPricingSwitcher();
  initCompatibilityChecker();
  initQuoteCalculator();
  initContactForms();
});

/* --- Mobile Navigation Drawer --- */
function initMobileNav() {
  const toggleBtn = document.querySelector('.mobile-toggle');
  const navMenu = document.querySelector('.nav-menu');

  if (toggleBtn && navMenu) {
    toggleBtn.addEventListener('click', () => {
      navMenu.classList.toggle('open');
      const isOpen = navMenu.classList.contains('open');
      toggleBtn.setAttribute('aria-expanded', isOpen);
    });

    // Close when clicking outside
    document.addEventListener('click', (e) => {
      if (!navMenu.contains(e.target) && !toggleBtn.contains(e.target) && navMenu.classList.contains('open')) {
        navMenu.classList.remove('open');
      }
    });
  }
}

/* --- Live CCTV Clocks on simulated camera feeds --- */
function initCctvClocks() {
  const timestampEls = document.querySelectorAll('.live-cctv-time');
  if (!timestampEls.length) return;

  function updateClock() {
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const day = String(now.getDate()).padStart(2, '0');
    const hours = String(now.getHours()).padStart(2, '0');
    const mins = String(now.getMinutes()).padStart(2, '0');
    const secs = String(now.getSeconds()).padStart(2, '0');

    const formatted = `${year}-${month}-${day} ${hours}:${mins}:${secs} EST`;
    timestampEls.forEach(el => {
      el.textContent = formatted;
    });
  }

  updateClock();
  setInterval(updateClock, 1000);
}

/* --- Modals Handling --- */
function initModals() {
  const assessmentTriggers = document.querySelectorAll('.open-assessment-modal');
  const quoteTriggers = document.querySelectorAll('.open-quote-modal');
  const chatTriggers = document.querySelectorAll('.open-chat-modal');
  const closeBtns = document.querySelectorAll('.modal-close-btn');
  const modalOverlays = document.querySelectorAll('.modal-overlay');

  const assessmentModal = document.getElementById('modal-assessment');
  const quoteModal = document.getElementById('modal-quote');
  const chatModal = document.getElementById('modal-chat');

  function openModal(modal) {
    if (!modal) return;
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeModal(modal) {
    if (!modal) return;
    modal.classList.remove('active');
    document.body.style.overflow = '';
  }

  assessmentTriggers.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      openModal(assessmentModal);
    });
  });

  quoteTriggers.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      openModal(quoteModal);
    });
  });

  chatTriggers.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      openModal(chatModal);
    });
  });

  closeBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const modal = btn.closest('.modal-overlay');
      closeModal(modal);
    });
  });

  modalOverlays.forEach(overlay => {
    overlay.addEventListener('click', (e) => {
      if (e.target === overlay) {
        closeModal(overlay);
      }
    });
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      modalOverlays.forEach(modal => closeModal(modal));
    }
  });
}

/* --- Pricing Switcher (Weekly vs Monthly) --- */
function initPricingSwitcher() {
  const switchBtns = document.querySelectorAll('.pricing-switch-btn');
  const priceAmounts = document.querySelectorAll('.price-amount');
  const pricePeriods = document.querySelectorAll('.price-period');

  if (!switchBtns.length) return;

  switchBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      switchBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const mode = btn.getAttribute('data-period'); //  monthly or weekly

      priceAmounts.forEach(el => {
        const val = el.getAttribute('data-' + mode);
        if (val) el.textContent = val;
      });

      pricePeriods.forEach(el => {
        el.textContent = mode === 'weekly' ? '/ week' : '/ month';
      });
    });
  });
}

/* --- Camera Compatibility Quick Checker --- */
function initCompatibilityChecker() {
  const brandPills = document.querySelectorAll('.brand-pill');
  const resultBox = document.getElementById('compatibility-result');
  const resultBrand = document.getElementById('comp-brand-name');
  const resultStatus = document.getElementById('comp-status-tag');
  const resultDesc = document.getElementById('comp-details-text');

  if (!brandPills.length || !resultBox) return;

  const brandData = {
    'hikvision': {
      name: 'Hikvision (IP & Turbo HD NVR/DVR)',
      status: '100% Compatible - Zero Hardware Needed',
      desc: 'Connects directly via secure RTSP / ONVIF stream or cloud gateway. Supports two-way audio and alarm input synchronization without replacing existing cameras.'
    },
    'dahua': {
      name: 'Dahua Technology (NVR, DVR & WizSense)',
      status: '100% Compatible - Direct Integration',
      desc: 'Seamless video streaming over RTSP / P2P secure bridge. Full integration with perimeter tripwire analytics and audio talk-down horns.'
    },
    'axis': {
      name: 'Axis Communications (Enterprise IP Feeds)',
      status: '100% Compatible - Enterprise Tier',
      desc: 'Direct IP stream connection with support for Axis Camera Station, Edge Analytics, and Axis Network Horn Speakers.'
    },
    'lorex': {
      name: 'Lorex / Flir Systems (Commercial NVRs)',
      status: '100% Compatible - Plug & Connect',
      desc: 'Works with standard Lorex 4K NVRs and DVR systems via ONVIF Profile S and RTSP port forwarding or VPN connector.'
    },
    'uniview': {
      name: 'Uniview (UNV Commercial Surveillance)',
      status: '100% Compatible - Instant Bridge',
      desc: 'Native RTSP and ONVIF stream integration. Instant operator feed verification with support for UNV active deterrence lights and sirens.'
    },
    'reolink': {
      name: 'Reolink (NVR & Standalone IP Cams)',
      status: '100% Compatible - No Box Required',
      desc: 'Supports all Reolink PoE and WiFi cameras with RTSP/ONVIF enabled. Operators can monitor live video around the clock.'
    },
    'ubiquiti': {
      name: 'Ubiquiti UniFi Protect',
      status: '100% Compatible - RTSP Bridge',
      desc: 'Connects effortlessly via UniFi Protect RTSP stream links. Clean HD feed routing directly to our secure Operations Center.'
    },
    'onvif': {
      name: 'Universal ONVIF / RTSP / Analog DVRs',
      status: '100% Compatible - Universal Support',
      desc: 'Over 98% of modern security cameras support ONVIF or RTSP streaming. Our engineers establish encrypted connections without altering your physical wiring.'
    }
  };

  brandPills.forEach(pill => {
    pill.addEventListener('click', () => {
      brandPills.forEach(p => p.classList.remove('selected'));
      pill.classList.add('selected');

      const brandKey = pill.getAttribute('data-brand');
      const data = brandData[brandKey] || brandData['onvif'];

      if (resultBrand) resultBrand.textContent = data.name;
      if (resultStatus) resultStatus.textContent = data.status;
      if (resultDesc) resultDesc.textContent = data.desc;

      resultBox.style.display = 'block';
    });
  });
}

/* --- Interactive Quote Calculator --- */
function initQuoteCalculator() {
  const cameraRange = document.getElementById('quote-camera-range');
  const cameraValText = document.getElementById('quote-camera-count');
  const tierSelect = document.getElementById('quote-tier-select');
  const talkdownCheck = document.getElementById('quote-talkdown-addon');
  const estimatedCost = document.getElementById('quote-estimated-val');
  const billingToggle = document.getElementById('quote-billing-freq');

  if (!cameraRange || !estimatedCost) return;

  function calculateQuote() {
    const cams = parseInt(cameraRange.value, 10);
    if (cameraValText) cameraValText.textContent = cams;

    const tier = tierSelect ? tierSelect.value : 'after-hours';
    const hasTalkdown = talkdownCheck ? talkdownCheck.checked : false;
    const isWeekly = billingToggle ? billingToggle.value === 'weekly' : false;

    // Base per camera per month
    let baseRate = 35; // After-hours standard
    if (tier === '24-7') baseRate = 65; // 24/7 continuous
    if (tier === 'perimeter') baseRate = 45; // Perimeter & weekend focus

    let cameraTotal = cams * baseRate;
    if (hasTalkdown) cameraTotal += (cams * 10);

    // Minimum site charge
    if (cameraTotal < 140) cameraTotal = 140;

    let rateStr = '';
    if (isWeekly) {
      const weekly = Math.round(cameraTotal / 4.33);
      rateStr = `$${weekly} / week`;
    } else {
      rateStr = `$${cameraTotal} / month`;
    }
    estimatedCost.textContent = rateStr;
    const hiddenRate = document.getElementById('quote-hidden-rate');
    if (hiddenRate) hiddenRate.value = rateStr;
  }

  cameraRange.addEventListener('input', calculateQuote);
  if (tierSelect) tierSelect.addEventListener('change', calculateQuote);
  if (talkdownCheck) talkdownCheck.addEventListener('change', calculateQuote);
  if (billingToggle) billingToggle.addEventListener('change', calculateQuote);

  calculateQuote();
}

/* --- Contact & Lead Form Submissions --- */
function initContactForms() {
  const forms = document.querySelectorAll('form[data-lead-form]');

  forms.forEach(form => {
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      
      const submitBtn = form.querySelector('button[type="submit"]');
      const originalText = submitBtn ? submitBtn.innerHTML : 'Submit';

      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span>Transmitting Lead Details...</span>';
      }

      const formData = new FormData(form);
      formData.append('is_ajax', '1');

      try {
        const response = await fetch(form.getAttribute('action') || 'send-mail.php', {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        });

        const data = await response.json();

        if (data && data.success) {
          showToast('Request Received! Our Operations Desk will contact you within 15 minutes.');
          form.reset();

          // Close active modal if any
          const activeModal = form.closest('.modal-overlay');
          if (activeModal) {
            activeModal.classList.remove('active');
            document.body.style.overflow = '';
          }

          // Smooth redirect to Thank You page
          setTimeout(() => {
            window.location.href = data.redirect || 'thank-you/';
          }, 1200);

        } else {
          // If server failed, fallback to native submission
          form.submit();
        }
      } catch (err) {
        // Fallback to standard HTTP POST submit if fetch fails
        form.submit();
      } finally {
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.innerHTML = originalText;
        }
      }
    });
  });
}

/* --- Toast Notification Helper --- */
function showToast(message) {
  let toast = document.querySelector('.toast-notification');
  if (!toast) {
    toast = document.createElement('div');
    toast.className = 'toast-notification';
    document.body.appendChild(toast);
  }

  toast.innerHTML = `
    <svg width="22" height="22" fill="none" stroke="#10b981" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
    </svg>
    <span>${message}</span>
  `;

  toast.classList.add('show');

  setTimeout(() => {
    toast.classList.remove('show');
  }, 4500);
}

/* --- Live Chat Interactive Engine --- */
function initLiveChat() {
  const chatMessages = document.getElementById('chat-messages');
  const chatInput = document.getElementById('chat-user-input');
  const chatSendBtn = document.getElementById('chat-send-btn');
  const chatChips = document.querySelectorAll('.chat-chip');

  if (!chatMessages) return;

  function appendMessage(sender, text) {
    const bubble = document.createElement('div');
    bubble.className = sender === 'user' ? 'chat-bubble chat-bubble-user' : 'chat-bubble chat-bubble-operator';
    bubble.innerHTML = text;
    chatMessages.appendChild(bubble);
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }

  function handleUserMessage(msgText) {
    if (!msgText.trim()) return;
    appendMessage('user', msgText);
    if (chatInput) chatInput.value = '';

    const lower = msgText.toLowerCase();

    setTimeout(() => {
      if (lower.includes('call') || lower.includes('phone') || lower.includes('speak') || lower.includes('operator') || lower.includes('number')) {
        appendMessage('operator', 'Our 24/7 Operations Command Desk is available right now at <strong><a href="tel:8442469291" style="color:#60a5fa; text-decoration:underline;">(844) 246-9291</a></strong>. You can call immediately or leave your phone number here for an instant callback!');
      } else if (lower.includes('camera') || lower.includes('compat') || lower.includes('hikvision') || lower.includes('dahua') || lower.includes('nvr') || lower.includes('dvr')) {
        appendMessage('operator', 'Over 98% of existing camera systems (Hikvision, Dahua, Axis, Lorex, Uniview, Reolink, ONVIF) connect seamlessly without buying new hardware. Would you like to schedule a free compatibility audit?');
      } else if (lower.includes('price') || lower.includes('cost') || lower.includes('quote') || lower.includes('rate') || lower.includes('month') || lower.includes('week')) {
        appendMessage('operator', 'Our monitoring rates start from <strong>$35/month</strong> (or $9/week) per camera for After-Hours coverage, and <strong>$65/month</strong> for 24/7 continuous surveillance with live two-way talkdown. How many cameras do you have on site?');
      } else {
        appendMessage('operator', 'Thank you for messaging our Operations Center. A certified watch officer is reviewing your note. Please provide your business name or phone number so we can assist you with your surveillance setup immediately!');
      }
    }, 700);
  }

  if (chatSendBtn && chatInput) {
    chatSendBtn.addEventListener('click', (e) => {
      e.preventDefault();
      handleUserMessage(chatInput.value);
    });

    chatInput.addEventListener('keydown', (e) => {
      if (e.key === 'Enter') {
        e.preventDefault();
        handleUserMessage(chatInput.value);
      }
    });
  }

  chatChips.forEach(chip => {
    chip.addEventListener('click', () => {
      const chipText = chip.getAttribute('data-msg') || chip.textContent;
      handleUserMessage(chipText);
    });
  });
}

