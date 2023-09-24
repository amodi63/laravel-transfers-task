
"use strict"; 
$(document).ready(function() {
    
    KTDatatablesDataSourceAjaxServer.init();
    
    $('#modal-title').html("Create User");
    $('#save-btn').html("Save");
    var form = $('#user-form')[0];
    //Begin Ajax Add User
    $('#save-btn').on('click', function() {
        $('#save-btn').html('Saving...');
        $('#save-btn').attr('disabled', true);

        // $('.text-danger').html('');
        var _data = new FormData(form);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: routes.store,
            data: _data,
            method: 'POST',
            processData: false,
            contentType: false,
            success: function(response) {
                $('#save-btn').attr('disabled', false);
                $('#save-btn').html('Save');
                $('#kt_users_datatable').DataTable().draw();
                $('.userModal').modal('hide');
                if (response) {
                    toastr.success(response.message);
                    $("#user-form")[0].reset();
                }
            },
            error: function(error) {
                $('#save-btn').attr('disabled', false);
                $('#save-btn').html('Save');
                $.each(error.responseJSON.errors, function(index, value) {
                    $('#' + index + '_error').html(value);
                });

            }
        })
    });
    //End Ajax Add User

 

 

    //Begin Ajax Edit User
    $('body').on('click', '.userEditBtn', function() {
       
   
        let _url = $(this).data('url'); 
        
        $.ajax({
            url: _url,
            method: 'GET',
           
            success: function(response) {
                $('#modal-title').html("Edit User");
                $('#save-btn').html("Update User");
                $('#first_name').val(response.data.first_name);
                $('#last_name').val(response.data.last_name);
                $('#email').val(response.data.email);
                $('#phone').val(response.data.profile.phone);
                $('#address').val(response.data.profile.address);
                $('#date_of_birth').val(response.data.profile.date_of_birth);
                $('#username').val(response.data.profile.username);
                $('#id_no').val(response.data.profile.id_no);
                $('#city').val(response.data.profile.city);
                $('#job_title').val(response.data.profile.job_title);
                
                $('#gender').val(response.data.profile.gender).selectpicker('refresh');
                $('#user_id').val(response.data.id);
            
            
                   
                    $('#kt_image_5').css('background-image', 'url(' + response.data.profile.profile_image + ')');
              
               
                $('.userModal').modal('show');

            }

        })


    });

    $('#add_user').click(function() {

        $('#modal-title').html("Create User");
        $('#save-btn').html("Save Changes");
    });
    //End Ajax Edit User

    //Begin Ajax Delete User
    $('body').on('click', '.userDelBtn', function() {
        let userID = $(this).data('id');
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
                    data: {
                        'user': userID
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        $('#kt_users_datatable').DataTable().draw();
                    },
                    error: function(error) {
                        toastr.error('Somthing Error Try Again Later!')
                    }
                })
            }
        });


    })
    //End Ajax Delete User
    $('.userModal').on('hidden.bs.modal', function() {
    
        $('.text-danger').html('');
        $('#gender').val("").selectpicker('refresh');
        $('#user-form')[0].reset();
        $('#user-form #user_id').val("");
        $('#kt_image_5').css('background-image', 'url(' + baseUrl + '/assets/media/users/blank.png)');
       


    })
    $('body').on('click', '.userRoleBtn', function() { 
   
        let _url = $(this).data('url'); 
        $.ajax({
            url: _url,
            method: 'GET',
            beforeSend: function() {
                $("#modal-role-title").html("User Role");
                $("#save-role-btn").html("Save Changes");
            }
            ,
            success: function(response) {
                $('.role-body').html(response.html);
                $('.roleModal').modal('show');

            }


        })
    });
    $('body').on('click', '#save-role-btn', function() {
             
        let _data = $('#role-form').serialize();
        let _url = '/roles/user/store/'+$('#role-form #user_id').val(); 

        debugger;
        $.ajax({
            url: _url,
            method: 'POST',
            data: _data,
            beforeSend: function() {
                $("#save-role-btn").html("Saving...");
                $("#save-role-btn").attr('disabled', true);
            },
            success: function(response) {
                toastr.success(response.message);
                $('.roleModal').modal('hide');
            },
            complete:function(){   
                $("#save-role-btn").html("Save Changes");
                $("#save-role-btn").attr('disabled', false);
            },
            error: function(error) {
                toastr.error('Somthing Error Try Again Later!')
            }
        })
    });

})

var KTDatatablesDataSourceAjaxServer = function() {

	var initTable1 = function()  {
		var table = $('#kt_users_datatable');
    
		// begin first table	
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			order:[[0,"desc"]],
			ajax: {
				url: routes.list,
				type: 'get',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'full_name', 'email','phone',
						'gender','date_of_birth', 'created_at', 'action'
						
					],
				},
			},
			columns: [
				{ data: "DT_RowIndex", name: "DT_RowIndex"},
				{data: 'profile_image',render: function(data, type, row, meta) {
                    
                    return "<img height='60' width='60' src='" + row.profile.profile_image+ "'>";
                }},
			
				{data: 'full_name'},
				{data: 'email'},
				{data: 'phone',render: function(data, type, row, meta) {
                    if(!row.phone) {
                        return '<span class="text-danger">Not Set</span>'; ;
                    }
                    return row.phone;
                }},
				{data: 'date_of_birth',render: function(data, type, row, meta) {
                    if(!row.date_of_birth) {
                        return '<span class="text-danger">Not Set</span>'; ;
                    }
                    return row.date_of_birth;
                }},
			
				{data: 'created_at.display'},
				{data:'action'}
				
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

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		},

	};

}();

