require('datatables.net-bs5');


require('datatables.net-buttons-bs5');
require('datatables.net-buttons/js/buttons.colVis.js');

const { registerConfirmAction } = require('./confirm_action');


const {tooltipActivation} = require('./tooltip_activation');

require('select2');
$.fn.select2.amd.define('select2/i18n/pl', [], require("select2/src/js/select2/i18n/pl"));

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
            stateDuration: 604800,
            dom: 'Bfrtipl',
            buttons: [
                {
                    text: 'Excel',
                    action: function(e, dt, node, conf) {
                        location.replace(config.host + "/properties/export/excel");
                    }
                },

                {
                    text: 'Pdf',
                    action: function(e, dt, node, conf) {
                        location.replace(config.host + "/properties/export/pdf");
                    }
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

    $('#property-property_type').select2({
        theme: 'bootstrap-5',
        language: config.locale,
        allowClear: true,
        ajax: {
            url: config.host + '/property_types/ajax',
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
                var data = $.map(response, function(property_type)
                {
                    property_type.text = property_type.text || property_type.name;
                    return property_type;
                });
                return {
                    results: data
                };
            }
        }
    });
});

require('./vendor/jsvalidation/js/jsvalidation');

