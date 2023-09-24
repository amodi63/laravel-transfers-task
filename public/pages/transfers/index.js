
"use strict"; 
$(document).ready(function() {
    
    KTDatatablesDataSourceAjaxServer.init();
    clearInputs();
});

var KTDatatablesDataSourceAjaxServer = function() {
    var initTable = function()  {
        var table = $('#kt_transfers-datatable');
		// begin first table	
        $('#kt_transfers-datatable').dataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			order:[[0,"desc"]],
			ajax: {
				url: tranfersRoutes.datatable,
				type: 'get',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'code', 'user_name','merchant_name','wallet_balance_before',
						'wallet_balance_after','amount', 'created_at', 'action'
						
					],
				},
			},
			columns: [
				{ data: "DT_RowIndex", name: "DT_RowIndex"},
                {data: 'merchant_name'},
                {data: 'account_number'},
                {data: 'merchant_balance_before'},
                {data: 'merchant_balance_after'},
                {data: 'deduction_entered'},
                {data: 'deduction_fixed'},
                
                {data: 'wallet_balance_before'},
                {data: 'wallet_balance_after'},
				{data: 'code'},
			
				{data: 'created_at.display'},
				
			]
			,
			columnDefs: [
				{
					targets: [-1],
					className:"d-flex justify-content-center"
				},
			]
			
		});
	};
    $('#from_date, #to_date, #amount_operator, #amount').on('change', function() {
        var fromDate = $('#from_date').val();
    var toDate = $('#to_date').val();
    var amountOperator = $('#amount_operator').val();
    var amount = $('#amount').val();

    $.ajax({
        url: tranfersRoutes.datatable,
        type: 'GET',
        data: {
            from_date: fromDate,
            to_date: toDate,
            amount_operator: amountOperator,
            amount: amount
        },
        success: function(data) {
            $('#kt_transfers-datatable').DataTable().clear().rows.add(data).draw();
        },
        
    });
    });
	return {

		//main function to initiate the module
		init: function() {
			initTable();
		},

	};

}();
function clearInputs() {

    $('#clear-btn').on('click', function() {
        $('#from_date, #to_date, #amount').val('');
    });
}