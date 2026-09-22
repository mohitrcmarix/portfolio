<?php
/**
 * Modals Component: Project Details & Resume Viewer
 * Mohit Rathod Portfolio
 */
global $portfolio;
?>
<!-- Project Details Modal -->
<div class="modal-overlay" id="project-modal" aria-hidden="true" role="dialog" aria-labelledby="modal-project-title">
    <div class="modal-dialog glass-panel">
        <div class="modal-header">
            <div class="modal-title-wrap">
                <span class="modal-badge" id="modal-project-badge">Case Study</span>
                <h3 class="modal-title" id="modal-project-title">Project Title</h3>
                <p class="modal-subtitle" id="modal-project-cat"></p>
            </div>
            <button type="button" class="modal-close-btn" id="modal-close-btn" aria-label="Close modal">&times;</button>
        </div>

        <div class="modal-body">
            <div class="modal-meta-box">
                <div class="meta-col">
                    <span class="meta-label"><i class="fa-solid fa-link"></i> Live URL:</span>
                    <span class="meta-val" id="modal-project-url">-</span>
                </div>
                <div class="meta-col">
                    <span class="meta-label"><i class="fa-solid fa-code-branch"></i> Core Role:</span>
                    <span class="meta-val">WordPress &amp; PHP Development</span>
                </div>
            </div>

            <div class="modal-section">
                <h4><i class="fa-solid fa-align-left"></i> Project Overview</h4>
                <p id="modal-project-desc" class="modal-desc-text"></p>
            </div>

            <div class="modal-section">
                <h4><i class="fa-solid fa-circle-check"></i> Key Implementations &amp; Impact</h4>
                <ul id="modal-project-achievements" class="modal-achievements-list"></ul>
            </div>

            <div class="modal-section">
                <h4><i class="fa-solid fa-layer-group"></i> Tech Stack &amp; Tools Used</h4>
                <div id="modal-project-stack" class="modal-stack-chips"></div>
            </div>
        </div>

        <div class="modal-footer">
            <a href="#" target="_blank" rel="noopener noreferrer" class="btn btn-primary" id="modal-external-link">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                <span>Visit Live Website</span>
            </a>
            <button type="button" class="btn btn-outline modal-close-action">Close Window</button>
        </div>
    </div>
</div>

<!-- Full Resume Viewer Modal -->
<div class="modal-overlay" id="resume-modal" aria-hidden="true" role="dialog" aria-labelledby="modal-resume-title">
    <div class="modal-dialog modal-dialog-lg glass-panel">
        <div class="modal-header">
            <div class="modal-title-wrap">
                <span class="modal-badge"><i class="fa-solid fa-file-pdf"></i> Verified Resume</span>
                <h3 class="modal-title" id="modal-resume-title"><?= htmlspecialchars($portfolio['personal']['name']) ?> - CV</h3>
                <p class="modal-subtitle"><?= htmlspecialchars($portfolio['personal']['title']) ?></p>
            </div>
            <button type="button" class="modal-close-btn" id="resume-modal-close-btn" aria-label="Close modal">&times;</button>
        </div>

        <div class="modal-body resume-preview-body">
            <!-- Printable / Downloadable Resume Card -->
            <div class="resume-sheet" id="printable-resume">
                <!-- Resume Top Header -->
                <div class="resume-sheet-header">
                    <div class="resume-name-title">
                        <h2><?= htmlspecialchars($portfolio['personal']['name']) ?></h2>
                        <div class="resume-role-tag"><?= htmlspecialchars($portfolio['personal']['title']) ?></div>
                    </div>
                    <div class="resume-contact-block">
                        <div><i class="fa-solid fa-phone"></i> <?= htmlspecialchars($portfolio['personal']['phone']) ?></div>
                        <div><i class="fa-solid fa-envelope"></i> <?= htmlspecialchars($portfolio['personal']['email']) ?></div>
                        <div><i class="fa-brands fa-linkedin"></i> linkedin.com/in/mohit-rathod-b23638321</div>
                        <div><i class="fa-solid fa-location-dot"></i> <?= htmlspecialchars($portfolio['personal']['location']) ?></div>
                    </div>
                </div>

                <div class="resume-divider"></div>

                <!-- Resume Columns -->
                <div class="resume-sheet-grid">
                    <!-- Left Main Column (Experience & Projects) -->
                    <div class="resume-main-col">
                        <div class="resume-block">
                            <h4 class="resume-section-h4"><i class="fa-solid fa-briefcase"></i> PROFESSIONAL EXPERIENCE</h4>
                            <div class="resume-item">
                                <div class="item-head">
                                    <strong>Junior WordPress Developer</strong>
                                    <span class="item-date">11/2025 - Present</span>
                                </div>
                                <div class="item-sub"><strong>Cmarix</strong> &bull; Ahmedabad, Gujarat</div>
                                <ul class="item-list">
                                    <?php foreach ($portfolio['experience'][0]['highlights'] as $hl): ?>
                                        <li><?= htmlspecialchars($hl) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="resume-block">
                            <h4 class="resume-section-h4"><i class="fa-solid fa-diagram-project"></i> KEY PROJECTS</h4>
                            
                            <div class="resume-item">
                                <div class="item-head">
                                    <strong>SH Engitech Corporate Website</strong>
                                    <span class="item-date">Live Site</span>
                                </div>
                                <div class="item-sub">shengitech.com &bull; WordPress, PHP, Elementor, ACF, jQuery</div>
                                <p class="item-desc">Implemented responsive website functionality and content structures; customized layouts with Elementor, ACF, and Core PHP.</p>
                            </div>

                            <div class="resume-item">
                                <div class="item-head">
                                    <strong>Website Performance Optimization</strong>
                                    <span class="item-date">Benchmark Cases</span>
                                </div>
                                <div class="item-sub">stg24.laforet.in &bull; stg.learn.frenchclass.in</div>
                                <p class="item-desc">Analyzed and addressed frontend and website-level performance bottlenecks, improving page loading speed and mobile responsiveness.</p>
                            </div>

                            <div class="resume-item">
                                <div class="item-head">
                                    <strong>WordPress Bug Fixing &amp; Maintenance</strong>
                                    <span class="item-date">Staging Environments</span>
                                </div>
                                <div class="item-sub">stg24.laforet.in, staging.frenchclass.in, keyboard.frenchclass.in</div>
                                <p class="item-desc">Investigated frontend, backend, JavaScript/jQuery, WordPress functionality, and MySQL database issues and implemented permanent fixes.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Sidebar Column (Summary, Skills, Education) -->
                    <div class="resume-side-col">
                        <div class="resume-block">
                            <h4 class="resume-section-h4"><i class="fa-solid fa-user-pen"></i> PROFESSIONAL SUMMARY</h4>
                            <p class="resume-summary-text"><?= htmlspecialchars($portfolio['personal']['summary']) ?></p>
                        </div>

                        <div class="resume-block">
                            <h4 class="resume-section-h4"><i class="fa-solid fa-graduation-cap"></i> EDUCATION</h4>
                            <div class="resume-item">
                                <strong>Bachelor of Computer Applications (BCA)</strong>
                                <div class="item-sub">School or University &bull; Gujarat, India</div>
                                <div class="status-pill text-success"><i class="fa-solid fa-check"></i> Completed</div>
                            </div>
                        </div>

                        <div class="resume-block">
                            <h4 class="resume-section-h4"><i class="fa-solid fa-microchip"></i> TECHNICAL SKILLS</h4>
                            <div class="skills-mini-list">
                                <p><strong>WordPress:</strong> Custom Themes, Custom Plugins, WooCommerce, ACF, Elementor</p>
                                <p><strong>Backend:</strong> Core PHP, PHP OOP, MySQL, AJAX, CRUD</p>
                                <p><strong>Frontend:</strong> HTML5, CSS3, JavaScript, jQuery, Responsive Design</p>
                                <p><strong>Integrations:</strong> Razorpay Payment Gateway, REST APIs</p>
                                <p><strong>Tools:</strong> Git, GitHub, VS Code</p>
                                <p><strong>Specialization:</strong> Speed Optimization, Debugging, Bug Fixing, Website Maintenance</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn-print-resume">
                <i class="fa-solid fa-print"></i>
                <span>Print / Save as PDF</span>
            </button>
            <a href="mailto:<?= htmlspecialchars($portfolio['personal']['email']) ?>?subject=Interview%20Request%20for%20Mohit%20Rathod" class="btn btn-whatsapp">
                <i class="fa-solid fa-envelope"></i>
                <span>Schedule Interview</span>
            </a>
            <button type="button" class="btn btn-outline" id="resume-modal-close-action">Close</button>
        </div>
    </div>
</div>
