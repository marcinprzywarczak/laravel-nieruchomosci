require('datatables.net-bs5');
require('select2');

require('datatables.net-buttons-bs5');
require('datatables.net-buttons/js/buttons.colVis.js');
window.JSZip = require('jszip');
require('datatables.net-buttons/js/buttons.html5.js')();
require('datatables.net-buttons/js/buttons.print.js')();

const { default: Swal } = require('sweetalert2');
$.fn.select2.amd.define('select2/i18n/pl', [], require("select2/src/js/select2/i18n/pl"));

$(function()
{
    console.log(config.host + "/vendor/datatables/i18n/" + config.locale + ".json");
    $('table').DataTable(
        {
            "language" : 
            {
                "url" : config.host + "/vendor/datatables/i18n/" + config.locale + ".json"
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
        }
        
    );

    $('.select2').select2({
        theme: 'bootstrap-5',
        language: config.locale,
        allowClear: true
    }
    );

    $('#offer-offer_status').select2({
        theme: 'bootstrap-5',
        language: config.locale,
        allowClear: true,
        ajax: {
            url: config.host + '/offer_statuses/ajax',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            delay: 250,
            data: function (params)
            {
                //console.log(params.term);
                
                return {
                    search: params.term
                };
            },
            processResults: function (response)
            {
                //console.log(response);
                var data = $.map(response, function(offer_status)
                {
                    offer_status.text = offer_status.text || offer_status.name;
                    return offer_status;
                });
                return {
                    results: data
                };
            }
        }
    });

    $('#offer-property').select2({
        theme: 'bootstrap-5',
        language: config.locale,
        allowClear: true,
        ajax: {
            url: config.host + '/properties/ajax',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            delay: 250,
            data: function (params)
            {
                //console.log(params.term);
                
                return {
                    search: params.term
                };
            },
            processResults: function (response)
            {
                console.log(response);
                //console.log(property);
                var data = $.map(response, function(property)
                {
                    property.text = property.text || 'id: ' + property.id + ', adres: ' + property.address + ', typ nieruchomości: ' + property.property_type.name;
                    return property;
                });
                return {
                    results: data
                };
            }
        }
    });
});

require('./vendor/jsvalidation/js/jsvalidation');

$('form[name=delete-item]').on('submit', function(e)
{
    //console.log("alalala");
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