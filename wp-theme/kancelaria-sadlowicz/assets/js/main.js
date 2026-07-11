/* Kancelaria Sadlowicz - nawigacja, animacje, drobiazgi */
(function () {
	'use strict';

	// Navbar - cien po przewinieciu
	var navbar = document.getElementById('navbar');
	if (navbar) {
		window.addEventListener('scroll', function () {
			navbar.classList.toggle('scrolled', window.scrollY > 40);
		}, { passive: true });
	}

	// Menu mobilne
	var hamburger = document.getElementById('hamburger');
	var navMenu = document.getElementById('navMenu');
	if (hamburger && navMenu) {
		hamburger.addEventListener('click', function (e) {
			e.stopPropagation();
			hamburger.classList.toggle('open');
			navMenu.classList.toggle('open');
		});
		navMenu.querySelectorAll('a').forEach(function (a) {
			a.addEventListener('click', function () {
				hamburger.classList.remove('open');
				navMenu.classList.remove('open');
			});
		});
		document.addEventListener('click', function (e) {
			if (navMenu.classList.contains('open') && !navMenu.contains(e.target) && !hamburger.contains(e.target)) {
				hamburger.classList.remove('open');
				navMenu.classList.remove('open');
			}
		});
	}

	// Animacje wejscia (tylko gdy JS dziala - patrz klasa "js" na <html>)
	if ('IntersectionObserver' in window) {
		var observer = new IntersectionObserver(function (entries) {
			entries.forEach(function (en) {
				if (en.isIntersecting) {
					en.target.classList.add('visible');
					observer.unobserve(en.target);
				}
			});
		}, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
		document.querySelectorAll('.reveal').forEach(function (el) { observer.observe(el); });
	} else {
		document.querySelectorAll('.reveal').forEach(function (el) { el.classList.add('visible'); });
	}

	// Przycisk "do gory"
	var topBtn = document.querySelector('.scroll-to-top');
	if (topBtn) {
		window.addEventListener('scroll', function () {
			topBtn.classList.toggle('visible', window.pageYOffset > 400);
		}, { passive: true });
		topBtn.addEventListener('click', function () {
			window.scrollTo({ top: 0, behavior: 'smooth' });
		});
	}

	// Plynne przewijanie do kotwic
	document.querySelectorAll('a[href^="#"]').forEach(function (a) {
		a.addEventListener('click', function (e) {
			var href = a.getAttribute('href');
			if (href.length < 2) { return; }
			var target = document.querySelector(href);
			if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth' }); }
		});
	});
})();
