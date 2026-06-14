<?php
/*
=======================================================================
  INSTRUKCJA — CO Z TYM ZROBIĆ
=======================================================================

  Ten plik ZASTĘPUJE obecny plik:
  wp-content/themes/kancelaria-sadlowicz/page-o-mnie.php

  Jak wgrać przez FTP:
  1. Wejdź na serwer przez FTP/File Manager
  2. Przejdź do: wp-content/themes/kancelaria-sadlowicz/
  3. Usuń lub nadpisz plik page-o-mnie.php
  4. Wgraj ten plik pod nazwą: page-o-mnie.php

  WAŻNE: Najpierw wklej treść z pliku omnie-do-wklejenia.html
  do edytora WordPress (Strony → O mnie → Edytuj → zakładka Tekst),
  a POTEM wgraj ten plik PHP. W przeciwnym razie strona będzie pusta.

=======================================================================
*/
?>
<?php get_header(); ?>

<!-- ===== PAGE HERO ===== -->
<section class="page-hero">
    <div class="page-hero-diagonal"></div>
    <div class="container">
        <div class="page-hero-eyebrow">
            <div class="page-hero-eyebrow-line"></div>
            <span class="page-hero-eyebrow-text">Adwokat · Kancelaria Adwokacka · Warszawa</span>
        </div>
        <h1 class="page-hero-title">O <em>mnie</em></h1>
        <p class="page-hero-desc">Adwokat z pasją do prawa i zaangażowaniem w każdą sprawę. Poznaj mnie bliżej – moje doświadczenie, wartości i podejście do klienta.</p>
        <div class="page-hero-actions">
            <a href="<?php echo home_url('/kontakt/'); ?>" class="btn-gold">
                Umów konsultację
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
            <a href="<?php echo home_url('/specjalizacje/'); ?>" class="btn-ghost">Moje specjalizacje</a>
        </div>
    </div>
</section>

<!-- ===== TREŚĆ STRONY (edytowana przez WordPress) ===== -->
<?php while (have_posts()): the_post(); ?>
    <?php the_content(); ?>
<?php endwhile; ?>

<!-- ===== CTA ===== -->
<section class="cta-section">
    <div class="container">
        <div class="cta-inner reveal">
            <div class="cta-text">
                <h2>Porozmawiajmy<br>o Twojej <em>sprawie</em></h2>
                <p>Pierwsza konsultacja pozwoli nam ocenić sytuację i ustalić najlepszą strategię działania.</p>
            </div>
            <div style="display:flex; flex-direction:column; gap:16px; align-items:flex-start;">
                <a href="<?php echo home_url('/kontakt/'); ?>" class="btn-gold">
                    Umów konsultację
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                <a href="tel:+48790013287" class="btn-ghost">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92v2z"/></svg>
                    +48 790 013 287
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
