require('datatables.net-bs5');

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
});