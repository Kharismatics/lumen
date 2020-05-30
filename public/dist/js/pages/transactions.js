$(function () {
    "use strict";

    var tbl = $('#tbl').DataTable({
        dom: "<'row'<'col-sm-5'l><'col-sm-4'B><'col-sm-3 text-align-right'f>>" + '<t>' + "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        pageLength: 10,
        processing: true,
        language:
        {
            processing: '<i class="fa fa-spinner fa-pulse fa-fw"></i><span> &nbsp Loading...</span> '
        },
        ajax: {
            url: ROUTES,
            dataSrc: '',
            type: 'POST',
            data: function (param) {
                param.api_token = API_KEY;
            }
        },
        columns: [
            { data: "id" },
            { data: "user.name" },
            { data: "product.name" },
            { data: "transaction_date" },
            { data: "product.price" },
            { data: "quantity" },
            { data: "discount" },
            { data: "shipping_cost" },
        ],
        buttons: [
            {
                extend: "copy",
                text: '<i class="fa fa-copy"></i>',
                className: 'btn btn-flat',
                titleAttr: 'Copy',
                exportOptions: {
                    columns: ':visible',
                    rows: ':visible'
                }
            },
            {
                extend: "excel",
                key: 'x',
                text: '<i class="fa fa-file-excel-o"</i>',
                className: 'btn btn-flat',
                titleAttr: 'Export to Excel',
                exportOptions: {
                    columns: ':visible',
                    rows: ':visible'
                }
            },
            {
                extend: "pdf",
                key: 'f',
                text: '<i class="fa fa-file-pdf-o"></i>',
                className: 'btn btn-flat',
                titleAttr: 'Export to pdf',
                exportOptions: {
                    columns: ':visible',
                    rows: ':visible'
                }
            }
        ]
    });
});
