"use strict";
$(document).ready(function () {
    KTDatatablesDataSourceAjaxServer.init();

    $("#filter-form").on("submit", function (e) {
        e.preventDefault();
        $("#kt_transfers-datatable").DataTable().draw();
    });
    $("#clear-btn").on("click", function () {
        $("#filter-form")[0].reset();
        $("#kt_transfers-datatable").DataTable().draw();
    });
});

var KTDatatablesDataSourceAjaxServer = (function () {
    var initTable = function () {
        var table = $("#kt_transfers-datatable");
        // begin first table
        $("#kt_transfers-datatable").dataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    className: 'btn btn-primary',
                    
                    text: 'Export to Excel',
                    action: function (e, dt, button, config) {
                    var from_date = $('#from_date').val();
                    var to_date = $('#to_date').val();
                    var amount_operator = $('#amount_operator').val();
                    var amount = $('#amount').val();
                    var url = tranfersRoutes.exportExcel + '?from_date=' + from_date + '&to_date=' + to_date + '&amount_operator=' + amount_operator + '&amount=' + amount;
                    window.location.href = url;
                }
                }
            ],
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[0, "desc"]],
            ajax: {
                url: tranfersRoutes.datatable,
                type: "get",
                data: function (d) {
                        (d.from_date = $("#from_date").val()),
                        (d.to_date = $("#to_date").val()),
                        (d.amount_operator = $("#amount_operator").val()),
                        (d.amount = $("#amount").val());
                },
            },
            columns: [
                { data: "id", name: "id" },
                { data: "merchant_name" },
                { data: "account_number" },
                { data: "merchant_balance_before" },
                { data: "merchant_balance_after" },
                { data: "deduction_entered" },
                { data: "deduction_fixed" },

                { data: "wallet_balance_before" },
                { data: "wallet_balance_after" },
                { data: "code" },

                { data: "created_at.display" },
            ],
            columnDefs: [
                {
                    targets: [-1],
                    className: "d-flex justify-content-center",
                },
            ],
        });
    };

    return {
        //main function to initiate the module
        init: function () {
            initTable();
        },
    };
})();
