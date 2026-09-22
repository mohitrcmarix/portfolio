<?php
/**
 * Code Showcase Component
 * Mohit Rathod Portfolio
 */
?>
<section class="section code-section" id="code-showcase">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag"><i class="fa-solid fa-code"></i> Engineering Standards</span>
            <h2 class="section-title">Developer <span class="gradient-text">Code Lab</span></h2>
            <p class="section-subtitle">Real-world patterns demonstrating clean WordPress hooks, secure PHP OOP, and AJAX architecture.</p>
        </div>

        <div class="code-terminal-card glass-panel">
            <!-- Code Tab Bar -->
            <div class="code-terminal-header">
                <div class="terminal-dots">
                    <span class="dot red"></span>
                    <span class="dot yellow"></span>
                    <span class="dot green"></span>
                </div>
                
                <div class="code-tabs-nav" id="code-tabs-nav">
                    <?php foreach ($portfolio['code_snippets'] as $i => $snippet): ?>
                        <button type="button" class="code-tab-btn <?= $i === 0 ? 'active' : '' ?>" data-target="code-<?= $snippet['id'] ?>">
                            <i class="fa-brands fa-php tab-icon"></i>
                            <span><?= htmlspecialchars($snippet['title']) ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>

                <button type="button" class="btn-copy-code" id="btn-copy-active-code" title="Copy code snippet">
                    <i class="fa-regular fa-copy"></i>
                    <span>Copy Code</span>
                </button>
            </div>

            <!-- Code Panels -->
            <div class="code-terminal-body">
                <?php foreach ($portfolio['code_snippets'] as $i => $snippet): ?>
                    <div class="code-snippet-panel <?= $i === 0 ? 'active' : '' ?>" id="code-<?= $snippet['id'] ?>">
                        <div class="snippet-meta-bar">
                            <span class="meta-lang"><i class="fa-brands fa-php"></i> PHP 8.x / WordPress 6.x</span>
                            <span class="meta-verified"><i class="fa-solid fa-shield-check"></i> Nonce &amp; Type-Safe</span>
                        </div>
                        <pre><code class="language-php code-text-content"><?= htmlspecialchars($snippet['code']) ?></code></pre>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
