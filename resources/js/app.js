

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const themeSelectors = document.querySelectorAll('[data-theme-selector]');
const availableThemes = new Set(
    Array.from(themeSelectors[0]?.options ?? [], (option) => option.value),
);
const storedTheme = localStorage.getItem('blog-theme');
const initialTheme = availableThemes.has(storedTheme) ? storedTheme : 'cyberpunk';

document.documentElement.dataset.theme = initialTheme;

themeSelectors.forEach((selector) => {
    selector.value = initialTheme;
    selector.addEventListener('change', () => {
        const theme = selector.value;

        if (!availableThemes.has(theme)) {
            return;
        }

        document.documentElement.dataset.theme = theme;
        localStorage.setItem('blog-theme', theme);
        themeSelectors.forEach((otherSelector) => {
            otherSelector.value = theme;
        });
    });
});
