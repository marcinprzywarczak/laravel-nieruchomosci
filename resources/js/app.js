window._ = require('lodash');

//require('./bootstrap');
//require('alpinejs');
window.$ = window.jQuery = require('jquery');
window.bootstrap = require('bootstrap');

const {tooltipActivation} = require('./tooltip_activation');

var toastElList = [].slice.call(document.querySelectorAll('.toast'));

var toastList = toastElList.map(function (toastEl)
{
    return new bootstrap.Toast(toastEl);
});
toastList.forEach(toast => toast.show());

tooltipActivation(document);


window.Swal = require('sweetalert2');
