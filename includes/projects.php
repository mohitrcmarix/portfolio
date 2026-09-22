<?php
/**
 * Projects Section Component
 * Mohit Rathod Portfolio
 */
global $portfolio;
?>
<section class="section projects-section" id="projects">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag"><i class="fa-solid fa-folder-open"></i> Portfolio Showcase</span>
            <h2 class="section-title">Featured <span class="gradient-text">Projects &amp; Case Studies</span></h2>
            <p class="section-subtitle">Real-world WordPress sites, speed optimizations, bug fixes, and custom PHP solutions.</p>
        </div>

        <!-- Filter Tabs (jQuery Driven) -->
        <div class="project-filter-wrap">
            <button type="button" class="filter-btn active" data-filter="all">
                <i class="fa-solid fa-border-all"></i> All Projects
            </button>
            <button type="button" class="filter-btn" data-filter="wordpress">
                <i class="fa-brands fa-wordpress"></i> WordPress
            </button>
            <button type="button" class="filter-btn" data-filter="performance">
                <i class="fa-solid fa-gauge-high"></i> Performance Optimization
            </button>
            <button type="button" class="filter-btn" data-filter="maintenance">
                <i class="fa-solid fa-bug-slash"></i> Bug Fixing &amp; Maintenance
            </button>
            <button type="button" class="filter-btn" data-filter="backend">
                <i class="fa-brands fa-php"></i> PHP &amp; WooCommerce
            </button>
        </div>

        <!-- Projects Grid -->
        <div class="projects-grid" id="projects-grid">
            <?php foreach ($portfolio['projects'] as $project): ?>
                <div class="project-card glass-panel" data-category="<?= htmlspecialchars($project['category']) ?>" data-id="<?= htmlspecialchars($project['id']) ?>">
                    <div class="project-card-banner">
                        <div class="banner-top">
                            <span class="project-badge"><?= htmlspecialchars($project['badge']) ?></span>
                            <span class="project-cat-pill"><?= htmlspecialchars($project['category_label']) ?></span>
                        </div>
                        <div class="project-mockup-graphic">
                            <div class="browser-bar">
                                <span class="dot red"></span>
                                <span class="dot yellow"></span>
                                <span class="dot green"></span>
                                <span class="browser-address"><i class="fa-solid fa-lock"></i> <?= htmlspecialchars($project['url_display']) ?></span>
                            </div>
                            <div class="browser-screen">
                                <div class="mock-layout">
                                    <div class="mock-header"></div>
                                    <div class="mock-hero">
                                        <div class="mock-text title"></div>
                                        <div class="mock-text subtitle"></div>
                                        <div class="mock-btn"></div>
                                    </div>
                                    <div class="mock-cards">
                                        <div class="mock-card"></div>
                                        <div class="mock-card"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="project-card-body">
                        <h3 class="project-card-title"><?= htmlspecialchars($project['title']) ?></h3>
                        <p class="project-summary"><?= htmlspecialchars($project['summary']) ?></p>

                        <!-- Tech Stack Tags -->
                        <div class="project-stack-tags">
                            <?php foreach ($project['stack'] as $tech): ?>
                                <span class="stack-badge"><?= htmlspecialchars($tech) ?></span>
                            <?php endforeach; ?>
                        </div>

                        <!-- Card Footer Links -->
                        <div class="project-card-actions">
                            <button type="button" class="btn btn-primary btn-sm btn-view-project" data-project-id="<?= htmlspecialchars($project['id']) ?>">
                                <i class="fa-solid fa-circle-info"></i>
                                <span>View Case Study</span>
                            </button>

                            <?php if (!empty($project['url']) && $project['url'] !== '#'): ?>
                                <a href="<?= htmlspecialchars($project['url']) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline btn-sm" title="Open live website in new tab">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    <span>Live Link</span>
                                </a>
                            <?php else: ?>
                                <button type="button" class="btn btn-outline btn-sm btn-view-project" data-project-id="<?= htmlspecialchars($project['id']) ?>" title="View Technical Architecture">
                                    <i class="fa-solid fa-code"></i>
                                    <span>Architecture</span>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
