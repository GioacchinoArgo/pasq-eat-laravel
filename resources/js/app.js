import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import Alpine from 'alpinejs';
import alpine_validation from './alpine_validation';
import.meta.glob([
    '../img/**'
]);

Alpine.data('alpine_validation', alpine_validation)

window.Alpine = Alpine

Alpine.start()
