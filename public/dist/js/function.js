function GetAjaxDataSingle(elem, url, param) {
    $.ajax({
        dataType: "json",
        url: url,
        data: param,
        type: "post",
        beforeSend: function () {
            $(elem).html(
                '<div class="spinner-border text-danger" role="status"></div>'
            );
        },
        success: function (json) {
            $(elem).empty();
            $.each(json, function (index, value) {
                $(elem).append(value.aggregate);
            });
        },
        error: function (data) {
            $(elem).html("error");
        }
    });
}

const Toast = Swal.mixin({
    toast: true,
    position: "bottom",
    showConfirmButton: false,
    timer: 3000
});

function GetForm(rowId = null, mode, table) {
    model = mode;
    $(".invalid-feedback").remove()
    $("input").removeClass('is-invalid')
    $("#myModal").modal("show");
    $.ajax({
        url: "/form",
        data: { api_token: API_KEY, id: rowId, mode: mode, table: table },
        type: "post",
        beforeSend: function () {
            $("#form")[0].reset();
            // $("#form").empty();
        },
        success: function (data) {
            var form = '<div class="form-group">';
            form += '<input type="hidden" class="form-control" id="id" value="' + rowId + '" placeholder="Enter id"/>';
            $.each(data, function (index, value) {
                form += '<label for="' + value + '">' + value + '</label><input type="text" class="form-control" id="' + value + '" value="' + value + '" placeholder="Enter ' + value + '"/>';
            });
            form += '</div>';
            //   console.log(form);
            //   $('#form').append(form); 


        },
        error: function (data) { }
    });



    $('#SubmitButton').click(function (e) {

        e.preventDefault();
        e.stopImmediatePropagation();
        var data = {};
        $("form#form :input").each(function () {
            var input = $(this);
            data[input.attr('id')] = input.val();
        });
        // console.log(data);

        if (model == 'add') {
            StoreModel(table, data);
        }
        if (model == 'edit') {
            UpdateModel();
        }

    })
}
function StoreModel(table, data) {
    console.log('store');
    data['api_token'] = API_KEY;
    $.ajax({
        url: "/" + table + "_store",
        data: data,
        type: "post",
        beforeSend: function () { },
        success: function (data) {
            $("#myModal").modal("hide");
            $("#tbl")
                .DataTable()
                .ajax.reload();
            Toast.fire({
                type: "success",
                title: "Success, Your Data Has Changed"
            });
        },
        error: function (data) {
            $(".invalid-feedback").remove()
            $("input").removeClass('is-invalid')
            $.each(data.responseJSON, function (index, value) {
                console.log(value);
                $("#" + index).addClass('is-invalid')
                $.each(value, function (key, val) {
                    $("#" + index).after('<div class="invalid-feedback">' + val + '</div>')
                })
            })

            $("#tbl")
                .DataTable()
                .ajax.reload();
            Toast.fire({
                type: "error",
                title: " Ups, Something Wrong"
            });
            // $("#myModal").addClass("was-validated"); 
        }
    });


}
function UpdateModel() {
    console.log('update');
    $("#myModal").modal("hide");


}
function DeleteModel(rowId = null, table) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then(result => {
        if (result.value) {
            $.ajax({
                url: "/" + table + "_delete",
                data: { api_token: API_KEY, id: rowId },
                type: "post",
                beforeSend: function () { },
                success: function (data) {
                    $("#tbl")
                        .DataTable()
                        .ajax.reload();
                    Toast.fire({
                        type: "success",
                        title: "Success, Your Data Has Changed"
                    });
                },
                error: function (data) {
                    $("#tbl")
                        .DataTable()
                        .ajax.reload();
                    Toast.fire({
                        type: "error",
                        title: "Something Wrong"
                    });
                }
            });
        }
    });
}

function BuildChartJS(elem, url, param) {
    $.ajax({
        dataType: "json",
        url: url,
        data: param,
        type: "post",
        beforeSend: function () {
            // $(elem).html(
            //     '<div class="spinner-border text-danger" role="status"></div>'
            // );
        },
        success: function (json) {
            var obj = json;
            var firstobj = obj[Object.keys(obj)[0]];
            var label = firstobj.map((item) => (item['dates']));
            var dataset = [];
            $.each(json, function (index, value) {
                var Mcolor = 'rgba(255, 235, 59, 0.7)';
                if (index == 'IN') {
                    Mcolor = 'rgba(3, 169, 244, 0.7)';
                }
                if (index == 'OUT') {
                    Mcolor = 'rgba(76, 175, 80, 0.7)';
                }
                dataset.push({
                    label: index,
                    data: value.map((item) => (item['result'])),
                    borderWidth: 2,
                    backgroundColor: Mcolor,
                    borderWidth: 0,
                    borderColor: 'transparent',
                    pointBorderWidth: 0,
                    pointRadius: 3.5,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
                })
            })

            var CtxCanvas = $(elem)
                .get(0)
                .getContext("2d");
            var CtxData = {
                labels: label,
                datasets: dataset
            };
            var CtxOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [
                        {
                            gridLines: {
                                display: false
                            }
                        }
                    ],
                    yAxes: [
                        {
                            gridLines: {
                                display: false
                            }
                        }
                    ]
                }
            };
            // This will get the first returned node in the jQuery collection.
            var Ctx = new Chart(CtxCanvas, {
                type: "line",
                data: CtxData,
                options: CtxOptions
            });
        },
        error: function (data) {
            $(elem).html("error");
        }
    });
}