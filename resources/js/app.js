//require('./bootstrap');
//require('alpinejs');
window.$ = window.jQuery = require('jquery');
window.bootstrap = require('bootstrap');

var toastElList = [].slice.call(document.querySelectorAll('.toast'));

var toastList = toastElList.map(function (toastEl)
{
    return new bootstrap.Toast(toastEl);
});
toastList.forEach(toast => toast.show());


var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
tooltipTriggerList.map(function (tooltipTriggerEl){
    return new bootstrap.Tooltip(tooltipTriggerEl);
});
