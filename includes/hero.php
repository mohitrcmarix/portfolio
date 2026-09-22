<?php
/**
 * Hero Section Component
 * Mohit Rathod Portfolio
 */
global $portfolio;
?>
<section class="hero-section" id="hero">
    <div class="container hero-container">
        <div class="hero-content">
            <!-- Availability Badge -->
            <div class="hero-badge">
                <span class="status-pulse"></span>
                <span class="badge-text"><?= htmlspecialchars($portfolio['personal']['availability']) ?></span>
            </div>

            <!-- Main Heading -->
            <h1 class="hero-title">
                Hi, I'm <span class="gradient-text hero-name"><?= htmlspecialchars($portfolio['personal']['name']) ?></span>
                <span class="hero-role-wrapper">
                    <span class="hero-static-prefix">Crafting</span>
                    <span class="typed-text-target" id="typed-text"></span><span class="cursor-blink">|</span>
                </span>
            </h1>

            <!-- Summary Pitch -->
            <p class="hero-pitch">
                Passionate <strong>WordPress &amp; Core PHP Developer</strong> with hands-on expertise building custom themes &amp; plugins, high-converting WooCommerce storefronts, REST API / Razorpay payment integrations, and delivering 90+ Core Web Vitals performance benchmarks.
            </p>

            <!-- Quick Direct Contact Chips -->
            <div class="hero-chips">
                <a href="mailto:<?= htmlspecialchars($portfolio['personal']['email']) ?>" class="contact-chip" title="Send email">
                    <i class="fa-solid fa-envelope"></i>
                    <span><?= htmlspecialchars($portfolio['personal']['email']) ?></span>
                </a>
                <a href="tel:<?= htmlspecialchars($portfolio['personal']['phone_raw']) ?>" class="contact-chip" title="Call directly">
                    <i class="fa-solid fa-phone"></i>
                    <span><?= htmlspecialchars($portfolio['personal']['phone']) ?></span>
                </a>
                <span class="contact-chip location-chip">
                    <i class="fa-solid fa-location-dot"></i>
                    <span><?= htmlspecialchars($portfolio['personal']['location']) ?></span>
                </span>
            </div>

            <!-- CTA Buttons -->
            <div class="hero-actions">
                <a href="#projects" class="btn btn-primary btn-lg" id="hero-cta-projects">
                    <i class="fa-solid fa-layer-group"></i>
                    <span>View Key Projects</span>
                </a>
                <a href="#contact" class="btn btn-outline btn-lg" id="hero-cta-contact">
                    <i class="fa-solid fa-paper-plane"></i>
                    <span>Let's Discuss Work</span>
                </a>
                <a href="<?= htmlspecialchars($portfolio['personal']['whatsapp']) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg" id="hero-cta-whatsapp" title="Chat on WhatsApp">
                    <i class="fa-brands fa-whatsapp"></i>
                    <span>WhatsApp</span>
                </a>
            </div>

            <!-- Social Connect Links -->
            <div class="hero-socials">
                <span class="social-label">Connect:</span>
                <a href="<?= htmlspecialchars($portfolio['personal']['linkedin']) ?>" target="_blank" rel="noopener noreferrer" class="social-link" title="LinkedIn Profile" aria-label="Mohit Rathod LinkedIn">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>
                <a href="mailto:<?= htmlspecialchars($portfolio['personal']['email']) ?>" class="social-link" title="Direct Email" aria-label="Email Mohit Rathod">
                    <i class="fa-solid fa-at"></i>
                </a>
                <a href="tel:<?= htmlspecialchars($portfolio['personal']['phone_raw']) ?>" class="social-link" title="Direct Phone" aria-label="Call Mohit">
                    <i class="fa-solid fa-phone-volume"></i>
                </a>
            </div>
        </div>

        <!-- Hero Visual / Code Card -->
        <div class="hero-visual">
            <div class="developer-card glass-panel">
                <div class="card-header-bar">
                    <div class="window-dots">
                        <span class="dot red"></span>
                        <span class="dot yellow"></span>
                        <span class="dot green"></span>
                    </div>
                    <div class="card-tab-title">
                        <i class="fa-brands fa-php code-icon"></i>
                        <span>MohitRathod.class.php</span>
                    </div>
                    <div class="card-status-badge">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Status: Active</span>
                    </div>
                </div>

                <div class="card-body-code">
                    <pre><code class="language-php"><span class="code-keyword">&lt;?php</span>
<span class="code-keyword">namespace</span> <span class="code-class">Ahmedabad\Developer</span>;

<span class="code-keyword">class</span> <span class="code-class">MohitRathod</span> <span class="code-keyword">implements</span> <span class="code-type">FullStackWordPress</span> {
    <span class="code-keyword">public string</span> <span class="code-var">$role</span> = <span class="code-string">"WordPress & Core PHP Dev"</span>;
    <span class="code-keyword">public string</span> <span class="code-var">$company</span> = <span class="code-string">"Cmarix"</span>;
    <span class="code-keyword">public array</span>  <span class="code-var">$coreStack</span> = [
        <span class="code-string">"WordPress"</span>, <span class="code-string">"Core PHP"</span>, <span class="code-string">"WooCommerce"</span>,
        <span class="code-string">"ACF"</span>, <span class="code-string">"Elementor"</span>, <span class="code-string">"Razorpay"</span>,
        <span class="code-string">"MySQL"</span>, <span class="code-string">"AJAX"</span>, <span class="code-string">"jQuery"</span>
    ];

    <span class="code-keyword">public function</span> <span class="code-fn">deliverProject</span>(): <span class="code-type">Result</span> {
        <span class="code-keyword">return</span> <span class="code-var">$this</span>->buildRobustCustomFeatures(
            <span class="code-param">performance</span>: <span class="code-string">"90+ Core Web Vitals"</span>,
            <span class="code-param">security</span>:    <span class="code-string">"Sanitized & Nonce-Checked"</span>,
            <span class="code-param">reliability</span>: <span class="code-string">"Staging-to-Prod Tested"</span>
        );
    }
}
<span class="code-comment">// Let's build your next digital success!</span></code></pre>
                </div>

                <!-- Floating Tech Badges -->
                <div class="floating-tech-badge badge-wp" title="WordPress">
                    <i class="fa-brands fa-wordpress"></i>
                    <span>WordPress</span>
                </div>
                <div class="floating-tech-badge badge-php" title="Core PHP">
                    <i class="fa-brands fa-php"></i>
                    <span>Core PHP</span>
                </div>
                <div class="floating-tech-badge badge-woo" title="WooCommerce">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>WooCommerce</span>
                </div>
                <div class="floating-tech-badge badge-ajax" title="AJAX & MySQL">
                    <i class="fa-solid fa-database"></i>
                    <span>MySQL / AJAX</span>
                </div>
            </div>

            <!-- Mini Experience Highlights -->
            <div class="hero-stats-banner">
                <?php foreach ($portfolio['stats'] as $index => $stat): ?>
                    <div class="stat-item" id="hero-stat-<?= $index ?>">
                        <div class="stat-icon-wrap">
                            <i class="<?= htmlspecialchars($stat['icon']) ?>"></i>
                        </div>
                        <div class="stat-info">
                            <span class="stat-number"><?= htmlspecialchars($stat['number']) ?></span>
                            <span class="stat-label"><?= htmlspecialchars($stat['label']) ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
