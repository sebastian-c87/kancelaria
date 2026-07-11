<!-- Stopka -->
<footer class="footer">
	<div class="container">
		<div class="footer-grid">
			<div class="footer-brand">
				<strong>Kamila Sadłowicz</strong>
				<span class="tagline">Adwokat · Warszawa</span>
				<p>Profesjonalna obsługa prawna dla firm i klientów indywidualnych. Okręgowa Rada Adwokacka w Warszawie.</p>
			</div>
			<div class="footer-col">
				<h4>Menu</h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/oferta/' ) ); ?>">Oferta i Cennik</a></li>
					<li><a href="<?php echo esc_url( home_url( '/specjalizacje/' ) ); ?>">Specjalizacje</a></li>
					<li><a href="<?php echo esc_url( home_url( '/o-mnie/' ) ); ?>">O mnie</a></li>
					<li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a></li>
					<li><a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">FAQ</a></li>
					<li><a href="<?php echo esc_url( home_url( '/kontakt/' ) ); ?>">Kontakt</a></li>
				</ul>
			</div>
			<div class="footer-col">
				<h4>Kontakt</h4>
				<p>Tel: <a href="tel:+48790013287">+48 790 013 287</a></p>
				<p>E-mail: <a href="mailto:kamila.sadlowicz@kancelaria-sadlowicz.pl">kamila.sadlowicz@kancelaria-sadlowicz.pl</a></p>
				<p>LinkedIn: <a href="https://www.linkedin.com/in/kamila-s-b20a8012a/" target="_blank" rel="noopener">Profil LinkedIn</a></p>
				<p style="margin-top:16px;">ul. Arbuzowa 12<br>02-747 Warszawa (Mokotów)</p>
			</div>
		</div>
		<div class="footer-bottom">
			<p>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> Kamila Sadłowicz. Wszelkie prawa zastrzeżone.</p>
			<a href="<?php echo esc_url( home_url( '/polityka-prywatnosci/' ) ); ?>">Polityka Prywatności</a>
		</div>
	</div>
</footer>

<button class="scroll-to-top" aria-label="Przewiń do góry">↑</button>

<?php wp_footer(); ?>
</body>
</html>
