require('datatables.net-bs5');

$(function()
{
    $('table').DataTable(
        {
            "language" : 
            {
                "url" : "vendor/datatables/i18n/" + config.locale + ".json"
            }
        }
        
    );
});

require('./vendor/jsvalidation/js/jsvalidation');