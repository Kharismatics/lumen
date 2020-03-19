$(function() {
    "use strict";

    var tbl = $("#tbl").DataTable({
        dom:
            "<'row'<'col-sm-5'l><'col-sm-4'B><'col-sm-3 text-align-right'f>>" +
            "<t>" +
            "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        // lengthMenu: [
        //     [5, 10, 25, 50, -1],
        //     [5, 10, 25, 50, "All"]
        // ],
        // pageLength: 10,
        // processing: true,
        language: {
            processing:
                '<i class="fa fa-spinner fa-pulse fa-fw"></i><span> &nbsp Loading...</span> '
        },
        ajax: {
            url: "/users",
            type: "POST",
            dataSrc: function(data) {
                if (data == "no data") {
                    return [];
                } else {
                    return data;
                }
            },
            data: function(d) {
                d.api_token = API_KEY;
            }
        },
        columns: [
            { data: "id" },
            { data: "name" },
            { data: "email" },
            { data: "phone" },
            { data: "address" },
            {
                data: "id",
                width: 75,
                render: function(data, type, row, val, meta) {
                    return (
                        '<button type="button" onclick="GetForm(' +
                        row.id +
                        "," +
                        "'edit'" +
                        "," +
                        "'users'" +
                        ')"  class=" btn btn-warning"><i class="fa fa-edit"></i></button><button type="button" onclick="DeleteModel(' +
                        row.id +
                        "," +
                        "'users'" +
                        ')" class=" btn btn-danger"><i class="fa fa-trash"></i></button>'
                    );
                }
            }
        ]
    });
});
