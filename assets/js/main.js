/**
 * Mohit Rathod - Portfolio JavaScript Engine
 * Pure Vanilla JavaScript (Zero Dependencies, High Performance)
 */

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    // --------------------------------------------------------------------------
    // 0. Extract Injected Portfolio Data
    // --------------------------------------------------------------------------
    let portfolioData = {};
    try {
        const rawJsonEl = document.getElementById('portfolio-json-data');
        if (rawJsonEl && rawJsonEl.textContent) {
            portfolioData = JSON.parse(rawJsonEl.textContent);
        }
    } catch (e) {
        console.warn('Could not parse portfolio JSON:', e);
    }

    // --------------------------------------------------------------------------
    // 1. Theme Switcher (Dark / Light Mode)
    // --------------------------------------------------------------------------
    const htmlEl = document.documentElement;
    const themeBtn = document.getElementById('theme-toggle-btn');
    const savedTheme = localStorage.getItem('mohit_portfolio_theme') || 'dark';

    function setTheme(theme) {
        htmlEl.setAttribute('data-theme', theme);
        localStorage.setItem('mohit_portfolio_theme', theme);
    }

    setTheme(savedTheme);

    themeBtn?.addEventListener('click', () => {
        const currentTheme = htmlEl.getAttribute('data-theme') || 'dark';
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        setTheme(newTheme);
        showToast(`Switched to ${newTheme === 'dark' ? 'Dark' : 'Light'} Mode`);
    });

    // --------------------------------------------------------------------------
    // 2. Mobile Menu Toggle
    // --------------------------------------------------------------------------
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const navMenu = document.getElementById('nav-menu');

    mobileBtn?.addEventListener('click', () => {
        const isOpen = navMenu.classList.toggle('open');
        mobileBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });

    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            if (navMenu && navMenu.classList.contains('open')) {
                navMenu.classList.remove('open');
                mobileBtn?.setAttribute('aria-expanded', 'false');
            }
        });
    });

    // --------------------------------------------------------------------------
    // 3. Scrollspy, Sticky Header & Back-to-Top
    // --------------------------------------------------------------------------
    const header = document.getElementById('header');
    const backToTop = document.getElementById('back-to-top');
    const sections = document.querySelectorAll('section[id]');
    const navLinks = [...document.querySelectorAll('.nav-link')];
    const navLinksBySection = new Map(navLinks.map(link => [link.hash.slice(1), link]));
    navLinksBySection.set('hero', document.getElementById('nav-hero-link'));
    let activeNavLink = document.querySelector('.nav-link.active');
    let scrollTicking = false;

    // IntersectionObserver-based Scrollspy (Zero Forced Reflow)
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const nextLink = navLinksBySection.get(entry.target.id);
                    if (nextLink && nextLink !== activeNavLink) {
                        navLinks.forEach(link => link.classList.toggle('active', link === nextLink));
                        activeNavLink = nextLink;
                    }
                }
            });
        }, { rootMargin: '-20% 0px -70% 0px' });

        sections.forEach(sec => observer.observe(sec));
    }

    window.addEventListener('scroll', () => {
        if (!scrollTicking) {
            requestAnimationFrame(() => {
                const scrollPos = window.scrollY;

                // Sticky Header shadow
                if (header) {
                    header.style.boxShadow = scrollPos > 40 ? '0 8px 24px rgba(0, 0, 0, 0.2)' : 'none';
                }

                // Back to top button visibility
                if (backToTop) {
                    backToTop.classList.toggle('visible', scrollPos > 350);
                }

                scrollTicking = false;
            });
            scrollTicking = true;
        }
    }, { passive: true });

    backToTop?.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    document.getElementById('brand-logo')?.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
        if (window.history && window.history.replaceState) {
            window.history.replaceState(null, null, window.location.pathname);
        }
    });

    document.getElementById('nav-hero-link')?.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
        if (window.history && window.history.replaceState) {
            window.history.replaceState(null, null, window.location.pathname);
        }
    });

    // --------------------------------------------------------------------------
    // 5. Project Filtering
    // --------------------------------------------------------------------------
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const filter = btn.dataset.filter;
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            document.querySelectorAll('.project-card').forEach(card => {
                const category = card.dataset.category;
                if (filter === 'all' || category === filter) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // --------------------------------------------------------------------------
    // 6. Project Case Study Modal & Resume Modal
    // --------------------------------------------------------------------------
    const projectModal = document.getElementById('project-modal');
    const resumeModal = document.getElementById('resume-modal');

    function openModal(modal) {
        if (!modal) return;
        modal.classList.add('open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modal) {
        if (!modal) return;
        modal.classList.remove('open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    document.addEventListener('click', (e) => {
        // View project button
        const viewBtn = e.target.closest('.btn-view-project');
        if (viewBtn) {
            e.preventDefault();
            const projectId = viewBtn.dataset.projectId;
            const projectsList = portfolioData.projects || [];
            const project = projectsList.find(p => p.id === projectId);

            if (!project) return;

            const titleEl = document.getElementById('modal-project-title');
            const badgeEl = document.getElementById('modal-project-badge');
            const catEl = document.getElementById('modal-project-cat');
            const descEl = document.getElementById('modal-project-desc');
            const urlEl = document.getElementById('modal-project-url');
            const extLinkEl = document.getElementById('modal-external-link');
            const achieveList = document.getElementById('modal-project-achievements');
            const stackWrap = document.getElementById('modal-project-stack');

            if (titleEl) titleEl.textContent = project.title || '';
            if (badgeEl) badgeEl.textContent = project.badge || 'Case Study';
            if (catEl) catEl.textContent = project.category_label || '';
            if (descEl) descEl.textContent = project.description || project.summary || '';

            if (urlEl) {
                if (project.url && project.url !== '#') {
                    urlEl.innerHTML = `<a href="${project.url}" target="_blank" rel="noopener noreferrer">${project.url_display || project.url} <i class="fa-solid fa-arrow-up-right-from-square"></i></a>`;
                    if (extLinkEl) {
                        extLinkEl.href = project.url;
                        extLinkEl.style.display = 'inline-flex';
                    }
                } else {
                    urlEl.textContent = project.url_display || 'Enterprise Custom Implementation';
                    if (extLinkEl) extLinkEl.style.display = 'none';
                }
            }

            if (achieveList) {
                achieveList.innerHTML = '';
                (project.achievements || []).forEach(item => {
                    const li = document.createElement('li');
                    li.textContent = item;
                    achieveList.appendChild(li);
                });
            }

            if (stackWrap) {
                stackWrap.innerHTML = '';
                (project.stack || []).forEach(tech => {
                    const span = document.createElement('span');
                    span.className = 'stack-badge';
                    span.textContent = tech;
                    stackWrap.appendChild(span);
                });
            }

            openModal(projectModal);
            return;
        }

        // Open resume modal
        if (e.target.closest('#btn-open-resume-modal')) {
            openModal(resumeModal);
            return;
        }

        // Print resume
        if (e.target.closest('#btn-print-resume')) {
            window.print();
            return;
        }

        // Modal close buttons
        if (e.target.closest('.modal-close-btn') || e.target.closest('.modal-close-action') || e.target.closest('#resume-modal-close-btn') || e.target.closest('#resume-modal-close-action')) {
            closeModal(e.target.closest('.modal-overlay'));
            return;
        }

        // Modal backdrop click
        if (e.target.classList.contains('modal-overlay')) {
            closeModal(e.target);
            return;
        }

        // Quick Copy buttons
        const copyBtn = e.target.closest('.copy-btn');
        if (copyBtn) {
            const textToCopy = copyBtn.dataset.copy;
            if (textToCopy) {
                copyText(textToCopy, `Copied: ${textToCopy}`);
            }
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeModal(document.querySelector('.modal-overlay.open'));
        }
    });

    // --------------------------------------------------------------------------
    // 7. Developer Code Lab Tabs & Copy
    // --------------------------------------------------------------------------
    document.querySelectorAll('.code-tab-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const targetId = btn.dataset.target;
            document.querySelectorAll('.code-tab-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            document.querySelectorAll('.code-snippet-panel').forEach(p => p.classList.remove('active'));
            document.getElementById(targetId)?.classList.add('active');
        });
    });

    document.getElementById('btn-copy-active-code')?.addEventListener('click', () => {
        const activeCode = document.querySelector('.code-snippet-panel.active code')?.textContent || '';
        copyText(activeCode, 'Code snippet copied to clipboard!');
    });

    function copyText(text, msg) {
        if (navigator.clipboard) {
            navigator.clipboard.writeText(text).then(() => showToast(msg));
        } else {
            const ta = document.createElement('textarea');
            ta.value = text;
            ta.style.position = 'fixed';
            ta.style.opacity = '0';
            document.body.appendChild(ta);
            ta.select();
            document.execCommand('copy');
            document.body.removeChild(ta);
            showToast(msg);
        }
    }

    // --------------------------------------------------------------------------
    // 8. Toast Notification System
    // --------------------------------------------------------------------------
    function showToast(message, type = 'success') {
        const container = document.getElementById('toast-container');
        if (!container) return;

        const iconClass = type === 'success' ? 'fa-circle-check' : 'fa-circle-exclamation';
        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;
        toast.innerHTML = `<i class="fa-solid ${iconClass}"></i><span>${message}</span>`;
        container.appendChild(toast);

        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transition = 'opacity 0.3s ease';
            setTimeout(() => toast.remove(), 300);
        }, 3500);
    }

    // --------------------------------------------------------------------------
    // 9. Contact Form Email Draft
    // --------------------------------------------------------------------------
    const contactForm = document.getElementById('portfolio-contact-form');
    const alertBox = document.getElementById('form-alert-container');

    contactForm?.addEventListener('submit', (e) => {
        e.preventDefault();

        document.querySelectorAll('.field-error').forEach(el => el.textContent = '');
        if (alertBox) {
            alertBox.style.display = 'none';
            alertBox.className = 'form-alert-box';
            alertBox.innerHTML = '';
        }

        const name = (document.getElementById('contact-name')?.value || '').trim();
        const email = (document.getElementById('contact-email')?.value || '').trim();
        const subject = document.getElementById('contact-subject')?.value || '';
        const message = (document.getElementById('contact-message')?.value || '').trim();

        let hasError = false;

        if (name.length < 2) {
            const err = document.getElementById('name-error');
            if (err) err.textContent = 'Please enter your full name (minimum 2 characters).';
            hasError = true;
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            const err = document.getElementById('email-error');
            if (err) err.textContent = 'Please enter a valid email address.';
            hasError = true;
        }

        if (message.length < 10) {
            const err = document.getElementById('message-error');
            if (err) err.textContent = 'Please provide a message with at least 10 characters.';
            hasError = true;
        }

        if (hasError) return;

        const emailSubject = encodeURIComponent(`Portfolio inquiry: ${subject}`);
        const emailBody = encodeURIComponent(`Name: ${name}\nEmail: ${email}\n\n${message}`);

        if (alertBox) {
            alertBox.className = 'form-alert-box alert-success';
            alertBox.innerHTML = '<i class="fa-solid fa-circle-check"></i> Your email app should open with this draft. Send it there to complete delivery.';
            alertBox.style.display = 'flex';
        }

        window.location.href = `mailto:rathodmohit149@gmail.com?subject=${emailSubject}&body=${emailBody}`;
    });
});
