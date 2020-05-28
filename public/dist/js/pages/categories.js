$(function () {
    "use strict";

    var tbl = $('#tbl').DataTable({
        dom: "<'row'<'col-sm-5'l><'col-sm-4'B><'col-sm-3 text-align-right'f>>" + '<t>' + "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        // lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
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
            { data: "name" },
            { data: "description" },
            {
                data: null,
                render: function (data, type, row, val, meta) {                    								
                    var edit_btn = '<button type="button" onclick="GetForm(' + row.id +',\'edit\',\'category\')" class="btn btn-warning btn-flat"><i class="fas fa-edit"></i></button>';      
                    var delete_btn = '<button type="button" onclick="DeleteModel(' + row.id +',\'category\')" class="btn btn-danger btn-flat"><i class="fas fa-trash"></i></button>';      
                    return '<div class="text-center">'+edit_btn+delete_btn+'</div>' ;
                }
            },
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
