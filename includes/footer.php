<?php
/**
 * Footer Component
 * Mohit Rathod Portfolio
 */
?>
<footer class="site-footer">
    <div class="container footer-container">
        <div class="footer-top">
            <div class="footer-brand-col">
                <a href="#hero" class="brand-logo" aria-label="Mohit Rathod Homepage">
                    <span class="logo-symbol">&lt;</span>
                    <span class="logo-text">Mohit</span>
                    <span class="logo-accent">.Rathod</span>
                    <span class="logo-symbol">/&gt;</span>
                </a>
                <p class="footer-tagline">
                    Crafting lightning-fast, highly-customized WordPress architectures and robust Core PHP solutions for businesses and digital agencies.
                </p>
                <div class="footer-socials">
                    <a href="<?= htmlspecialchars($portfolio['personal']['linkedin']) ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" title="LinkedIn">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="mailto:<?= htmlspecialchars($portfolio['personal']['email']) ?>" aria-label="Email" title="Email">
                        <i class="fa-solid fa-envelope"></i>
                    </a>
                    <a href="tel:<?= htmlspecialchars($portfolio['personal']['phone_raw']) ?>" aria-label="Phone" title="Phone">
                        <i class="fa-solid fa-phone"></i>
                    </a>
                    <a href="<?= htmlspecialchars($portfolio['personal']['whatsapp']) ?>" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp" title="WhatsApp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <div class="footer-links-col">
                <h4>Quick Navigation</h4>
                <ul class="footer-nav">
                    <li><a href="#hero"><i class="fa-solid fa-chevron-right"></i> Home</a></li>
                    <li><a href="#about"><i class="fa-solid fa-chevron-right"></i> About Me</a></li>
                    <li><a href="#skills"><i class="fa-solid fa-chevron-right"></i> Technical Skills</a></li>
                    <li><a href="#experience"><i class="fa-solid fa-chevron-right"></i> Experience</a></li>
                    <li><a href="#projects"><i class="fa-solid fa-chevron-right"></i> Projects &amp; Case Studies</a></li>
                    <li><a href="#code-showcase"><i class="fa-solid fa-chevron-right"></i> Developer Code Lab</a></li>
                </ul>
            </div>

            <div class="footer-contact-col">
                <h4>Reach Out</h4>
                <p><i class="fa-solid fa-location-dot"></i> <?= htmlspecialchars($portfolio['personal']['location']) ?></p>
                <p><i class="fa-solid fa-envelope"></i> <a href="mailto:<?= htmlspecialchars($portfolio['personal']['email']) ?>"><?= htmlspecialchars($portfolio['personal']['email']) ?></a></p>
                <p><i class="fa-solid fa-phone"></i> <a href="tel:<?= htmlspecialchars($portfolio['personal']['phone_raw']) ?>"><?= htmlspecialchars($portfolio['personal']['phone']) ?></a></p>
                <div class="footer-available-badge">
                    <span class="pulse-dot"></span>
                    <span>Available for Opportunities</span>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> <strong><?= htmlspecialchars($portfolio['personal']['name']) ?></strong>. All rights reserved.</p>
            <p class="built-with">
                Handcrafted with <i class="fa-solid fa-heart text-danger"></i> using <strong>HTML5, CSS3, PHP &amp; jQuery</strong>.
            </p>
        </div>
    </div>
</footer>

<!-- Floating Back To Top Button -->
<button type="button" class="back-to-top-btn" id="back-to-top" aria-label="Scroll back to top" title="Back to top">
    <i class="fa-solid fa-arrow-up"></i>
</button>

<!-- JSON Data Injection for jQuery Modals & Filters -->
<script type="application/json" id="portfolio-json-data">
<?= json_encode($portfolio, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>
</script>

<!-- jQuery CDN with fallback -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    if (typeof jQuery === 'undefined') {
        document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"><\/script>');
    }
</script>

<!-- Main JavaScript -->
<script src="assets/js/main.js"></script>
</body>
</html>
