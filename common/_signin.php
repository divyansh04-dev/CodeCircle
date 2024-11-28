<?php
include_once '_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['check_email'], $_POST['check_pass']) && !empty($_POST['check_email']) && !empty($_POST['check_pass'])) {
        
        $check_email = mysqli_real_escape_string($conn, $_POST['check_email']);
        $check_pass = mysqli_real_escape_string($conn, $_POST['check_pass']);
        $redirect_url = isset($_POST['redirect_url']) ? $_POST['redirect_url'] : 'index.php';

        $check_sql = "SELECT * FROM `users` WHERE `user_email` = '$check_email'";
        $check_result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            while($detail = mysqli_fetch_assoc($check_result)){
                $password = $detail['password'];
                if(password_verify($check_pass, $password)) {
                    $_SESSION['user_email'] = $detail['user_email'];
                    $_SESSION['user_id'] = $detail['user_id'];
                    echo 'redirect:' . $redirect_url;
                } else{
                    echo 'not match pass';
                }
            }
        } else {
            echo 'did not exits';
        }
    } else{
        echo 'field empty';
    }
}
?>