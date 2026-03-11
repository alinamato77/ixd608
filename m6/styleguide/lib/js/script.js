document.addEventListener('DOMContentLoaded', () => {
  // Scroll-spy for sidebar navigation
  const navLinks = document.querySelectorAll('[data-nav]');
  const sectionIds = Array.from(navLinks).map(a => a.getAttribute('href').slice(1));

  function updateActiveNav() {
    for (let i = sectionIds.length - 1; i >= 0; i--) {
      const el = document.getElementById(sectionIds[i]);
      if (el && el.getBoundingClientRect().top <= 120) {
        navLinks.forEach(a => a.classList.remove('active'));
        navLinks[i].classList.add('active');
        break;
      }
    }
  }
  window.addEventListener('scroll', updateActiveNav, true);

  // Checkbox toggles
  document.querySelectorAll('[data-checkbox]').forEach(row => {
    row.addEventListener('click', (e) => {
      e.preventDefault();
      const box = row.querySelector('.checkbox-box');
      box.classList.toggle('checked');
    });
  });

  // Toggle switches
  document.querySelectorAll('[data-toggle]').forEach(toggle => {
    toggle.addEventListener('click', () => {
      toggle.classList.toggle('on');
      toggle.classList.toggle('off');
    });
  });

  // Custom dropdown
  const trigger = document.getElementById('dropdownTrigger');
  const menu = document.getElementById('dropdownMenu');
  const textEl = document.getElementById('dropdownText');

  trigger.addEventListener('click', () => {
    const isOpen = menu.classList.toggle('open');
    trigger.classList.toggle('open', isOpen);
  });

  document.querySelectorAll('.dropdown-option').forEach(opt => {
    opt.addEventListener('click', () => {
      const val = opt.dataset.value;
      textEl.textContent = val;
      textEl.classList.remove('placeholder');
      textEl.classList.add('selected');
      menu.classList.remove('open');
      trigger.classList.remove('open');
      document.querySelectorAll('.dropdown-option').forEach(o => o.classList.remove('selected'));
      opt.classList.add('selected');
    });
  });

  // Close dropdown on outside click
  document.addEventListener('click', (e) => {
    if (!document.getElementById('customDropdown').contains(e.target)) {
      menu.classList.remove('open');
      trigger.classList.remove('open');
    }
  });

  // Sort pill selection
  document.querySelectorAll('.sort-pill').forEach(pill => {
    pill.addEventListener('click', () => {
      document.querySelectorAll('.sort-pill').forEach(p => p.classList.remove('active'));
      pill.classList.add('active');
    });
  });

  // Tab selection
  document.querySelectorAll('.tab').forEach(tab => {
    tab.addEventListener('click', () => {
      document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
    });
  });

  // Hotdog search bar
  const hotdogMenuBtn = document.getElementById('hotdogMenuBtn');
  const hotdogFilters = document.getElementById('hotdogFilters');
  const hotdogInput = document.getElementById('hotdogInput');
  const hotdogClear = document.getElementById('hotdogClear');

  hotdogMenuBtn.addEventListener('click', () => {
    hotdogFilters.style.display = hotdogFilters.style.display === 'none' ? 'flex' : 'none';
  });

  hotdogInput.addEventListener('input', () => {
    hotdogClear.style.display = hotdogInput.value ? 'flex' : 'none';
  });

  hotdogClear.addEventListener('click', () => {
    hotdogInput.value = '';
    hotdogClear.style.display = 'none';
  });
});