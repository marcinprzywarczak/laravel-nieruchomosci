require('datatables.net-bs5');
const { registerConfirmAction } = require('./confirm_action');


const {tooltipActivation} = require('./tooltip_activation');

$(function ()
{
    $('table').DataTable(
        {
            ajax:{
                url: 'properties/datatable',
                type: 'POST',
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            columns:
            [
                {data: 'id', name: 'id'},
                {data: 'address', name: 'address'},
                {data: 'property_type.name', name: 'property_type.name'},
                {data: 'area_square_meters', name: 'area_square_meters'},
                {data: 'rooms', name: 'rooms'},
                {data: 'floor', name: 'floor'},
                {data: 'number_of_floor', name: 'number_of_floor'},
                {data: 'description', name: 'description'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'deleted_at', name: 'deleted_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            drawCallback: function (setting)
            {
                registerConfirmAction();
                var table = document.getElementsByTagName('table')[0];
                if(!_.isNil(table)){
                    tooltipActivation(table);
                }
            },
            language: 
            {
                "url": "vendor/datatables/i18n/" + config.locale + ".json"
            },
            processing: true,
            serverSide: true,
            pageLength: 10,
            lengthMenu: [[10,50,100,200], [10, 50, 100, 200]],
            stateSave: true,
            stateDuration: 604800
        }
    )
});

require('./vendor/jsvalidation/js/jsvalidation');

