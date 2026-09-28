document.addEventListener('DOMContentLoaded', async function () {
    const placeholders = Array.from(document.querySelectorAll('[data-include]'));

    try {
        await Promise.all(placeholders.map(async function (placeholder) {
            const response = await fetch(placeholder.dataset.include);
            if (!response.ok) {
                throw new Error(`Could not load ${placeholder.dataset.include}`);
            }

            placeholder.insertAdjacentHTML('beforebegin', await response.text());
            placeholder.remove();
        }));

        const appScript = document.createElement('script');
        appScript.src = 'assets/js/main.js';
        document.body.appendChild(appScript);
    } catch (error) {
        console.error('Page components failed to load:', error);
        const toast = document.getElementById('toast-container');
        if (toast) {
            toast.textContent = 'Some page content could not be loaded. Please refresh the page.';
        }
    }
});