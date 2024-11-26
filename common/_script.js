$(document).ready(function() {
    $('#adduser').click(function(e) {
        e.preventDefault();

        var user_email = $('#user_email').val();
        var user_pass = $('#user_pass').val();
        var user_cpass = $('#user_cpass').val();

        $.ajax({
            type: "POST",
            url: "common/_signup.php",
            data: {
                'user_email': user_email,
                'user_pass': user_pass,
                'user_cpass': user_cpass,
            },
            success: function(response) {
                console.log(response);
                $('#show_msg').html('');

                if (response === 'exists') {
                    $('#show_msg').append('\
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                        <strong>Failed!</strong> Email already exists.\
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\
                    ');
                    $('#user_email').val('');
                    $('#user_pass').val('');
                    $('#user_cpass').val('');
                } else if (response === 'no') {
                    $('#show_msg').append('\
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                        <strong>Failed!</strong> Passwords do not match.\
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\
                    ');
                    $('#user_pass').val('');
                    $('#user_cpass').val('');
                } else if (response === 'empty') {
                    $('#show_msg').append('\
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                        <strong>Failed!</strong> Please fill all the Fields.\
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\
                    ');
                } else if (response === 'success') {
                    $('#success_msg').append('\
                        <div class="alert alert-success alert-dismissible fade show" role="alert">\
                        <strong>Success!</strong> User has been added.\
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\
                    ');
                    $('#user_email').val('');
                    $('#user_pass').val('');
                    $('#user_cpass').val('');
                    $('#sign-up-modal').modal('hide');
                } else if (response === 'error') {
                    $('#show_msg').append('\
                        <div class="alert alert-danger alert-dismissible fade show my-0 mb-0" role="alert">\
                        <strong>Error!</strong> Something went wrong.\
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\
                    ');
                    $('#user_email').val('');
                    $('#user_pass').val('');
                    $('#user_cpass').val('');
                }
            }
        });
    });

    $('#check_user').click(function (e) { 
        e.preventDefault();

        var check_email = $('#check_email').val();
        var check_pass = $('#check_pass').val();

        $.ajax({
            type: "POST",
            url: "common/_signin.php",
            data: {
                'check_email': check_email,
                'check_pass': check_pass,
            },
            success: function (response) {
                if (response === 'field empty') {
                    $('#msg').append('\
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                        <strong>Failed!</strong> Please fill all the Fields.\
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\
                    ');
                } else if (response === 'did not exits') {
                    $('#msg').append('\
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                        <strong>Failed!</strong> Did not exits.\
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\
                    ');
                    $('#check_email').val('');
                    $('#check_pass').val('');
                }
            }
        });
    });
});