"use strict";

// Class Definition
var validation_role;
var KTRole = function () {

  var _handleRoleForm = function (e) {

    var form = KTUtil.getById('addFrom');
    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
    validation_role = FormValidation.formValidation(
      form,
      {
        fields: {
          name: {
            validators: {
              notEmpty: {
                message: 'الاسم بالانجليزية مطلوب'
              }
            }
          },
          name_ar: {
            validators: {
              notEmpty: {
                message: 'الاسم بالعربية مطلوب'
              }
            }
          },


        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap: new FormValidation.plugins.Bootstrap()
        }
      }
    ).on('core.element.validated', function (e) {
      // e.element presents the field element
      // e.valid indicates the field is valid or not
      if (e.valid) {
        // Remove has-success from the container
        const groupEle = FormValidation.utils.closest(e.element, '.form-group');
        if (groupEle) {
          FormValidation.utils.classSet(groupEle, {
            'has-success': false,
          });
        }

        // Remove is-valid from the element
        FormValidation.utils.classSet(e.element, {
          'is-valid': false,
        });
      }
    });
  }

  return {
    // public functions
    init: function () {
      _handleRoleForm();
    }
  };
}();

// Class Initialization
jQuery(document).ready(function () {
  KTRole.init();
});
