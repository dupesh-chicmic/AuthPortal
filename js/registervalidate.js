$(document).ready(function(){
    $('#form').validate({
        rules: {
            username: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            password: {
                required: true,
                minlength: 6
            },
            confirmpassword: {
                required: true,
                equalTo: '#password'
            }
        },
        messages: {
            username: {
                required: 'Username is required'
            },
            email: {
                required: 'Email is required',
                email: 'Please enter a valid email'
            },
            phone: {
                required: 'Phone number is required',
                digits: 'Phone number must contain only digits',
                minlength: 'Length must be equal to 10',
                maxlength: 'Length must be equal to 10'
            },
            password: {
                required: 'Password is required',
                minlength: 'Password must be at least 6 characters long'
            },
            confirmpassword: {
                required: 'Password confirmation is required',
                equalTo: 'Both passwords do not match'
            }
        },
        submitHandler: function(form){
            form.submit();
        }
    });
});