<?php
include_once '_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user_email'], $_POST['user_cpass']) && !empty($_POST['user_email']) && !empty($_POST['user_cpass'])) {
        $email = mysqli_real_escape_string($conn, $_POST['user_email']);
        $user_pass = mysqli_real_escape_string($conn, $_POST['user_pass']);
        $user_cpass = mysqli_real_escape_string($conn, $_POST['user_cpass']);

        $check_email_sql = "SELECT * FROM `users` WHERE `user_email` = '$email'";
        $check_email_result = mysqli_query($conn, $check_email_sql);

        if (mysqli_num_rows($check_email_result) > 0) {
            echo 'exists';
        } else {
            if ($user_pass === $user_cpass) {
                $hashed_password = password_hash($user_pass, PASSWORD_DEFAULT);

                $sql = "INSERT INTO `users`(`user_email`, `password`) VALUES ('$email','$hashed_password')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo 'success';
                } else {
                    echo 'error';
                }
            } else {
                echo 'no';
            }
        }
    } else {
        echo 'empty';
    }
}
?>