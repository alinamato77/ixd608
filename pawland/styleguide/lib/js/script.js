
		// Favorite button demo (standalone)
		const favDemo = document.getElementById('fav-demo');
		if (favDemo) {
			favDemo.addEventListener('click', function() {
				const isActive = this.classList.toggle('active');
				this.innerHTML = (isActive ? '<span class="heart icon">♥</span> Favorited' : '<span class="heart icon">♡</span> Add to Favorites');
			});
		}

		// Tag click — toggle active/resting (ignore clicks on the × remove button)
		document.querySelectorAll('.tag').forEach(tag => {
			tag.addEventListener('click', function(e) {
				if (!e.target.closest('.btn.remove')) {
					this.classList.toggle('active');
				}
			});
		});

		// Add to cart demo (standalone)
		const cartDemo = document.getElementById('cart-demo');
		if (cartDemo) {
			cartDemo.addEventListener('click', function() {
				if (!this.classList.contains('added')) {
					this.classList.add('added');
					this.textContent = '✓ Added to Cart';
					setTimeout(() => {
						this.classList.remove('added');
						this.textContent = '🛒 Add to Cart';
					}, 2500);
				}
			});
		}

		// Pet card favorite buttons
		document.querySelectorAll('.pet.fav[data-fav]').forEach(btn => {
			btn.addEventListener('click', function() {
				const isActive = this.classList.toggle('active');
				this.textContent = isActive ? '♥' : '♡';
			});
		});

		// Pet card add-to-cart buttons
		document.querySelectorAll('.btn.pet.add.cart[data-cart]').forEach(btn => {
			btn.addEventListener('click', function() {
				if (!this.classList.contains('added')) {
					this.classList.add('added');
					this.textContent = '✓ Added';
					setTimeout(() => {
						this.classList.remove('added');
						this.textContent = '🛒 Add to Cart';
					}, 2500);
				}
			});
		});

		// Filter chips toggle
		document.querySelectorAll('.filter.chip').forEach(chip => {
			chip.addEventListener('click', function() {
				this.classList.toggle('active');
			});
		});

		// Search clear button
		const searchBasic = document.getElementById('search-basic');
		const clearBasic = document.getElementById('clear-basic');
		if (searchBasic && clearBasic) {
			clearBasic.addEventListener('click', () => { searchBasic.value = ''; searchBasic.focus(); });
		}

		// Range slider label
		const priceRange = document.getElementById('price-range');
		const priceLabel = document.getElementById('price-label');
		if (priceRange && priceLabel) {
			priceRange.addEventListener('input', () => { priceLabel.textContent = '$' + priceRange.value; });
		}

		// Removable tags
		document.querySelectorAll('.btn.remove').forEach(btn => {
			btn.addEventListener('click', () => btn.closest('.tag').remove());
		});

// Foldable card sections (checkout.php — small screen)
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.card-fold-toggle').forEach(btn => {
    btn.addEventListener('click', () => {
      const card = btn.closest('[data-foldable]');
      if (!card) return;
      const folded = card.classList.toggle('is-folded');
      btn.setAttribute('aria-expanded', String(!folded));
    });
  });
});

// Brand carousel (small-screen auto-play)
document.addEventListener('DOMContentLoaded', () => {
  const track = document.getElementById('brand-carousel');
  if (!track) return;

  const mq = window.matchMedia('(max-width: 800px)');
  let timer = null;
  let index = 0;
  let cloned = false;

  function step() {
    const slides = track.children;
    if (!cloned) {
      track.appendChild(slides[0].cloneNode(true));
      cloned = true;
    }
    const slide = track.children[0];
    const slideWidth = slide.getBoundingClientRect().width;
    const gap = parseFloat(getComputedStyle(track).gap) || 0;
    const stepPx = slideWidth + gap;

    index++;
    track.style.transition = 'transform 0.5s ease';
    track.style.transform = `translateX(-${index * stepPx}px)`;

    if (index === track.children.length - 1) {
      setTimeout(() => {
        track.style.transition = 'none';
        track.style.transform = 'translateX(0)';
        index = 0;
      }, 520);
    }
  }

  function start() {
    if (timer) return;
    timer = setInterval(step, 3000);
  }
  function stop() {
    if (!timer) return;
    clearInterval(timer);
    timer = null;
    track.style.transition = 'none';
    track.style.transform = 'translateX(0)';
    index = 0;
  }

  if (mq.matches) start();
  mq.addEventListener('change', e => (e.matches ? start() : stop()));
});

// Header search + nav toggles (mobile)
document.addEventListener('DOMContentLoaded', () => {
  // Magnifying glass icon ↔ search bar
  const searchToggle = document.getElementById('header-search-toggle');
  const searchWrap = document.getElementById('header-search-wrap');
  if (searchToggle && searchWrap) {
    searchToggle.addEventListener('click', () => {
      const isOpen = searchWrap.classList.toggle('is-open');
      searchToggle.setAttribute('aria-expanded', String(isOpen));
      if (isOpen) {
        const input = searchWrap.querySelector('input[type="search"]');
        if (input) setTimeout(() => input.focus(), 60);
      }
    });
  }

  // Hamburger ↔ nav menu
  const navToggle = document.getElementById('header-nav-toggle');
  const navList = document.getElementById('header-nav-list');
  if (navToggle && navList) {
    navToggle.addEventListener('click', () => {
      const isOpen = navList.classList.toggle('is-open');
      navToggle.setAttribute('aria-expanded', String(isOpen));
    });
  }
});

// hotdog //
document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.getElementById('hotdog-toggle');
  const filters = document.getElementById('hotdog-filters');
  const input = document.getElementById('hotdog-input');
  const clear = document.getElementById('hotdog-clear');

  if (toggle && filters) {
    toggle.addEventListener('click', () => {
      const isOpen = filters.classList.toggle('is-open');
      toggle.classList.toggle('is-active', isOpen);
      toggle.setAttribute('aria-expanded', String(isOpen));

      if (isOpen && input) {
        window.setTimeout(() => input.focus(), 60);
      }
    });
  }

  if (clear && input) {
    clear.addEventListener('click', () => {
      input.value = '';
      input.focus();
    });
  }

});

/* footer */
  const siteSearchInput = document.getElementById('site-search-input');
  const siteSearchClear = document.getElementById('site-search-clear');
  if (siteSearchInput && siteSearchClear) {
    siteSearchClear.addEventListener('click', () => {
      siteSearchInput.value = '';
      siteSearchInput.focus();
    });
  }

  document.addEventListener('DOMContentLoaded', function () {

	// ─── Site search clear button ───────────────────────────────────────────────
	const siteSearchInput = document.getElementById('site-search-input');
	const siteSearchClear = document.getElementById('site-search-clear');
	if (siteSearchInput && siteSearchClear) {
		siteSearchClear.addEventListener('click', function () {
			siteSearchInput.value = '';
			siteSearchInput.focus();
		});
	}

	// ─── Buy box toggle (product.php) ───────────────────────────────────────────
	const optionSubscribe = document.getElementById('option-subscribe');
	const optionOnetime   = document.getElementById('option-onetime');
	const freqSelect      = document.getElementById('frequency-select');
	if (optionSubscribe && optionOnetime) {
		document.querySelectorAll('.buy.box.option').forEach(function (option) {
			option.addEventListener('click', function () {
				document.querySelectorAll('.buy.box.option').forEach(function (o) {
					o.classList.remove('selected');
				});
				this.classList.add('selected');
				const isSubscribe = this.id === 'option-subscribe';
				if (freqSelect) freqSelect.style.display = isSubscribe ? '' : 'none';
			});
		});
	}

	// ─── Cart: qty steppers + remove item (cart.php) ────────────────────────────
	document.querySelectorAll('.qty.stepper').forEach(function (stepper) {
		const display = stepper.querySelector('span');
		stepper.querySelectorAll('button').forEach(function (btn, i) {
			btn.addEventListener('click', function () {
				let val = parseInt(display.textContent);
				if (i === 0 && val > 1) val--;
				if (i === 1) val++;
				display.textContent = val;
			});
		});
	});

	document.querySelectorAll('.cart.item.remove').forEach(function (btn) {
		btn.addEventListener('click', function () {
			btn.closest('.cart.item').remove();
		});
	});

	// ─── Payment method toggle (checkout.php) ───────────────────────────────────
	document.querySelectorAll('.payment.method.option').forEach(function (option) {
		option.addEventListener('click', function () {
			document.querySelectorAll('.payment.method.option').forEach(function (o) {
				o.classList.remove('selected');
			});
			this.classList.add('selected');
			const cardFields = document.getElementById('card-fields');
			if (cardFields) {
				cardFields.style.display = this.id === 'pm-card' ? '' : 'none';
			}
		});
	});

});

