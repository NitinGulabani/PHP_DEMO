$(document).ready(function() {
    var email_ver = true;

    //Email Verification
    $(".email").keyup(function(e) {
        $.ajax({
            type: "POST",
            url: "email-check.php",
            data: {
                email: $(".email").val()
            },
            success: function(data) {
                if (data == true) {
                    $(".error_msg").html("Email is already exist");
                    $(".email").css("border", "2px solid red");
                    email_ver = false;
                } else {
                    $(".error_msg").html("");
                    email_ver = true;
                }
            }
        });
    });
    //Submit Button
    $("#submit-btn").click(function(e) {
        $(".email").focus();
        return email_ver;
    });

    //Form Validation
    $("#form").validate({
        rules: {
            full_name: {
                minlength: 10,
                required: true
            },
            email: {
                email: true,
                required: true
            },
            password: {
                minlength: 6,
                maxlength: 13,
                required: true,
            },
            mobile_number: {
                required: true,
                minlength: 10,
                maxlength: 10,
                digits: true
            },
            gender: {
                required: true
            },
            'prog_lang[]': {
                required: 1
            }
        },
        messages: {
            full_name: {
                minlength: "Please enter at least 10 characters",
                required: "Please enter your FullName"
            },
            email: {
                email: "Please Provide Valid email Address",
                required: "Please Provide your email"
            },
            password: {
                minlength: "Please enter at least 6 characters",
                maxlength: "Your Password Must be Less than 13 Characters",
                required: "Please Enter Your Password"
            },
            mobile_number: {
                digits: "Please enter valid number",
                minlength: "Please Enter 10 Digit Number",
                maxlength: "Please Enter 10 Digit Number",
                required: "Please Enter Your Number"
            },
            gender: {
                required: "Please Choose Your Gender"
            },
            'prog_lang[]': {
                required: "Please Select Atleast One Language"
            }

        },
    });

});