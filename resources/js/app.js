import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import Alpine from 'alpinejs';
import alpine_validation from './alpine_validation';
import alpine_validation_form_dish from './alpine_validation_form_dish';
import.meta.glob([
    '../img/**'
]);

Alpine.data('alpine_validation', alpine_validation);
Alpine.data('alpine_validation_form_dish', alpine_validation_form_dish);

window.Alpine = Alpine;

Alpine.start();
