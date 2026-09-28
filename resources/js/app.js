import Alpine from 'alpinejs';
import { createIcons, icons } from 'lucide';

window.Alpine = Alpine;
window.createIcons = createIcons;
window.lucideIcons = icons;

document.addEventListener('DOMContentLoaded', () => {
    createIcons({ icons });
});

// Re-run icons when Alpine updates DOM or dynamically requested
document.addEventListener('lucide:refresh', () => {
    createIcons({ icons });
});

Alpine.start();
