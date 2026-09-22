<?php
/**
 * Navigation Bar Component
 * Mohit Rathod Portfolio
 */
?>
<header class="site-header" id="header">
    <div class="container header-container">
        <a href="javascript:void(0)" class="brand-logo" id="brand-logo" aria-label="Mohit Rathod Homepage">
            <span class="logo-symbol">&lt;</span>
            <span class="logo-text">Mohit</span>
            <span class="logo-accent">.Rathod</span>
            <span class="logo-symbol">/&gt;</span>
        </a>

        <!-- Desktop Navigation -->
        <nav class="nav-menu" id="nav-menu" aria-label="Main Navigation">
            <ul class="nav-list">
                <li class="nav-item"><a href="./" class="nav-link active" id="nav-hero-link"><i class="fa-solid fa-house-chimney"></i> Home</a></li>
                <li class="nav-item"><a href="#about" class="nav-link" id="nav-about-link"><i class="fa-solid fa-user-tie"></i> About</a></li>
                <li class="nav-item"><a href="#skills" class="nav-link" id="nav-skills-link"><i class="fa-solid fa-laptop-code"></i> Skills</a></li>
                <li class="nav-item"><a href="#experience" class="nav-link" id="nav-exp-link"><i class="fa-solid fa-briefcase"></i> Experience</a></li>
                <li class="nav-item"><a href="#projects" class="nav-link" id="nav-projects-link"><i class="fa-solid fa-diagram-project"></i> Projects</a></li>
                <li class="nav-item"><a href="#code-showcase" class="nav-link" id="nav-code-link"><i class="fa-solid fa-code"></i> Code Lab</a></li>
                <li class="nav-item"><a href="#contact" class="nav-link" id="nav-contact-link"><i class="fa-solid fa-paper-plane"></i> Contact</a></li>
            </ul>
        </nav>

        <!-- Header Actions -->
        <div class="header-actions">
            <!-- Theme Switcher Button -->
            <button class="theme-toggle-btn" id="theme-toggle-btn" type="button" aria-label="Toggle dark or light theme" title="Toggle Theme">
                <i class="fa-solid fa-moon icon-moon"></i>
                <i class="fa-solid fa-sun icon-sun"></i>
            </button>

            <!-- Hire Me CTA -->
            <a href="#contact" class="btn btn-primary btn-sm btn-hire" id="btn-hire-nav">
                <span>Hire Me</span>
                <i class="fa-solid fa-arrow-right-long"></i>
            </a>

            <!-- Mobile Hamburger Toggle -->
            <button class="mobile-menu-btn" id="mobile-menu-btn" type="button" aria-label="Open mobile menu" aria-expanded="false">
                <span class="bar bar-1"></span>
                <span class="bar bar-2"></span>
                <span class="bar bar-3"></span>
            </button>
        </div>
    </div>
</header>
