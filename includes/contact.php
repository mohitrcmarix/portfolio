<?php
/**
 * Contact Section Component
 * Mohit Rathod Portfolio
 */
global $portfolio;
?>
<section class="section contact-section" id="contact">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag"><i class="fa-solid fa-paper-plane"></i> Get In Touch</span>
            <h2 class="section-title">Let's Work <span class="gradient-text">Together</span></h2>
            <p class="section-subtitle">Have a WordPress project, speed optimization challenge, or need a dedicated PHP developer? Drop a message!</p>
        </div>

        <div class="contact-layout-grid">
            <!-- Left Contact Info Cards -->
            <div class="contact-info-col">
                <div class="contact-card-highlight glass-panel">
                    <h3>Contact Information</h3>
                    <p class="contact-intro">
                        Feel free to contact me directly via phone, WhatsApp, email, or LinkedIn. I am based in Ahmedabad and open to both full-time positions and high-impact freelance/contract projects.
                    </p>

                    <div class="contact-methods">
                        <!-- Phone Card -->
                        <div class="method-card">
                            <div class="method-icon bg-phone">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="method-details">
                                <span class="method-title">Direct Phone</span>
                                <a href="tel:<?= htmlspecialchars($portfolio['personal']['phone_raw']) ?>" class="method-value">
                                    <?= htmlspecialchars($portfolio['personal']['phone']) ?>
                                </a>
                            </div>
                            <button type="button" class="copy-btn" data-copy="<?= htmlspecialchars($portfolio['personal']['phone_raw']) ?>" title="Copy Phone Number">
                                <i class="fa-regular fa-copy"></i>
                            </button>
                        </div>

                        <!-- Email Card -->
                        <div class="method-card">
                            <div class="method-icon bg-email">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="method-details">
                                <span class="method-title">Email Address</span>
                                <a href="mailto:<?= htmlspecialchars($portfolio['personal']['email']) ?>" class="method-value">
                                    <?= htmlspecialchars($portfolio['personal']['email']) ?>
                                </a>
                            </div>
                            <button type="button" class="copy-btn" data-copy="<?= htmlspecialchars($portfolio['personal']['email']) ?>" title="Copy Email Address">
                                <i class="fa-regular fa-copy"></i>
                            </button>
                        </div>

                        <!-- WhatsApp Card -->
                        <div class="method-card">
                            <div class="method-icon bg-whatsapp">
                                <i class="fa-brands fa-whatsapp"></i>
                            </div>
                            <div class="method-details">
                                <span class="method-title">WhatsApp Instant Chat</span>
                                <a href="<?= htmlspecialchars($portfolio['personal']['whatsapp']) ?>" target="_blank" rel="noopener noreferrer" class="method-value text-whatsapp">
                                    +91 9724696274 (Click to Chat)
                                </a>
                            </div>
                        </div>

                        <!-- Location Card -->
                        <div class="method-card">
                            <div class="method-icon bg-location">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="method-details">
                                <span class="method-title">Location</span>
                                <span class="method-value">
                                    <?= htmlspecialchars($portfolio['personal']['location']) ?>
                                </span>
                            </div>
                        </div>

                        <!-- LinkedIn Card -->
                        <div class="method-card">
                            <div class="method-icon bg-linkedin">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </div>
                            <div class="method-details">
                                <span class="method-title">LinkedIn Profile</span>
                                <a href="<?= htmlspecialchars($portfolio['personal']['linkedin']) ?>" target="_blank" rel="noopener noreferrer" class="method-value">
                                    linkedin.com/in/mohit-rathod
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right AJAX Contact Form -->
            <div class="contact-form-col">
                <div class="form-container glass-panel">
                    <div class="form-top-bar">
                        <h3>Send A Message</h3>
                        <span class="form-badge"><i class="fa-solid fa-bolt"></i> Fast Response</span>
                    </div>

                    <form id="portfolio-contact-form" action="ajax/contact.php" method="POST" novalidate>
                        <!-- Honeypot field for anti-spam bots -->
                        <div class="honeypot-field" style="display:none;" aria-hidden="true">
                            <input type="text" name="website" tabindex="-1" autocomplete="off">
                        </div>

                        <!-- Status Alert Message Area -->
                        <div id="form-alert-container" class="form-alert-box" style="display: none;"></div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label for="contact-name"><i class="fa-solid fa-user"></i> Your Name <span class="req">*</span></label>
                                <input type="text" id="contact-name" name="name" class="form-control" placeholder="e.g. Rahul Sharma" required>
                                <span class="field-error" id="name-error"></span>
                            </div>

                            <div class="form-group">
                                <label for="contact-email"><i class="fa-solid fa-envelope"></i> Your Email <span class="req">*</span></label>
                                <input type="email" id="contact-email" name="email" class="form-control" placeholder="e.g. rahul@example.com" required>
                                <span class="field-error" id="email-error"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contact-subject"><i class="fa-solid fa-tag"></i> Project Subject / Scope</label>
                            <select id="contact-subject" name="subject" class="form-control">
                                <option value="WordPress Custom Theme / Plugin">WordPress Custom Theme / Plugin Development</option>
                                <option value="Website Speed Optimization">Website Speed Optimization (Core Web Vitals)</option>
                                <option value="Bug Fixing & Website Maintenance">Bug Fixing &amp; Production Maintenance</option>
                                <option value="WooCommerce & Razorpay Integration">WooCommerce &amp; Razorpay Payment Gateway</option>
                                <option value="Job Opportunity / Hiring Inquiry">Job Opportunity / Hiring Inquiry</option>
                                <option value="Other Technical Inquiry">Other Inquiry</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="contact-message"><i class="fa-solid fa-comment-dots"></i> Your Message <span class="req">*</span></label>
                            <textarea id="contact-message" name="message" rows="5" class="form-control" placeholder="Describe your project, website issue, or inquiry in detail..." required></textarea>
                            <span class="field-error" id="message-error"></span>
                        </div>

                        <button type="submit" class="btn btn-primary btn-submit" id="btn-submit-contact">
                            <span class="btn-text">Send Message</span>
                            <i class="fa-solid fa-paper-plane btn-icon"></i>
                            <span class="spinner-border spinner-border-sm btn-spinner" style="display:none;" role="status"></span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
