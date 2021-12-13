require('datatables.net-bs5');
require('select2');
$.fn.select2.amd.define('select2/i18n/pl', [], require("select2/src/js/select2/i18n/pl"));

$(function()
{
    console.log(config.host + "/vendor/datatables/i18n/" + config.locale + ".json");
    $('table').DataTable(
        {
            "language" : 
            {
                "url" : config.host + "/vendor/datatables/i18n/" + config.locale + ".json"
            }
        }
        
    );

    $('.select2').select2({
        theme: 'bootstrap-5',
        language: config.locale,
        allowClear: true
    }
    )
});

require('./vendor/jsvalidation/js/jsvalidation');