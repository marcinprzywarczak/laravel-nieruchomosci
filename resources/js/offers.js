require('datatables.net-bs5');

$(function ()
{
    $('table').DataTable(
        {
            ajax:{
                url: 'offers/datatable',
                type: 'POST',
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            columns:
            [
                {data: 'id', name: 'id'},
                {data: 'property_type.name', name: 'property_type.name'},
                {data: 'offer_status.name', name: 'offer_status.name'},
                {data: 'title', name: 'title'},
                {data: 'start_date', name: 'start_date'},
                {data: 'end_date', name: 'end_date'},
                {data: 'price', name: 'price'},
                {data: 'comment', name: 'comment'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'deleted_at', name: 'deleted_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
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
})