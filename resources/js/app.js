import './bootstrap';

import Alpine from 'alpinejs';
import flatpickr from 'flatpickr';
import 'flatpickr/dist/l10n/id';

window.Alpine = Alpine;
window.flatpickr = flatpickr;

Alpine.start();

// Initialize Flatpickr for all date inputs
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.flatpickr-date').forEach(element => {
        flatpickr(element, {
            enableTime: false,
            dateFormat: 'Y-m-d',
            locale: 'id'
        });
    });
});
