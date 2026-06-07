<!-- ===== FOOTER ===== -->
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
                    <li><a href="<?php echo home_url('/oferta/'); ?>">Oferta i Cennik</a></li>
                    <li><a href="<?php echo home_url('/specjalizacje/'); ?>">Specjalizacje</a></li>
                    <li><a href="<?php echo home_url('/o-mnie/'); ?>">O mnie</a></li>
                    <li><a href="<?php echo home_url('/blog/'); ?>">Blog</a></li>
                    <li><a href="<?php echo home_url('/faq/'); ?>">FAQ</a></li>
                    <li><a href="<?php echo home_url('/kontakt/'); ?>">Kontakt</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Kontakt</h4>
                <p>Tel: <a href="tel:+48790013287">+48 790 013 287</a></p>
                <p>E-mail: <a href="mailto:kamila.sadlowicz@kancelaria-sadlowicz.pl">kamila.sadlowicz@kancelaria-sadlowicz.pl</a></p>
                <p>LinkedIn: <a href="https://www.linkedin.com/in/kamila-s-b20a8012a/" target="_blank">Profil LinkedIn</a></p>
                <p style="margin-top:16px;">ul. Arbuzowa 12<br>02-747 Warszawa (Mokotów)</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Kamila Sadłowicz. Wszelkie prawa zastrzeżone.</p>
            <a href="<?php echo home_url('/polityka-prywatnosci/'); ?>">Polityka Prywatności</a>
        </div>
    </div>
</footer>

<script>
// ===== NAVBAR SCROLL =====
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 40);
}, { passive: true });

// ===== MOBILE MENU =====
const hamburger = document.getElementById('hamburger');
const navMenu   = document.getElementById('navMenu');
if (hamburger && navMenu) {
    hamburger.addEventListener('click', (e) => {
        e.stopPropagation();
        hamburger.classList.toggle('open');
        navMenu.classList.toggle('open');
    });
    navMenu.querySelectorAll('a').forEach(a => {
        a.addEventListener('click', () => {
            hamburger.classList.remove('open');
            navMenu.classList.remove('open');
        });
    });
    document.addEventListener('click', (e) => {
        if (navMenu.classList.contains('open') && !navMenu.contains(e.target) && !hamburger.contains(e.target)) {
            hamburger.classList.remove('open');
            navMenu.classList.remove('open');
        }
    });
}

// ===== SCROLL REVEAL =====
const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.classList.add('visible');
            observer.unobserve(e.target);
        }
    });
}, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

// ===== SMOOTH SCROLL =====
document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
        const target = document.querySelector(a.getAttribute('href'));
        if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth' }); }
    });
});

const scrollBtn = document.querySelector('.scroll-to-top');
if (scrollBtn) {
    window.addEventListener('scroll', () => {
        scrollBtn.classList.toggle('visible', window.scrollY > 400);
    }, { passive: true });
    scrollBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
}
</script>
<button class="scroll-to-top" aria-label="Przewiń do góry">↑</button>
<script>
(function(){
    var S=new Set(['SCRIPT','STYLE','PRE','CODE','TEXTAREA','INPUT','SELECT','BUTTON']);
    var w=document.createTreeWalker(document.body,NodeFilter.SHOW_TEXT,{
        acceptNode:function(n){
            return S.has(n.parentElement&&n.parentElement.tagName)
                ?NodeFilter.FILTER_REJECT:NodeFilter.FILTER_ACCEPT;
        }
    });
    var ns=[];while(w.nextNode())ns.push(w.currentNode);
    ns.forEach(function(n){
        var f=n.nodeValue.replace(/(^|[\s,;:!?([])([wziaoueWZIAOUE]) /g,'$1$2 ');
        if(f!==n.nodeValue)n.nodeValue=f;
    });
})();
</script>

<?php wp_footer(); ?>
</body>
</html>
