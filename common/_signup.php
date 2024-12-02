<?php
include_once '_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user_name'], $_POST['user_cpass']) && !empty($_POST['user_name']) && !empty($_POST['user_cpass'])) {
        $name = mysqli_real_escape_string($conn, $_POST['user_name']);
        $user_pass = mysqli_real_escape_string($conn, $_POST['user_pass']);
        $user_cpass = mysqli_real_escape_string($conn, $_POST['user_cpass']);

        $check_name_sql = "SELECT * FROM `users` WHERE `user_name` = '$name'";
        $check_name_result = mysqli_query($conn, $check_name_sql);

        if (mysqli_num_rows($check_name_result) > 0) {
            echo 'exists';
        } else {
            if ($user_pass === $user_cpass) {
                $hashed_password = password_hash($user_pass, PASSWORD_DEFAULT);

                $sql = "INSERT INTO `users`(`user_name`, `password`) VALUES ('$name','$hashed_password')";
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