/**
 * Mohit Rathod - Portfolio JavaScript Engine
 * Powered by jQuery 3.7+
 */

$(document).ready(function () {
    'use strict';

    // --------------------------------------------------------------------------
    // 0. Extract Injected Portfolio Data
    // --------------------------------------------------------------------------
    let portfolioData = {};
    try {
        const rawJson = $('#portfolio-json-data').text();
        if (rawJson) {
            portfolioData = JSON.parse(rawJson);
        }
    } catch (e) {
        console.warn('Could not parse portfolio JSON:', e);
    }

    // --------------------------------------------------------------------------
    // 1. Theme Switcher (Dark / Light Mode)
    // --------------------------------------------------------------------------
    const $html = $('html');
    const $themeBtn = $('#theme-toggle-btn');
    const savedTheme = localStorage.getItem('mohit_portfolio_theme') || 'dark';

    function setTheme(theme) {
        $html.attr('data-theme', theme);
        localStorage.setItem('mohit_portfolio_theme', theme);
    }

    setTheme(savedTheme);

    $themeBtn.on('click', function () {
        const currentTheme = $html.attr('data-theme') || 'dark';
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        setTheme(newTheme);
        showToast(`Switched to ${newTheme === 'dark' ? 'Dark' : 'Light'} Mode`);
    });

    // --------------------------------------------------------------------------
    // 2. Mobile Menu Toggle
    // --------------------------------------------------------------------------
    const $mobileBtn = $('#mobile-menu-btn');
    const $navMenu = $('#nav-menu');

    $mobileBtn.on('click', function () {
        const isOpen = $navMenu.hasClass('open');
        $navMenu.toggleClass('open');
        $mobileBtn.attr('aria-expanded', !isOpen);
    });

    $('.nav-link').on('click', function () {
        if ($navMenu.hasClass('open')) {
            $navMenu.removeClass('open');
            $mobileBtn.attr('aria-expanded', false);
        }
    });

    // --------------------------------------------------------------------------
    // 3. Scrollspy & Sticky Header & Back-to-Top
    // --------------------------------------------------------------------------
    const $header = $('#header');
    const $backToTop = $('#back-to-top');
    const sections = $('section[id]');

    $(window).on('scroll', function () {
        const scrollPos = $(this).scrollTop();

        // Sticky Header shadow
        if (scrollPos > 40) {
            $header.css('box-shadow', '0 8px 24px rgba(0, 0, 0, 0.2)');
        } else {
            $header.css('box-shadow', 'none');
        }

        // Back to top button visibility
        if (scrollPos > 350) {
            $backToTop.addClass('visible');
        } else {
            $backToTop.removeClass('visible');
        }

        // Scrollspy active state
        sections.each(function () {
            const top = $(this).offset().top - 120;
            const bottom = top + $(this).outerHeight();
            const id = $(this).attr('id');

            if (scrollPos >= top && scrollPos < bottom) {
                $('.nav-link').removeClass('active');
                if (id === 'hero') {
                    $('#nav-hero-link').addClass('active');
                } else {
                    $(`.nav-link[href="#${id}"]`).addClass('active');
                }
            }
        });
    });

    $backToTop.on('click', function () {
        $('html, body').animate({ scrollTop: 0 }, 500);
    });

    // Brand logo click → scroll to top without adding #hero to URL
    $('#brand-logo').on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 500);
        // Remove any hash from URL cleanly
        if (window.history && window.history.replaceState) {
            window.history.replaceState(null, null, window.location.pathname);
        }
    });

    $('#nav-hero-link').on('click', function (e) {
        e.preventDefault();
        $('html, body').stop(true, true).scrollTop(0);
        if (window.history && window.history.replaceState) {
            window.history.replaceState(null, null, window.location.pathname);
        }
    });


    // --------------------------------------------------------------------------
    // 4. Dynamic Typing Effect in Hero
    // --------------------------------------------------------------------------
    const words = [
        'Custom WordPress Themes',
        'Core PHP & OOP Solutions',
        'Custom WordPress Plugins',
        'WooCommerce & Razorpay Gateways',
        '90+ Speed & Core Web Vitals',
        'Staging & Live Production Fixes'
    ];
    let wordIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    const typingSpeed = 100;
    const pauseDelay = 1800;
    const $typedTarget = $('#typed-text');

    function typeLoop() {
        if (!$typedTarget.length) return;

        const currentWord = words[wordIndex];

        if (isDeleting) {
            $typedTarget.text(currentWord.substring(0, charIndex - 1));
            charIndex--;
        } else {
            $typedTarget.text(currentWord.substring(0, charIndex + 1));
            charIndex++;
        }

        let currentSpeed = isDeleting ? typingSpeed / 2 : typingSpeed;

        if (!isDeleting && charIndex === currentWord.length) {
            currentSpeed = pauseDelay;
            isDeleting = true;
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            wordIndex = (wordIndex + 1) % words.length;
            currentSpeed = 400;
        }

        setTimeout(typeLoop, currentSpeed);
    }

    typeLoop();

    // --------------------------------------------------------------------------
    // 5. Project Filtering
    // --------------------------------------------------------------------------
    $('.filter-btn').on('click', function () {
        const filter = $(this).data('filter');
        $('.filter-btn').removeClass('active');
        $(this).addClass('active');

        const $cards = $('.project-card');

        if (filter === 'all') {
            $cards.stop(true, true).fadeIn(300);
        } else {
            $cards.each(function () {
                const category = $(this).data('category');
                if (category === filter) {
                    $(this).stop(true, true).fadeIn(300);
                } else {
                    $(this).stop(true, true).fadeOut(200);
                }
            });
        }
    });

    // --------------------------------------------------------------------------
    // 6. Project Case Study Modal
    // --------------------------------------------------------------------------
    const $projectModal = $('#project-modal');

    $(document).on('click', '.btn-view-project', function (e) {
        e.preventDefault();
        const projectId = $(this).data('project-id');
        const projectsList = portfolioData.projects || [];
        const project = projectsList.find(p => p.id === projectId);

        if (!project) return;

        $('#modal-project-title').text(project.title);
        $('#modal-project-badge').text(project.badge || 'Case Study');
        $('#modal-project-cat').text(project.category_label || '');
        $('#modal-project-desc').text(project.description || project.summary);

        // URL handling
        if (project.url && project.url !== '#') {
            $('#modal-project-url').html(`<a href="${project.url}" target="_blank" rel="noopener noreferrer">${project.url_display || project.url} <i class="fa-solid fa-arrow-up-right-from-square"></i></a>`);
            $('#modal-external-link').attr('href', project.url).show();
        } else {
            $('#modal-project-url').text(project.url_display || 'Enterprise Custom Implementation');
            $('#modal-external-link').hide();
        }

        // Achievements list
        const $achieveList = $('#modal-project-achievements').empty();
        if (project.achievements && project.achievements.length) {
            project.achievements.forEach(item => {
                $achieveList.append(`<li>${item}</li>`);
            });
        }

        // Stack chips
        const $stackWrap = $('#modal-project-stack').empty();
        if (project.stack && project.stack.length) {
            project.stack.forEach(tech => {
                $stackWrap.append(`<span class="stack-badge">${tech}</span>`);
            });
        }

        openModal($projectModal);
    });

    // --------------------------------------------------------------------------
    // 7. Full Resume Modal & Print Action
    // --------------------------------------------------------------------------
    const $resumeModal = $('#resume-modal');

    $('#btn-open-resume-modal').on('click', function () {
        openModal($resumeModal);
    });

    $('#btn-print-resume').on('click', function () {
        window.print();
    });

    // --------------------------------------------------------------------------
    // Modal Helpers (Close button & backdrop click)
    // --------------------------------------------------------------------------
    function openModal($m) {
        $m.addClass('open').attr('aria-hidden', 'false');
        $('body').css('overflow', 'hidden');
    }

    function closeModal($m) {
        $m.removeClass('open').attr('aria-hidden', 'true');
        $('body').css('overflow', '');
    }

    $('.modal-close-btn, .modal-close-action, #resume-modal-close-btn, #resume-modal-close-action').on('click', function () {
        closeModal($(this).closest('.modal-overlay'));
    });

    $('.modal-overlay').on('click', function (e) {
        if ($(e.target).hasClass('modal-overlay')) {
            closeModal($(this));
        }
    });

    $(document).on('keydown', function (e) {
        if (e.key === 'Escape') {
            closeModal($('.modal-overlay.open'));
        }
    });

    // --------------------------------------------------------------------------
    // 8. Developer Code Lab Tabs & Copy
    // --------------------------------------------------------------------------
    $('.code-tab-btn').on('click', function () {
        const targetId = $(this).data('target');
        $('.code-tab-btn').removeClass('active');
        $(this).addClass('active');

        $('.code-snippet-panel').removeClass('active');
        $('#' + targetId).addClass('active');
    });

    $('#btn-copy-active-code').on('click', function () {
        const activeCode = $('.code-snippet-panel.active code').text();
        if (navigator.clipboard) {
            navigator.clipboard.writeText(activeCode).then(function () {
                showToast('Code snippet copied to clipboard!');
            });
        } else {
            copyFallback(activeCode);
            showToast('Code snippet copied to clipboard!');
        }
    });

    // --------------------------------------------------------------------------
    // 9. Quick Copy Helper Buttons
    // --------------------------------------------------------------------------
    $(document).on('click', '.copy-btn', function () {
        const textToCopy = $(this).data('copy');
        if (!textToCopy) return;

        if (navigator.clipboard) {
            navigator.clipboard.writeText(textToCopy).then(function () {
                showToast(`Copied: ${textToCopy}`);
            });
        } else {
            copyFallback(textToCopy);
            showToast(`Copied: ${textToCopy}`);
        }
    });

    function copyFallback(text) {
        const $temp = $('<textarea>');
        $('body').append($temp);
        $temp.val(text).select();
        document.execCommand('copy');
        $temp.remove();
    }

    // --------------------------------------------------------------------------
    // 10. Toast Notification System
    // --------------------------------------------------------------------------
    function showToast(message, type = 'success') {
        const $container = $('#toast-container');
        const iconClass = type === 'success' ? 'fa-circle-check' : 'fa-circle-exclamation';
        const $toast = $(`
            <div class="toast toast-${type}">
                <i class="fa-solid ${iconClass}"></i>
                <span>${message}</span>
            </div>
        `);

        $container.append($toast);

        setTimeout(function () {
            $toast.fadeOut(300, function () {
                $(this).remove();
            });
        }, 3500);
    }

    // --------------------------------------------------------------------------
    // 11. AJAX Contact Form Submission
    // --------------------------------------------------------------------------
    const $contactForm = $('#portfolio-contact-form');
    const $alertBox = $('#form-alert-container');
    const $submitBtn = $('#btn-submit-contact');
    const $btnSpinner = $submitBtn.find('.btn-spinner');
    const $btnText = $submitBtn.find('.btn-text');
    const $btnIcon = $submitBtn.find('.btn-icon');

    $contactForm.on('submit', function (e) {
        e.preventDefault();

        // Clear previous errors
        $('.field-error').text('');
        $alertBox.hide().removeClass('alert-success alert-danger').empty();

        const name = $('#contact-name').val().trim();
        const email = $('#contact-email').val().trim();
        const message = $('#contact-message').val().trim();

        let hasError = false;

        if (name.length < 2) {
            $('#name-error').text('Please enter your full name (minimum 2 characters).');
            hasError = true;
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            $('#email-error').text('Please enter a valid email address.');
            hasError = true;
        }

        if (message.length < 10) {
            $('#message-error').text('Please provide a message with at least 10 characters.');
            hasError = true;
        }

        if (hasError) return;

        // UI Loading State
        $submitBtn.prop('disabled', true);
        $btnSpinner.show();
        $btnIcon.hide();
        $btnText.text('Sending...');

        $.ajax({
            url: $contactForm.attr('action'),
            type: 'POST',
            data: $contactForm.serialize(),
            dataType: 'json',
            timeout: 10000
        })
        .done(function (res) {
            if (res.status === 'success') {
                $alertBox.addClass('alert-success')
                    .html(`<i class="fa-solid fa-circle-check"></i> ${res.message}`)
                    .fadeIn();
                $contactForm[0].reset();
                showToast('Message dispatched successfully!', 'success');
            } else {
                $alertBox.addClass('alert-danger')
                    .html(`<i class="fa-solid fa-circle-exclamation"></i> ${res.message || 'An error occurred.'}`)
                    .fadeIn();
            }
        })
        .fail(function (xhr) {
            let errorMsg = 'Failed to submit form. Please check your network or try again.';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMsg = xhr.responseJSON.message;
            }
            $alertBox.addClass('alert-danger')
                .html(`<i class="fa-solid fa-triangle-exclamation"></i> ${errorMsg}`)
                .fadeIn();
        })
        .always(function () {
            $submitBtn.prop('disabled', false);
            $btnSpinner.hide();
            $btnIcon.show();
            $btnText.text('Send Message');
        });
    });

});
