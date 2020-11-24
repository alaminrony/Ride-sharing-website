$(function() {

	$.validator.setDefaults({
		errorClass: 'help-block',
		highlight: function(element) {
		  $(element)
			.closest('.form-group')
			.addClass('has-error');
		},
		unhighlight: function(element) {
		  $(element)
			.closest('.form-group')
			.removeClass('has-error');
		},
		errorPlacement: function (error, element) {
		  if (element.prop('type') === 'checkbox') {
			error.insertAfter(element.parent());
		  } else {
			error.insertAfter(element);
		  }
		}
	  });
	
	  $.validator.addMethod('strongPassword', function(value, element) {
		return this.optional(element) 
		  || value.length >= 6
		  && /\d/.test(value)
		  && /[a-z]/i.test(value);
	  }, 'Your password must be at least 6 characters long and contain at least one number and one char\'.')
  
	$("#register-form").validate({
	  rules: {
		email: {
		  required: true,
		  email: true,
		},
		password: {
		  required: true,
		  strongPassword: true
		},
		password2: {
		  required: true,
		  equalTo: '#password'
		},
		name: {
			required: true,
		},
		firstName: {
		  required: true,
		  nowhitespace: true,
		  lettersonly: true
		},
		secondName: {
		  required: true,
		  nowhitespace: true,
		  lettersonly: true
		},
		number: {
		  required: true,
		  digits: true,
		},
		address: {
		  required: true
		},
		town: {
		  required: true,
		  lettersonly: true
		},
		postcode: {
		  required: true,
		},
		terms: {
		  required: true,
        },
        subject: {
            required: true,
        },
        message: {
            required: true,
		},
		driverLicense: {
			required: true,
		},
		driverNo: {
			required: true,
		},
		taxiNo: {
			required: true,
		},
		create: {
			required: true,
		},
		date: {
			required: true,
		}
	  },
	  messages: {
        firstName: {
            required: 'Please enter your firstName',
		},
		secondName: {
			required: 'Please enter your lastName',
		},
		email: {
		  required: 'Please enter an email address.',
		  email: 'Please enter a <em>valid</em> email address.',
		  remote: $.validator.format("{0} is already associated with an account.")
		},
		
	  }
	});
  
  });
