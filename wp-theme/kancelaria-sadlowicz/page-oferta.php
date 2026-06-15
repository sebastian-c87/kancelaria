<?php get_header(); ?>

<!-- ===== PAGE HERO ===== -->
<section class="page-hero">
    <div class="page-hero-diagonal"></div>
    <div class="container">
        <div class="page-hero-eyebrow">
            <div class="page-hero-eyebrow-line"></div>
            <span class="page-hero-eyebrow-text">Kancelaria Adwokacka · Warszawa</span>
        </div>
        <h1 class="page-hero-title">Oferta i <em>Cennik</em></h1>
        <p class="page-hero-desc">Transparentne ceny i indywidualne podejście do każdego klienta. Każda sprawa jest inna – po wstępnej konsultacji otrzymujesz szczegółową wycenę.</p>
        <div class="page-hero-actions">
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
</section>

<?php if (ks_use_elementor_content()): ?>
    <?php while (have_posts()): the_post(); the_content(); endwhile; ?>
<?php else: ?>
    <main>
        <!-- Intro -->
        <section class="content-section" style="padding-bottom: 0;">
            <div class="container">
                <div class="intro-box">
                    <p class="lead-text"><?php echo ks_field('oferta_intro_lead', 'Oferuję kompleksową obsługę prawną dostosowaną do potrzeb klientów indywidualnych i firm.'); ?></p>
                    <p><?php echo ks_field('oferta_intro_text', 'Poniższy cennik oparty jest na Rozporządzeniu Ministra Sprawiedliwości oraz praktyce rynkowej w Warszawie (stan na 2026 rok). Wszystkie kwoty podane są netto + VAT 23%.'); ?></p>
                </div>
            </div>
        </section>

        <!-- 1. Konsultacje -->
        <section class="content-section" style="padding-top: 40px;">
            <div class="container">
                <h2>Konsultacje Prawne</h2>
                
                <div class="table-wrapper">
                    <table class="pricing-table">
                        <thead>
                            <tr>
                                <th>Usługa</th>
                                <th>Stawka</th>
                                <th>Uwagi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo ks_table_rows('oferta_konsultacje', 3); ?>
                        </tbody>
                    </table>
                </div>

                <div class="info-box">
                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg></span>Dodatkowe informacje:</h4>
                    <ul>
                        <?php echo ks_list_items('oferta_konsultacje_info'); ?>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 2. Abonament -->
        <section class="content-section bg-light">
            <div class="container">
                <h2>Abonament Prawny dla Firm</h2>
                <p class="section-intro">Stała obsługa prawna dla Twojej firmy – doradztwo w bieżących sprawach, rabat na postępowania sądowe i priorytetowy czas odpowiedzi.</p>

                <!-- Pakiet START -->
                <div class="package-card">
                    <div class="package-header">
                        <h3><?php echo ks_field('pkg_start_name', 'PAKIET START'); ?></h3>
                        <div class="package-price"><?php echo ks_field('pkg_start_price', '800 zł/mc'); ?></div>
                    </div>
                    <div class="package-meta">
                        <span><strong>Dla kogo:</strong> <?php echo ks_field('pkg_start_dla'); ?></span>
                    </div>
                    <div class="package-content">
                        <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="9 12 11 14 15 10"/></svg></span>Co obejmuje pakiet:</h4>
                        <ul>
                            <?php echo ks_list_items('pkg_start_obejmuje', true); ?>
                        </ul>
                        <?php if (ks_raw('pkg_start_nieobejmuje') !== ''): ?>
                        <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="8" y1="12" x2="16" y2="12"/></svg></span>Pakiet NIE obejmuje:</h4>
                        <ul>
                            <?php echo ks_list_items('pkg_start_nieobejmuje'); ?>
                        </ul>
                        <?php endif; ?>
                        <p class="package-extra"><strong>Dodatkowe godziny:</strong> <?php echo ks_field('pkg_start_godziny', '300 zł/h'); ?></p>
                    </div>
                </div>

                <!-- Pakiet BIZNES -->
                <div class="package-card package-recommended">
                    <div class="package-badge">★ POLECANY</div>
                    <div class="package-header">
                        <h3><?php echo ks_field('pkg_biznes_name', 'PAKIET BIZNES'); ?></h3>
                        <div class="package-price"><?php echo ks_field('pkg_biznes_price', '1.800 zł/mc'); ?></div>
                    </div>
                    <div class="package-meta">
                        <span><strong>Dla kogo:</strong> <?php echo ks_field('pkg_biznes_dla'); ?></span>
                    </div>
                    <div class="package-content">
                        <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="9 12 11 14 15 10"/></svg></span>Co obejmuje pakiet:</h4>
                        <ul>
                            <?php echo ks_list_items('pkg_biznes_obejmuje', true); ?>
                        </ul>
                        <?php if (ks_raw('pkg_biznes_nieobejmuje') !== ''): ?>
                        <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="8" y1="12" x2="16" y2="12"/></svg></span>Pakiet NIE obejmuje:</h4>
                        <ul>
                            <?php echo ks_list_items('pkg_biznes_nieobejmuje'); ?>
                        </ul>
                        <?php endif; ?>
                        <p class="package-extra"><strong>Dodatkowe godziny:</strong> <?php echo ks_field('pkg_biznes_godziny', '280 zł/h'); ?></p>
                    </div>
                </div>

                <!-- Pakiet PROFESJONALNY -->
                <div class="package-card">
                    <div class="package-header">
                        <h3><?php echo ks_field('pkg_prof_name', 'PAKIET PROFESJONALNY'); ?></h3>
                        <div class="package-price"><?php echo ks_field('pkg_prof_price', '4.200 zł/mc'); ?></div>
                    </div>
                    <div class="package-meta">
                        <span><strong>Dla kogo:</strong> <?php echo ks_field('pkg_prof_dla'); ?></span>
                    </div>
                    <div class="package-content">
                        <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="9 12 11 14 15 10"/></svg></span>Co obejmuje pakiet:</h4>
                        <ul>
                            <?php echo ks_list_items('pkg_prof_obejmuje', true); ?>
                        </ul>
                        <?php if (ks_raw('pkg_prof_nieobejmuje') !== ''): ?>
                        <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="8" y1="12" x2="16" y2="12"/></svg></span>Pakiet NIE obejmuje:</h4>
                        <ul>
                            <?php echo ks_list_items('pkg_prof_nieobejmuje'); ?>
                        </ul>
                        <?php endif; ?>
                        <p class="package-extra"><strong>Dodatkowe godziny:</strong> <?php echo ks_field('pkg_prof_godziny', '250 zł/h'); ?></p>
                    </div>
                </div>

                <!-- Pakiet PREMIUM -->
                <div class="package-card">
                    <div class="package-header">
                        <h3><?php echo ks_field('pkg_premium_name', 'PAKIET PREMIUM'); ?></h3>
                        <div class="package-price"><?php echo ks_field('pkg_premium_price', 'od 8.000 zł/mc'); ?></div>
                    </div>
                    <div class="package-meta">
                        <span><strong>Dla kogo:</strong> <?php echo ks_field('pkg_premium_dla'); ?></span>
                    </div>
                    <div class="package-content">
                        <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="9 12 11 14 15 10"/></svg></span>Co obejmuje pakiet:</h4>
                        <ul>
                            <?php echo ks_list_items('pkg_premium_obejmuje', true); ?>
                        </ul>
                        <p class="package-extra"><strong>Dodatkowe godziny:</strong> <?php echo ks_field('pkg_premium_godziny', '220 zł/h'); ?></p>
                        <?php if (ks_raw('pkg_premium_note') !== ''): ?>
                        <p class="package-note"><strong>Zakres negocjowalny:</strong> <?php echo ks_field('pkg_premium_note'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Tabela porównawcza -->
                <h3 style="margin-top: 3rem;">Porównanie Pakietów Abonamentowych</h3>
                
                <div class="table-wrapper">
                    <table class="comparison-table">
                        <thead>
                            <tr>
                                <th>Element</th>
                                <th>START</th>
                                <th>BIZNES</th>
                                <th>PROFESJONALNY</th>
                                <th>PREMIUM</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo ks_table_rows('oferta_porownanie', 5, 0); ?>
                        </tbody>
                    </table>
                </div>

                <div class="info-box" style="margin-top: 2rem;">
                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg></span>Dodatkowe informacje o abonamentach:</h4>
                    <ul>
                        <?php echo ks_list_items('oferta_abon_info'); ?>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 3. Sprawy Rodzinne -->
        <section class="content-section">
            <div class="container">
                <h2>Sprawy Rodzinne</h2>
                
                <div class="table-wrapper">
                    <table class="pricing-table">
                        <thead>
                            <tr>
                                <th>Element</th>
                                <th>Stawka</th>
                                <th>Uwagi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo ks_table_rows('oferta_rodzinne', 3); ?>
                        </tbody>
                    </table>
                </div>

                <div class="info-box">
                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></span>Minimalna stawka wg Rozporządzenia Ministra Sprawiedliwości:</h4>
                    <ul>
                        <?php echo ks_list_items('oferta_rodzinne_stawki'); ?>
                    </ul>
                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg></span>Dodatkowe usługi:</h4>
                    <ul>
                        <?php echo ks_list_items('oferta_rodzinne_dodatkowe'); ?>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 4. Windykacja -->
        <section class="content-section bg-light">
            <div class="container">
                <h2>Windykacja Należności</h2>
                <p class="section-intro">Dochodzenie należności pieniężnych – od wezwania do zapłaty, przez postępowanie sądowe, po obsługę egzekucji komorniczej.</p>

                <div class="table-wrapper">
                    <table class="pricing-table">
                        <thead>
                            <tr>
                                <th>Etap / wartość należności</th>
                                <th>Honorarium stałe</th>
                                <th>Uwagi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo ks_table_rows('oferta_windykacja', 3); ?>
                        </tbody>
                    </table>
                </div>

                <div class="info-box">
                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg></span>Honorarium stałe i prowizja windykacyjna</h4>
                    <p><?php echo wp_kses(ks_raw('oferta_wind_honor_p1'), ['strong' => [], 'em' => []]); ?></p>
                    <ul>
                        <?php echo ks_list_items('oferta_wind_honor_lista'); ?>
                    </ul>
                    <p><?php echo wp_kses(ks_raw('oferta_wind_honor_p2'), ['strong' => [], 'em' => []]); ?></p>

                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg></span>Etapy windykacji:</h4>
                    <table class="mini-table">
                        <thead>
                            <tr>
                                <th>Etap</th>
                                <th>Honorarium</th>
                                <th>Orientacyjny czas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo ks_table_rows('oferta_wind_etapy', 3, -1); ?>
                        </tbody>
                    </table>

                    <p style="margin-top: 1rem;"><strong>W ramach abonamentu:</strong></p>
                    <ul>
                        <?php echo ks_list_items('oferta_wind_abon'); ?>
                    </ul>
                </div>
            </div>
        </section>
        <!-- 5. Sprawy Karne -->
        <section class="content-section">
            <div class="container">
                <h2>Sprawy Karne – Obrona</h2>
                
                <div class="table-wrapper">
                    <table class="pricing-table">
                        <thead>
                            <tr>
                                <th>Rodzaj postępowania</th>
                                <th>Stawka</th>
                                <th>Min. stawka (Rozp. MS)</th>
                                <th>Uwagi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo ks_table_rows('oferta_karne', 4); ?>
                        </tbody>
                    </table>
                </div>

                <div class="info-box">
                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg></span>Dodatkowe informacje:</h4>
                    <ul>
                        <?php echo ks_list_items('oferta_karne_info'); ?>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 6. Prawo Gospodarcze -->
        <section class="content-section bg-light">
            <div class="container">
                <h2>Prawo Gospodarcze i Umowy</h2>
                
                <div class="table-wrapper">
                    <table class="pricing-table">
                        <thead>
                            <tr>
                                <th>Usługa</th>
                                <th>Stawka</th>
                                <th>Uwagi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo ks_table_rows('oferta_gospodarcze', 3); ?>
                        </tbody>
                    </table>
                </div>

                <div class="info-box">
                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg></span>Dodatkowe informacje:</h4>
                    <ul>
                        <?php echo ks_list_items('oferta_gosp_info'); ?>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 7. Reprezentacja Sądowa -->
        <section class="content-section">
            <div class="container">
                <h2>Reprezentacja Sądowa (wg wartości sporu)</h2>
                
                <div class="table-wrapper">
                    <table class="pricing-table">
                        <thead>
                            <tr>
                                <th>Wartość przedmiotu sporu</th>
                                <th>Stawka</th>
                                <th>Min. stawka (Rozp. MS)</th>
                                <th>Zakres</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo ks_table_rows('oferta_reprezentacja', 4); ?>
                        </tbody>
                    </table>
                </div>

                <div class="info-box">
                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></span>Zakres "cała sprawa" (I instancja):</h4>
                    <ul>
                        <?php echo ks_list_items('oferta_repr_zakres'); ?>
                    </ul>

                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="16 12 12 8 8 12"/><line x1="12" y1="16" x2="12" y2="8"/></svg></span>Reprezentacja w II instancji (apelacja):</h4>
                    <p><strong><?php echo esc_html(ks_raw('oferta_repr_apelacja') ?: '+50% stawki z I instancji'); ?></strong></p>

                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg></span>Dodatkowe informacje:</h4>
                    <ul>
                        <?php echo ks_list_items('oferta_repr_info'); ?>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 8. Opłaty sądowe -->
        <section class="content-section bg-light">
            <div class="container">
                <h2>Opłaty Sądowe i Dodatkowe</h2>
                <p class="section-intro">
                    Poniższe koszty <strong>ponosi strona</strong> niezależnie od wynagrodzenia prawnika. 
                    Są to obowiązkowe opłaty sądowe, skarbowe oraz koszty usług dodatkowych.
                </p>

                <h3>Opłaty sądowe od pozwów</h3>
                <p style="font-size:13px;color:var(--text-muted);margin-bottom:1rem;">Wg Ustawy o kosztach sądowych w sprawach cywilnych (uksc). Opłaty są stałe i jednolite dla całej Polski.</p>
                <div class="table-wrapper">
                    <table class="pricing-table">
                        <thead>
                            <tr>
                                <th>Rodzaj sprawy / wartość sporu</th>
                                <th>Opłata sądowa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo ks_table_rows('oferta_oplaty_sadowe', 2, 1); ?>
                        </tbody>
                    </table>
                </div>

                <h3 style="margin-top: 2rem;">Inne koszty</h3>
                <div class="table-wrapper">
                    <table class="pricing-table">
                        <thead>
                            <tr>
                                <th>Element</th>
                                <th>Koszt</th>
                                <th>Uwagi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo ks_table_rows('oferta_inne_koszty', 3, 1); ?>
                        </tbody>
                    </table>
                </div>

                <div class="warning-box">
                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></span>Ważne:</h4>
                    <ul>
                        <?php echo ks_list_items('oferta_warning'); ?>
                    </ul>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section class="content-section">
            <div class="container">
                <h2>Najczęściej Zadawane Pytania o Ceny</h2>

                <div class="faq-grid">
                    <?php
                    $faq_allowed = ['strong' => [], 'em' => [], 'a' => ['href' => [], 'target' => []]];
                    for ($i = 1; $i <= 10; $i++):
                        $faq_q = trim(ks_raw("faq_{$i}_q"));
                        $faq_a = trim(ks_raw("faq_{$i}_a"));
                        if ($faq_q === '' || $faq_a === '') continue;
                    ?>
                    <div class="faq-item">
                        <h4><?php echo esc_html($faq_q); ?></h4>
                        <p><?php echo wp_kses($faq_a, $faq_allowed); ?></p>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
        </section>

    </main>

<!-- ===== CTA ===== -->
<section class="cta-section">
    <div class="container">
        <div class="cta-inner reveal">
            <div class="cta-text">
                <h2>Potrzebujesz wyceny<br>dla <em>swojej sprawy?</em></h2>
                <p>Umów konsultację – omówimy Twoją sprawę i przedstawię szczegółową wycenę bez ukrytych kosztów.</p>
            </div>
            <div style="display:flex; flex-direction:column; gap:16px; align-items:flex-start; flex-shrink:0;">
                <a href="<?php echo home_url('/kontakt/'); ?>" class="btn-gold" style="white-space:nowrap;">
                    Umów konsultację
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                <a href="tel:+48790013287" class="btn-ghost" style="white-space:nowrap;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92v2z"/></svg>
                    +48 790 013 287
                </a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
