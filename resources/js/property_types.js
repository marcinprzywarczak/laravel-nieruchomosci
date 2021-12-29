const { default: Swal } = require('sweetalert2');

require('datatables.net-bs5');
require('datatables.net-buttons-bs5');
require('datatables.net-buttons/js/buttons.colVis.js');
window.JSZip = require('jszip');
require('datatables.net-buttons/js/buttons.html5.js')();
require('datatables.net-buttons/js/buttons.print.js')();

$(function()
{
    $('table').DataTable(
        {
            "language" : 
            {
                "url" : "vendor/datatables/i18n/" + config.locale + ".json"
            },
        
            dom: 'Bfrtipl',
            buttons: [
                {
                    extend: 'excelHtml5'
                },
                {
                    extend: 'print',
                    exportOption: {}
                },
                {
                    extend: 'colvis',
                    columns: ':not(.always-visible)',
                    exportOptions: {
                        columns: ':visible(:not(:last-child)'
                    },
                    collectionLayout: 'three-column',
                }
            ]
        
    });
});

require('./vendor/jsvalidation/js/jsvalidation');


$('form[name=delete-item]').on('submit', function(e)
{
    console.log("alalala");
    e.preventDefault();
    const data = $(e.currentTarget).data();
    const message = !_.isNil(data.message) ? data.message : 'NO_MESSAGE_PROVIDED';
    const icon = !_.isNil(data.icon) ? data.icon : 'warning';
    const confirmText = !_.isNil(data.confirmText) ? data.confirmText : 'Yes';
    const confirmClass = !_.isNil(data.confirmClass) ? data.confirmClass : '';
    const cancelText = !_.isNil(data.cancelText) ? data.cancelText : 'No';
    const cancelClass = !_.isNil(data.cancelClass) ? data.cancelClass : '';
    
    Swal.mixin({
        customClass: {
            confirmButton: confirmClass,
            cancelButton: cancelClass
        },
        buttonsStyling: false
    }).fire({
        text: message,
        showCancelButton: true,
        confirmButtonText: confirmText,
        cancelButtonText: cancelText,
        focusCancel: true,
        icon: icon
    }).then((result) => {
        if(result.value){
            this.submit()
        }
    });
});