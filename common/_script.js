
$(document).ready(function() {
    $('#adduser').click(function(e) {
        e.preventDefault();

        var user_name = $('#user_name').val();
        var user_pass = $('#user_pass').val();
        var user_cpass = $('#user_cpass').val();

        $.ajax({
            type: "POST",
            url: "common/_signup.php",
            data: {
                'user_name': user_name,
                'user_pass': user_pass,
                'user_cpass': user_cpass,
            },
            success: function(response) {
                console.log(response);
                $('#show_msg').html('');

                if (response === 'exists') {
                    $('#show_msg').append('\
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                        <strong>Failed!</strong> User already exists.\
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\
                    ');
                    $('#user_name').val('');
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
                    $('#user_name').val('');
                    $('#user_pass').val('');
                    $('#user_cpass').val('');
                    $('#sign-up-modal').modal('hide');
                } else if (response === 'error') {
                    $('#show_msg').append('\
                        <div class="alert alert-danger alert-dismissible fade show my-0 mb-0" role="alert">\
                        <strong>Error!</strong> Something went wrong.\
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\
                    ');
                    $('#user_name').val('');
                    $('#user_pass').val('');
                    $('#user_cpass').val('');
                }
            }
        });
    });

    $('#check_user').click(function (e) { 
        e.preventDefault();

        var check_name = $('#check_name').val();
        var check_pass = $('#check_pass').val();
        var current_url = window.location.href;

        $.ajax({
            type: "POST",
            url: "common/_signin.php",
            data: {
                'check_name': check_name,
                'check_pass': check_pass,
                'redirect_url': current_url,
            },
            success: function (response) {
                if (response === 'field empty') {
                    $('#msg').append('\
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                        <strong>Failed!</strong> Please fill all the Fields.\
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\
                    ');
                } else if (response === 'not valid name') {
                    $('#msg').append('\
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                        <strong>Failed!</strong> Please enter valid Email.\
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\
                    ');
                } else if (response === 'did not exits') {
                    $('#msg').append('\
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                        <strong>Failed!</strong> User not exits.\
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\
                    ');
                    $('#check_name').val('');
                    $('#check_pass').val('');
                } else if (response.startsWith('redirect:')) {
                    var redirect_url = response.split('redirect:')[1];
                    $('#check_name').val('');
                    $('#check_pass').val('');
                    $('#sign-in-modal').modal('hide');
                
                    window.location.href = redirect_url;
                } else if (response === 'not match pass') {
                    $('#msg').append('\
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                        <strong>Failed!</strong> Password not matched.\
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\
                    ');
                    $('#check_pass').val('');
                }
            }
        });
    });
});