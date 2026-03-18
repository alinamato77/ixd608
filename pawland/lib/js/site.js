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
