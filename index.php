<?php
/**
 * Mohit Rathod - Portfolio Website
 * WordPress Developer | Core PHP Developer
 *
 * Built with HTML5, CSS3, PHP, and jQuery
 */

// Suppress warnings from browser output (log only)
ini_set('display_errors', '0');
ini_set('log_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/config.php';

// Make $portfolio available in global scope for all included files
global $portfolio;

// Render Page Sections
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
require_once __DIR__ . '/includes/hero.php';
require_once __DIR__ . '/includes/about.php';
require_once __DIR__ . '/includes/skills.php';
require_once __DIR__ . '/includes/experience.php';
require_once __DIR__ . '/includes/projects.php';
require_once __DIR__ . '/includes/code-showcase.php';
require_once __DIR__ . '/includes/contact.php';
require_once __DIR__ . '/includes/modal.php';
require_once __DIR__ . '/includes/footer.php';
