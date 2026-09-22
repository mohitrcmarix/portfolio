<?php
/**
 * Experience Section Component
 * Mohit Rathod Portfolio
 */
?>
<section class="section experience-section" id="experience">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag"><i class="fa-solid fa-clock-rotate-left"></i> Career Track</span>
            <h2 class="section-title">Professional <span class="gradient-text">Experience</span></h2>
            <p class="section-subtitle">Real-world production engineering, client deliverables, and enterprise solutions.</p>
        </div>

        <div class="timeline-wrapper">
            <div class="timeline-line"></div>

            <?php foreach ($portfolio['experience'] as $index => $exp): ?>
                <div class="timeline-item">
                    <div class="timeline-marker">
                        <div class="marker-pulse"></div>
                        <i class="fa-solid fa-briefcase"></i>
                    </div>

                    <div class="timeline-content glass-panel">
                        <div class="timeline-top-bar">
                            <div class="role-company-wrap">
                                <span class="badge-present"><i class="fa-solid fa-bolt"></i> Current Role</span>
                                <h3 class="role-title"><?= htmlspecialchars($exp['role']) ?></h3>
                                <div class="company-meta">
                                    <span class="company-name"><i class="fa-solid fa-building"></i> <?= htmlspecialchars($exp['company']) ?></span>
                                    <span class="meta-separator">&bull;</span>
                                    <span class="exp-duration"><i class="fa-solid fa-calendar-days"></i> <?= htmlspecialchars($exp['duration']) ?></span>
                                    <span class="meta-separator">&bull;</span>
                                    <span class="exp-location"><i class="fa-solid fa-location-dot"></i> <?= htmlspecialchars($exp['location']) ?></span>
                                </div>
                            </div>
                        </div>

                        <p class="exp-overview"><?= htmlspecialchars($exp['description']) ?></p>

                        <h4 class="duties-heading"><i class="fa-solid fa-list-check"></i> Key Responsibilities &amp; Impact:</h4>
                        <ul class="responsibilities-list">
                            <?php foreach ($exp['highlights'] as $highlight): ?>
                                <li>
                                    <i class="fa-solid fa-chevron-right list-bullet-icon"></i>
                                    <span><?= htmlspecialchars($highlight) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="exp-tags-wrap">
                            <span class="tags-label"><i class="fa-solid fa-tags"></i> Technologies Used:</span>
                            <div class="tags-container">
                                <?php foreach ($exp['tags'] as $tag): ?>
                                    <span class="tech-tag"><?= htmlspecialchars($tag) ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
