/* Kancelaria Sadlowicz - formularz kontaktowy + chatbot AI (OpenAI przez /chatbot.php).
   Skrypt sam wykrywa, czy na stronie jest formularz/chatbot - na innych stronach nic nie robi. */
(function () {
	'use strict';

	/* ============ FORMULARZ KONTAKTOWY ============ */
	var contactForm = document.getElementById('contactForm');

	function ensureModal() {
		var m = document.getElementById('successModal');
		if (m) { return m; }
		m = document.createElement('div');
		m.className = 'modal-overlay';
		m.id = 'successModal';
		m.setAttribute('aria-hidden', 'true');
		m.innerHTML =
			'<div class="modal-box">' +
			'<div class="modal-icon"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>' +
			'<h2>Wiadomość wysłana!</h2>' +
			'<p>Dziękuję za kontakt. Odpiszę w ciągu 24 godzin w dni robocze.<br>Jeśli sprawa jest pilna - zadzwoń na <a href="tel:+48790013287">+48 790 013 287</a>.</p>' +
			'<button class="btn-gold" id="modalClose">Zamknij</button>' +
			'</div>';
		document.body.appendChild(m);
		m.addEventListener('click', function (e) { if (e.target === m) { closeModal(); } });
		m.querySelector('#modalClose').addEventListener('click', closeModal);
		document.addEventListener('keydown', function (e) { if (e.key === 'Escape') { closeModal(); } });
		return m;
	}
	var modalTimer;
	function openModal() {
		var m = ensureModal();
		m.classList.add('visible');
		document.body.style.overflow = 'hidden';
		clearTimeout(modalTimer);
		modalTimer = setTimeout(closeModal, 7000);
	}
	function closeModal() {
		var m = document.getElementById('successModal');
		if (!m) { return; }
		clearTimeout(modalTimer);
		m.classList.remove('visible');
		document.body.style.overflow = '';
	}

	function clearFieldErrors(form) {
		form.querySelectorAll('.field-error').forEach(function (el) { el.remove(); });
		form.querySelectorAll('.has-error').forEach(function (el) { el.classList.remove('has-error'); });
	}
	function showFieldError(field, message) {
		field.classList.add('has-error');
		var err = document.createElement('span');
		err.className = 'field-error';
		err.textContent = message;
		var group = field.closest('.form-group');
		if (group) { group.appendChild(err); }
	}
	function validate(form) {
		clearFieldErrors(form);
		var first = null;
		var name = form.querySelector('#name');
		var email = form.querySelector('#email');
		var category = form.querySelector('#category');
		var message = form.querySelector('#message');
		var rodo = form.querySelector('input[name="rodo"]');

		if (name && !name.value.trim()) { showFieldError(name, 'Proszę podać imię i nazwisko.'); first = first || name; }
		if (email) {
			var ev = email.value.trim();
			if (!ev) { showFieldError(email, 'Proszę podać adres email.'); first = first || email; }
			else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(ev)) { showFieldError(email, 'Podaj prawidłowy adres email.'); first = first || email; }
		}
		if (category && !category.value) { showFieldError(category, 'Proszę wybrać kategorię sprawy.'); first = first || category; }
		if (message && !message.value.trim()) { showFieldError(message, 'Proszę opisać swoją sprawę.'); first = first || message; }
		if (rodo && !rodo.checked) {
			var g = rodo.closest('.form-group');
			if (g) {
				g.classList.add('has-error');
				var err = document.createElement('span');
				err.className = 'field-error';
				err.textContent = 'Zgoda na przetwarzanie danych osobowych jest wymagana.';
				g.appendChild(err);
			}
			first = first || rodo;
		}
		if (first) { first.scrollIntoView({ behavior: 'smooth', block: 'center' }); return false; }
		return true;
	}

	if (contactForm) {
		var formError = document.getElementById('formError');
		contactForm.addEventListener('submit', function (e) {
			e.preventDefault();
			if (!validate(contactForm)) { return; }

			var submitBtn = contactForm.querySelector('button[type="submit"]');
			var btnText = submitBtn.querySelector('.btn-text');
			var btnLoading = submitBtn.querySelector('.btn-loading');
			if (btnText) { btnText.style.display = 'none'; }
			if (btnLoading) { btnLoading.style.display = 'inline'; }
			submitBtn.disabled = true;
			if (formError) { formError.style.display = 'none'; }

			fetch(contactForm.getAttribute('action') || '/wyslij.php', {
				method: 'POST',
				body: new FormData(contactForm)
			}).then(function (r) { return r.json(); }).then(function (data) {
				if (data.ok) {
					contactForm.reset();
					clearFieldErrors(contactForm);
					openModal();
				} else if (formError) {
					formError.textContent = data.error || 'Wystąpił błąd. Spróbuj ponownie lub napisz bezpośrednio na adres email.';
					formError.style.display = 'block';
				}
			}).catch(function () {
				if (formError) {
					formError.innerHTML = 'Nie udało się wysłać wiadomości. Napisz bezpośrednio na: <a href="mailto:kamila.sadlowicz@kancelaria-sadlowicz.pl">kamila.sadlowicz@kancelaria-sadlowicz.pl</a>';
					formError.style.display = 'block';
				}
			}).finally(function () {
				if (btnText) { btnText.style.display = 'inline'; }
				if (btnLoading) { btnLoading.style.display = 'none'; }
				submitBtn.disabled = false;
			});
		});

		contactForm.querySelectorAll('input, textarea, select').forEach(function (field) {
			['input', 'change'].forEach(function (ev) {
				field.addEventListener(ev, function () {
					field.classList.remove('has-error');
					var g = field.closest('.form-group');
					if (g) {
						g.classList.remove('has-error');
						var err = g.querySelector('.field-error');
						if (err) { err.remove(); }
					}
				});
			});
		});
	}

	/* ============ CHATBOT AI ============ */
	var chatbotMessages = document.getElementById('chatbotMessages');
	var chatInput = document.getElementById('chatInput');
	var chatSendBtn = document.getElementById('chatSendBtn');
	var quickReplies = document.getElementById('quickReplies');

	if (!chatbotMessages || !chatInput || !chatSendBtn) { return; }

	var history = [];

	function addMessage(text, isUser) {
		var div = document.createElement('div');
		div.className = isUser ? 'message user-message' : 'message bot-message';
		var content = document.createElement('div');
		content.className = 'message-content';
		if (!isUser) {
			var av = document.createElement('div');
			av.className = 'message-avatar';
			av.textContent = '🤖';
			div.appendChild(av);
		}
		content.innerHTML = String(text)
			.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
			.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
			.replace(/\n/g, '<br>');
		div.appendChild(content);
		chatbotMessages.appendChild(div);
		chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
	}

	function showTyping() {
		var t = document.createElement('div');
		t.className = 'message bot-message typing-indicator';
		t.id = 'typingIndicator';
		t.innerHTML = '<div class="message-avatar">🤖</div><div class="message-content"><div class="typing-dots"><span></span><span></span><span></span></div></div>';
		chatbotMessages.appendChild(t);
		chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
	}
	function hideTyping() {
		var t = document.getElementById('typingIndicator');
		if (t) { t.remove(); }
	}

	function sendChat() {
		var msg = chatInput.value.trim();
		if (!msg) { return; }
		addMessage(msg, true);
		history.push({ role: 'user', content: msg });
		chatInput.value = '';
		chatSendBtn.disabled = true;
		if (quickReplies) { quickReplies.style.display = 'none'; }
		showTyping();

		fetch('/chatbot.php', {
			method: 'POST',
			headers: { 'Content-Type': 'application/json' },
			body: JSON.stringify({ messages: history.slice(-10) })
		}).then(function (r) { return r.json(); }).then(function (data) {
			hideTyping();
			if (data.reply) {
				addMessage(data.reply, false);
				history.push({ role: 'assistant', content: data.reply });
			} else {
				addMessage((data && data.error) || 'Przepraszam, wystąpił problem. Zadzwoń: +48 790 013 287', false);
			}
		}).catch(function () {
			hideTyping();
			addMessage('Brak połączenia z asystentem. Zadzwoń: +48 790 013 287', false);
		}).finally(function () {
			chatSendBtn.disabled = false;
		});
	}

	chatSendBtn.addEventListener('click', sendChat);
	chatInput.addEventListener('keypress', function (e) {
		if (e.key === 'Enter') { sendChat(); }
	});
	document.querySelectorAll('.quick-reply-btn').forEach(function (btn) {
		btn.addEventListener('click', function () {
			chatInput.value = btn.getAttribute('data-question') || btn.textContent.trim();
			sendChat();
		});
	});
})();
