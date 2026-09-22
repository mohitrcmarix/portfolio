<?php
/**
 * Header Component
 * Mohit Rathod Portfolio
 */
global $portfolio;
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($portfolio['personal']['name']) ?> | <?= htmlspecialchars($portfolio['personal']['title']) ?></title>
    
    <!-- Meta & SEO Tags -->
    <meta name="description" content="<?= htmlspecialchars(substr($portfolio['personal']['summary'], 0, 160)) ?>...">
    <meta name="keywords" content="Mohit Rathod, WordPress Developer, Core PHP Developer, WooCommerce, ACF, Elementor, Razorpay, Ahmedabad, Gujarat, India, Freelance Web Developer">
    <meta name="author" content="<?= htmlspecialchars($portfolio['personal']['name']) ?>">
    <meta name="theme-color" content="#0b0f19">

    <!-- Open Graph / Social Sharing -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($portfolio['personal']['name']) ?> | <?= htmlspecialchars($portfolio['personal']['title']) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($portfolio['personal']['summary']) ?>">
    <meta property="og:url" content="http://localhost/mpot/">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,400;0,500;0,700;1,400&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Favicon SVG Data URI -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='25' fill='%2300f5d4'/><text x='50%' y='63%' font-size='50' font-weight='900' font-family='sans-serif' text-anchor='middle' fill='%230b0f19'>MR</text></svg>">
</head>
<body>
    <!-- Background Ambient Glow Canvas/Orbs -->
    <div class="ambient-glow glow-1"></div>
    <div class="ambient-glow glow-2"></div>
    <div class="ambient-glow glow-3"></div>

    <!-- Live Toast Container -->
    <div id="toast-container" class="toast-container" aria-live="polite" aria-atomic="true"></div>
