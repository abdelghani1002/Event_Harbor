import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function () {
    // alert
    setTimeout(() => {
        $(".alert").hide();
    }, 5000);
})
