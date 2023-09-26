"use strict";

// Class Definition
var KTLogin = function() {
	var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';

	var _handleFormSignin = function() {
		var form = KTUtil.getById('login-form');
		var formSubmitUrl = KTUtil.attr(form, 'action');
		var formSubmitButton = KTUtil.getById('login-form-btn');

		if (!form) {
			return;
		}

		FormValidation
		    .formValidation(
		        form,
		        {
		            fields: {
						username: {
							validators: {
								notEmpty: {
									message: 'Username is required'
								}
							}
						},
						password: {
							validators: {
								notEmpty: {
									message: 'Password is required'
								}
							}
						}
		            },
		            plugins: {
						trigger: new FormValidation.plugins.Trigger(),
						submitButton: new FormValidation.plugins.SubmitButton(),
	            		//defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
						bootstrap: new FormValidation.plugins.Bootstrap({
						//	eleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons
						//	eleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons
						})
		            }
		        }
		    )
		    .on('core.form.valid', function() {
				// Show loading state on button
				KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, "Please wait");
			
				// Create an object with form data
				var formData = {
					username: form.querySelector('[name="username"]').value,
					password: form.querySelector('[name="password"]').value,
					_token: form.querySelector('[name="_token"]').value,

				};
		
				// Make an AJAX request
				$.ajax({
					url: formSubmitUrl,
					type: 'POST',
					dataType: 'json',
					data: formData,
					success: function (response) {
						// Release button
						KTUtil.btnRelease(formSubmitButton);
			
						if (response) {
							window.location.href = routes.home_url;
						} else {
					
							Swal.fire({
								text: "Sorry, something went wrong, please try again.",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn font-weight-bold btn-light-primary"
								}
							}).then(function () {
								KTUtil.scrollTop();
							});
						}
					},
					error: function (error) {
						// Release button
						KTUtil.btnRelease(formSubmitButton);
			
						Swal.fire({
							text: error.responseJSON.message,
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light-primary"
							}
						});
					}
				});
			})
			
			.on('core.form.invalid', function() {
				Swal.fire({
					text: "Sorry, looks like there are some errors detected, please try again.",
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "Ok, got it!",
					customClass: {
						confirmButton: "btn font-weight-bold btn-light-primary"
					}
				}).then(function() {
					KTUtil.scrollTop();
				});
		    });
    }

	var _handleFormForgot = function() {
		var form = KTUtil.getById('kt_login_forgot_form');
		var formSubmitUrl = KTUtil.attr(form, 'action');
		var formSubmitButton = KTUtil.getById('login-form-btn');

		if (!form) {
			return;
		}

		FormValidation
		    .formValidation(
		        form,
		        {
		            fields: {
						email: {
							validators: {
								notEmpty: {
									message: 'Email is required'
								},
								emailAddress: {
									message: 'The value is not a valid email address'
								}
							}
						}
		            },
		            plugins: {
						trigger: new FormValidation.plugins.Trigger(),
						submitButton: new FormValidation.plugins.SubmitButton(),
	            		//defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
						bootstrap: new FormValidation.plugins.Bootstrap({
						//	eleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons
						//	eleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons
						})
		            }
		        }
		    )
		    .on('core.form.valid', function() {
				// Show loading state on button
				KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, "Please wait");

				// Simulate Ajax request
				setTimeout(function() {
					KTUtil.btnRelease(formSubmitButton);
				}, 2000);
		    })
			.on('core.form.invalid', function(error) {
				Swal.fire({
					text: error.responseJSON.message,
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "Ok, got it!",
					customClass: {
						confirmButton: "btn font-weight-bold btn-light-primary"
					}
				}).then(function() {
					KTUtil.scrollTop();
				});
		    });
    }

	var _handleFormSignup = function() {
		// Base elements
		var wizardEl = KTUtil.getById('kt_login');
		var form = KTUtil.getById('register-form');
		var wizardObj;
		var validations = [];

		if (!form) {
			return;
		}

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					password: {
						validators: {
							notEmpty: {
								message: 'Password is required'
							}
						}
					},
					password_confirmation: {
						validators: {
							notEmpty: {
								message: 'Password Confirmation is required'
							}
						}
					},
					first_name: {
						validators: {
							notEmpty: {
								message: 'First Name is required'
							},
							
						}
					},
					last_name: {
						validators: {
							notEmpty: {
								message: 'Last Name is required'
							},
							
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Email is required'
							},
							emailAddress: {
								message: 'The value is not a valid email address'
							}
						}
					}

				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
		// Step 2
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					address: {
						validators: {
							notEmpty: {
								message: 'Address is required'
							}
						}
					},
					account_number:{
						validators: {
							notEmpty: {
								message: 'Account Number is required'
							},
							digits: {
								message: 'Account Number must be 12 digits',
								min: 12,
								max: 12
							},
						},
					},
					phone_number: {
						validators: {	
							notEmpty: {
								message: 'Phone Number is required'
							},
							digits: {
								message: 'Phone Number must be 10 digits',
								min: 10,
								max: 10,
							},
						},
					},
					
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
		// Initialize form wizard
		wizardObj = new KTWizard(wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: false , // allow step clicking
			

		});
		function pushDataToCompleteStep() {
			var formData = {
				email: form.querySelector('[name="email"]').value,
				address: form.querySelector('[name="address"]').value,
				first_name: form.querySelector('[name="first_name"]').value,
				last_name: form.querySelector('[name="last_name"]').value,
				address: form.querySelector('[name="address"]').value,
				account_number: form.querySelector('[name="account_number"]').value,
				phone_number: form.querySelector('[name="phone_number"]').value
				
			};
		
			$('#email-label').text(formData.email);
			$('#address-label').text(formData.address);
			
			$('#first_name-label').text(formData.first_name);
			$('#last_name-label').text(formData.last_name);
			$('#address-label').text(formData.address);
			$('#account_number-label').text(formData.account_number);
			$('#phone_number-label').text(formData.phone_number);
			
			
		}
		// Validation before going to next page
		wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			// Validate form before change wizard step
			var validator = validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						
						pushDataToCompleteStep();
						wizard.goTo(wizard.getNewStep());
						KTUtil.scrollTop();
					} else {
						KTUtil.scrollTop();
						
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		wizardObj.on('changed', function (wizard) {
			KTUtil.scrollTop();
		});

		// Submit event

		// Submit event
		wizardObj.on('submit', function (wizard) {
			// Send the form data directly as an AJAX request
			$.ajax({
				url: routes.register_url,
				type: 'POST',
				data: $(form).serialize(),
				success: function (response) {
					if (response) {
			
						Swal.fire({
							text: "Form submitted successfully!",
							icon: "success",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-primary",
							}
						}).then(function () {
							window.location.href = routes.home_url;
						});
					} else {
						// Handle server-side validation errors or other errors
						Swal.fire({
							text: "An error occurred while submitting the form.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-primary",
							}
						});
					}
				},
				error: function (error) {
					// Handle AJAX request error
					Swal.fire({
						text: error.responseJSON.message,
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-primary",
						}
					});
				}
			});
		});
		
	};


    // Public Functions
    return {
        init: function() {
            _handleFormSignin();
			_handleFormForgot();
			_handleFormSignup();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});
