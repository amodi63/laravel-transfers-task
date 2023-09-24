"use strict"; 
$(document).ready(function() {
    
    $('#transfer-form').validate({
        rules: {
            amount: {
                required: true,
                number: true,
                min: 1
            },
            merchant_id: {
                required: true,
            },
        },
        messages: {
            amount: {
                required: "Amount is required",
                number: "Amount must be a number",
                min: "Amount must be greater than 0"
            },
            merchant_id: {
                required: "Merchant is required",
            },
        },
        errorElement: "span",
        errorClass: "text-danger",
        //make error placement for input marchant_id
        // i want put under select2
         
        errorPlacement: function(error, element) {
            if (element.attr("name") == "merchant_id") {
                error.insertAfter(".merchant_error");
            } else {
                error.insertAfter(element);
            }
        },
        


        submitHandler: function(form) {
            
            form.submit();
        }
    });
    //Begin Ajax Add Transfer
    $('#saveTransferBtn').on('click', function() {
            let url = $('#transfer-form').attr('action');
        if ($('#transfer-form').valid()) {
        $('#saveTransferBtn').html('Saving...');
        $('#saveTransferBtn').attr('disabled', true);
        $('.text-danger').html('');
        var _data = new FormData($('#transfer-form')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }   
        });
        $.ajax({
            url:url,
            data: _data,
            method: 'POST',
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('#saveTransferBtn').attr("disabled", true);
                $('.spinner').show();
              },
            success: function(response) {
                $('#saveTransferBtn').attr('disabled', false);
                $('#saveTransferBtn').html('Save');
                $('.transferModal').modal('hide');
                if (response) {
                    toastr.success(response.message);
                    resetForm();
                    $('.transfers-table').html( response.html);
                }
            },
            error: function(error) {
                $('#saveTransferBtn').attr('disabled', false);
                $('#saveTransferBtn').html('Save');
                toastr.error(error.responseJSON.message)
            }
        })
        }
    
    });

    //End Ajax Add Transfer

    //Begin Ajax Delete Transfer
    $('body').on('click', '.userDelBtn', function() {
        let transferID = $(this).data('id');
        let _url = $(this).data('url'); 
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.value) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: _url,
                    method: "DELETE",
                    
                    success: function(response) {
                        
                        toastr.success(response.message);
                        $('.transfers-table').html( response.html);
                    },
                    error: function(error) {
                        toastr.error('Somthing Error Try Again Later!')
                    }
                })
            }
        });


    })
    //End Ajax Delete Transfer

    //Begin Ajax Clear Form
    $(document).on('click', '#clearBtn', function (e) {
        e.preventDefault();
        resetForm();
      })

    //End Ajax Clear Form

});

function resetForm() {
      $('#amount').val('');
        $('#deduction_entered').val('');

      $('[name=merchant_id]').val('').trigger('change');

    }
//make js to give new page when click on pagination
$(document).on('click', '.pagination a', function(e) {
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    getTransfers(page);
});

