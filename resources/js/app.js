import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import Alpine from 'alpinejs';
import.meta.glob([
    '../img/**'
]);

window.Alpine = Alpine

Alpine.start()
