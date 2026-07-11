<?php
/**
 * Title: Strona: Kontakt (cala tresc)
 * Slug: kancelaria-sadlowicz/strona-kontakt
 * Categories: kancelaria
 * Description: Hero, formularz kontaktowy + chatbot AI, inne sposoby kontaktu, mini FAQ, CTA.
 */
$u = function ( $path ) { return esc_url( home_url( $path ) ); };
?>
<!-- wp:group {"tagName":"section","className":"page-hero"} -->
<section class="wp-block-group page-hero"><!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:paragraph {"className":"page-hero-eyebrow-text"} -->
<p class="page-hero-eyebrow-text">Kancelaria Adwokacka · Warszawa</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"className":"page-hero-title"} -->
<h1 class="wp-block-heading page-hero-title">Jak mogę Ci <em>pomóc?</em></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"page-hero-desc"} -->
<p class="page-hero-desc">Wypełnij formularz kontaktowy lub porozmawiaj z AI asystentem. Odpowiadam w ciągu 24 godzin w dni robocze.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"page-hero-actions"} -->
<div class="wp-block-buttons page-hero-actions"><!-- wp:button {"className":"is-style-ks-gold"} -->
<div class="wp-block-button is-style-ks-gold"><a class="wp-block-button__link wp-element-button" href="#contactForm">Napisz do mnie</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-ks-ghost"} -->
<div class="wp-block-button is-style-ks-ghost"><a class="wp-block-button__link wp-element-button" href="tel:+48790013287">+48 790 013 287</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"contact-split"} -->
<section class="wp-block-group contact-split"><!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:group {"className":"contact-grid"} -->
<div class="wp-block-group contact-grid"><!-- wp:html -->
<div class="contact-form-wrapper">
	<div class="form-header">
		<h2>📋 Formularz Kontaktowy</h2>
		<p>Opisz swoją sprawę, a skontaktuję się z Tobą najszybciej jak to możliwe</p>
	</div>
	<form action="/wyslij.php" method="POST" class="contact-form" id="contactForm" novalidate>
		<div class="form-group">
			<label for="name">Imię i Nazwisko *</label>
			<input type="text" id="name" name="name" placeholder="np. Jan Kowalski" required>
		</div>
		<div class="form-group">
			<label for="email">Adres Email *</label>
			<input type="email" id="email" name="email" placeholder="jan.kowalski@example.com" required>
		</div>
		<div class="form-group">
			<label for="phone">Telefon kontaktowy</label>
			<input type="tel" id="phone" name="phone" placeholder="+48 123 456 789">
		</div>
		<div class="form-group">
			<label for="category">Kategoria Sprawy *</label>
			<select id="category" name="category" required>
				<option value="">-- Wybierz kategorię --</option>
				<option value="prawo-rodzinne">Prawo rodzinne (rozwód, alimenty, kontakty z dziećmi)</option>
				<option value="prawo-spadkowe">Prawo spadkowe (spadki, testamenty, zachowek)</option>
				<option value="prawo-cywilne">Prawo cywilne (umowy, odszkodowania, spory sąsiedzkie)</option>
				<option value="windykacja">Windykacja należności (długi, egzekucja komornicza)</option>
				<option value="prawo-pracy">Prawo pracy (wypowiedzenia, mobbing, wynagrodzenia)</option>
				<option value="prawo-karne">Prawo karne (reprezentacja w sprawie karnej)</option>
				<option value="inne">Inna sprawa</option>
			</select>
		</div>
		<div class="form-group">
			<label for="urgency">Pilność Sprawy</label>
			<select id="urgency" name="urgency">
				<option value="standard">Standardowa (odpowiedź w ciągu 24-48h)</option>
				<option value="urgent">Pilna (potrzebuję pomocy w ciągu kilku dni)</option>
				<option value="very-urgent">Bardzo pilna (sprawa na termin)</option>
			</select>
		</div>
		<div class="form-group">
			<label for="message">Opis Sprawy *</label>
			<textarea id="message" name="message" rows="6" placeholder="Opisz pokrótce swoją sytuację prawną. Im więcej szczegółów, tym lepiej będę mogła ocenić Twoją sprawę..." required></textarea>
			<small class="form-hint">💡 Wskazówka: Podaj daty, kwoty, strony zaangażowane w sprawę</small>
		</div>
		<div class="form-group checkbox-group">
			<label class="checkbox-label">
				<input type="checkbox" name="rodo" required>
				<span>Wyrażam zgodę na przetwarzanie moich danych osobowych zgodnie z <a href="<?php echo $u( '/polityka-prywatnosci/' ); ?>" target="_blank">Polityką Prywatności</a> (RODO) *</span>
			</label>
		</div>
		<div class="form-group checkbox-group">
			<label class="checkbox-label">
				<input type="checkbox" name="marketing">
				<span>Chcę otrzymywać newsletter z aktualnościami prawnymi</span>
			</label>
		</div>
		<div class="form-hp" aria-hidden="true">
			<label for="website">Adres strony www</label>
			<input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
		</div>
		<button type="submit" class="btn-large">
			<span class="btn-text">Wyślij zapytanie</span>
			<span class="btn-loading" style="display:none;">Wysyłanie...</span>
		</button>
		<div class="form-message form-error" id="formError" style="display:none;"></div>
	</form>
</div>
<!-- /wp:html -->

<!-- wp:html -->
<div class="chatbot-wrapper">
	<div class="chatbot-header">
		<div class="chatbot-avatar"><span>🤖</span></div>
		<div class="chatbot-title">
			<h3>AI Asystent</h3>
			<p class="chatbot-status"><span class="status-dot"></span> Online</p>
		</div>
	</div>
	<div class="chatbot-messages" id="chatbotMessages">
		<div class="message bot-message">
			<div class="message-avatar">🤖</div>
			<div class="message-content">
				<p>Cześć! Jestem AI asystentem kancelarii adwokat Kamili Sadłowicz.</p>
				<p>Mogę odpowiedzieć na podstawowe pytania dotyczące:</p>
				<ul>
					<li>Specjalizacji kancelarii</li>
					<li>Orientacyjnych kosztów usług</li>
					<li>Czasu trwania postępowań</li>
					<li>Sposobu umawiania konsultacji</li>
				</ul>
				<p><strong>Jak mogę Ci pomóc?</strong></p>
			</div>
		</div>
		<div class="quick-replies" id="quickReplies">
			<button class="quick-reply-btn" data-question="Ile kosztuje rozwód?">💰 Ile kosztuje rozwód?</button>
			<button class="quick-reply-btn" data-question="Jak długo trwa sprawa sądowa?">⏱️ Jak długo trwa sprawa?</button>
			<button class="quick-reply-btn" data-question="Jakie dokumenty potrzebuję do pierwszej konsultacji?">📄 Jakie dokumenty?</button>
			<button class="quick-reply-btn" data-question="Jak umówić konsultację?">📅 Umówić konsultację</button>
		</div>
	</div>
	<div class="chatbot-input">
		<input type="text" id="chatInput" placeholder="Wpisz swoje pytanie..." autocomplete="off">
		<button id="chatSendBtn" class="chat-send-btn"><span>Wyślij</span></button>
	</div>
	<div class="chatbot-footer">
		<small>💡 To AI asystent. Dla szczegółowej porady skorzystaj z formularza lub umów konsultację.</small>
	</div>
</div>
<!-- /wp:html --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"section"} -->
<section class="wp-block-group section"><!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:heading {"textAlign":"center","className":"section-title"} -->
<h2 class="wp-block-heading has-text-align-center section-title">Inne sposoby kontaktu</h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"contact-info-grid"} -->
<div class="wp-block-group contact-info-grid"><!-- wp:group {"className":"contact-info-card"} -->
<div class="wp-block-group contact-info-card"><!-- wp:paragraph {"className":"info-icon"} -->
<p class="info-icon">✉️</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Email</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><a href="mailto:kamila.sadlowicz@kancelaria-sadlowicz.pl">kamila.sadlowicz@kancelaria-sadlowicz.pl</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Odpowiedź w ciągu 24h (dni robocze)</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"contact-info-card"} -->
<div class="wp-block-group contact-info-card"><!-- wp:paragraph {"className":"info-icon"} -->
<p class="info-icon">📞</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Telefon</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><a href="tel:+48790013287">+48 790 013 287</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Pon-Pt: 9:00 - 17:00</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"contact-info-card"} -->
<div class="wp-block-group contact-info-card"><!-- wp:paragraph {"className":"info-icon"} -->
<p class="info-icon">🔗</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">LinkedIn</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><a href="https://www.linkedin.com/in/kamila-s-b20a8012a/" target="_blank" rel="noreferrer noopener">Profil LinkedIn</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Profesjonalna sieć kontaktów</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"contact-info-card"} -->
<div class="wp-block-group contact-info-card"><!-- wp:paragraph {"className":"info-icon"} -->
<p class="info-icon">📍</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Lokalizacja</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>ul. Arbuzowa 12<br>02-747 Warszawa</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Dzielnica Mokotów · Spotkania po wcześniejszym umówieniu</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"section section-alt"} -->
<section class="wp-block-group section section-alt"><!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:heading {"textAlign":"center","className":"section-title"} -->
<h2 class="wp-block-heading has-text-align-center section-title">Często zadawane pytania</h2>
<!-- /wp:heading -->

<!-- wp:group {"className":"faq-grid"} -->
<div class="wp-block-group faq-grid"><!-- wp:group {"className":"faq-item"} -->
<div class="wp-block-group faq-item"><!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">❓ Jak szybko otrzymam odpowiedź?</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Odpowiadam w ciągu 24 godzin w dni robocze. W pilnych sprawach proszę o zaznaczenie w formularzu.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"faq-item"} -->
<div class="wp-block-group faq-item"><!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">💰 Czy konsultacja jest płatna?</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Pierwsza konsultacja telefoniczna (do 15 min) jest bezpłatna. Szczegółowe porady są odpłatne zgodnie z <a href="<?php echo $u( '/oferta/' ); ?>">cennikiem</a>.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"faq-item"} -->
<div class="wp-block-group faq-item"><!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">📄 Jakie dokumenty przygotować?</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Zależy od sprawy. AI asystent podpowie co przyda się do pierwszej konsultacji. Zazwyczaj: umowy, korespondencja, orzeczenia sądowe.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"faq-item"} -->
<div class="wp-block-group faq-item"><!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">🔒 Czy moje dane są bezpieczne?</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Tak! Wszystkie dane są chronione zgodnie z RODO. Obowiązuje mnie tajemnica adwokacka.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"center","className":"faq-cta"} -->
<p class="has-text-align-center faq-cta">Więcej odpowiedzi znajdziesz w <a href="<?php echo $u( '/faq/' ); ?>">pełnym FAQ</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"cta-section"} -->
<section class="wp-block-group cta-section"><!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:group {"className":"cta-inner"} -->
<div class="wp-block-group cta-inner"><!-- wp:group {"className":"cta-text"} -->
<div class="wp-block-group cta-text"><!-- wp:heading -->
<h2 class="wp-block-heading">Nie zwlekaj -<br><em>działaj już dziś</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Im szybciej zaczniesz działać, tym lepsze efekty. Jestem tu, by Ci pomóc.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-buttons is-vertical"><!-- wp:button {"className":"is-style-ks-gold"} -->
<div class="wp-block-button is-style-ks-gold"><a class="wp-block-button__link wp-element-button" href="#contactForm">Wypełnij formularz</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-ks-ghost"} -->
<div class="wp-block-button is-style-ks-ghost"><a class="wp-block-button__link wp-element-button" href="tel:+48790013287">+48 790 013 287</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
