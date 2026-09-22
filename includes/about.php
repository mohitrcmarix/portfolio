<?php
/**
 * About Section Component
 * Mohit Rathod Portfolio
 */
global $portfolio;
?>
<section class="section about-section" id="about">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag"><i class="fa-solid fa-user-gear"></i> Get To Know Me</span>
            <h2 class="section-title">About <span class="gradient-text">Mohit Rathod</span></h2>
            <p class="section-subtitle">A dedicated developer blending deep Core PHP engineering with dynamic WordPress craftsmanship.</p>
        </div>

        <div class="about-grid">
            <!-- Left Bio Column -->
            <div class="about-bio-column">
                <div class="bio-card glass-panel">
                    <div class="bio-header">
                        <div class="bio-avatar-glow">
                            <span class="bio-initials">MR</span>
                        </div>
                        <div class="bio-headline">
                            <h3>Mohit Rathod</h3>
                            <p class="bio-role">WordPress Developer | Core PHP Developer</p>
                            <p class="bio-location"><i class="fa-solid fa-location-dot"></i> Ahmedabad, Gujarat, India</p>
                        </div>
                    </div>

                    <div class="bio-content">
                        <p class="bio-text highlight-lead">
                            <?= htmlspecialchars($portfolio['personal']['summary']) ?>
                        </p>
                    </div>

                    <div class="bio-meta-list">
                        <div class="meta-item">
                            <span class="meta-label"><i class="fa-solid fa-briefcase"></i> Current Role:</span>
                            <span class="meta-val">Junior WordPress Developer at <strong>Cmarix</strong></span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label"><i class="fa-solid fa-envelope"></i> Email:</span>
                            <span class="meta-val">
                                <a href="mailto:<?= htmlspecialchars($portfolio['personal']['email']) ?>"><?= htmlspecialchars($portfolio['personal']['email']) ?></a>
                                <button type="button" class="copy-btn" data-copy="<?= htmlspecialchars($portfolio['personal']['email']) ?>" title="Copy email"><i class="fa-regular fa-copy"></i></button>
                            </span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label"><i class="fa-solid fa-phone"></i> Phone:</span>
                            <span class="meta-val">
                                <a href="tel:<?= htmlspecialchars($portfolio['personal']['phone_raw']) ?>"><?= htmlspecialchars($portfolio['personal']['phone']) ?></a>
                                <button type="button" class="copy-btn" data-copy="<?= htmlspecialchars($portfolio['personal']['phone_raw']) ?>" title="Copy phone"><i class="fa-regular fa-copy"></i></button>
                            </span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label"><i class="fa-solid fa-circle-check"></i> Status:</span>
                            <span class="meta-val text-success">Open to New Challenges &amp; Projects</span>
                        </div>
                    </div>

                    <div class="bio-footer-actions">
                        <button type="button" class="btn btn-primary" id="btn-open-resume-modal">
                            <i class="fa-solid fa-file-invoice"></i>
                            <span>View Full Resume</span>
                        </button>
                        <a href="<?= htmlspecialchars($portfolio['personal']['whatsapp']) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp">
                            <i class="fa-brands fa-whatsapp"></i>
                            <span>Direct Chat</span>
                        </a>
                    </div>
                </div>

                <!-- Education Card -->
                <?php foreach ($portfolio['education'] as $edu): ?>
                    <div class="education-card glass-panel">
                        <div class="edu-icon">
                            <i class="<?= htmlspecialchars($edu['icon']) ?>"></i>
                        </div>
                        <div class="edu-info">
                            <span class="edu-badge"><i class="fa-solid fa-check"></i> <?= htmlspecialchars($edu['status']) ?></span>
                            <h4 class="edu-title"><?= htmlspecialchars($edu['degree']) ?></h4>
                            <p class="edu-institution"><i class="fa-solid fa-building-columns"></i> <?= htmlspecialchars($edu['institution']) ?> &bull; <?= htmlspecialchars($edu['location']) ?></p>
                            <p class="edu-desc"><?= htmlspecialchars($edu['description']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Right Key Pillars Column -->
            <div class="about-pillars-column">
                <h3 class="pillars-title"><i class="fa-solid fa-star"></i> Core Engineering Pillars</h3>
                
                <div class="pillar-card glass-panel">
                    <div class="pillar-icon bg-wp">
                        <i class="fa-brands fa-wordpress-simple"></i>
                    </div>
                    <div class="pillar-body">
                        <h4>Custom Themes &amp; Plugin Architecture</h4>
                        <p>Building clean, scalable, and lightweight WordPress themes and custom plugins from scratch without relying on heavy bloat. Mastery of hooks, filters, and Advanced Custom Fields (ACF).</p>
                    </div>
                </div>

                <div class="pillar-card glass-panel">
                    <div class="pillar-icon bg-php">
                        <i class="fa-brands fa-php"></i>
                    </div>
                    <div class="pillar-body">
                        <h4>Core PHP, PHP OOP &amp; MySQL</h4>
                        <p>Proficient in backend fundamentals, object-oriented PHP architecture, secure SQL database queries, CRUD operations, and non-blocking asynchronous AJAX communications.</p>
                    </div>
                </div>

                <div class="pillar-card glass-panel">
                    <div class="pillar-icon bg-cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <div class="pillar-body">
                        <h4>WooCommerce &amp; Razorpay Integrations</h4>
                        <p>Tailoring custom checkout workflows, dynamic pricing adjustments, custom order fields, and seamlessly integrating secure Razorpay payment gateways and 3rd party APIs.</p>
                    </div>
                </div>

                <div class="pillar-card glass-panel">
                    <div class="pillar-icon bg-speed">
                        <i class="fa-solid fa-gauge-high"></i>
                    </div>
                    <div class="pillar-body">
                        <h4>Speed Optimization &amp; Core Web Vitals</h4>
                        <p>Diagnosing bottlenecks, query load optimization, CSS/JS minification &amp; deferral, and server caching strategies to elevate Google PageSpeed and GTmetrix scores to 90+.</p>
                    </div>
                </div>

                <div class="pillar-card glass-panel">
                    <div class="pillar-icon bg-debug">
                        <i class="fa-solid fa-bug-slash"></i>
                    </div>
                    <div class="pillar-body">
                        <h4>Staging &amp; Live Debugging</h4>
                        <p>Experienced in isolating production anomalies, JavaScript/jQuery console conflicts, PHP exceptions, and restoring corrupted databases across multi-staging infrastructures.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
