<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['adduser'])){
            $email = mysqli_real_escape_string($conn, $_POST['user_email']);
            $user_pass = mysqli_real_escape_string($conn, $_POST['user_pass']);
            $user_cpass = mysqli_real_escape_string($conn, $_POST['user_cpass']);

            if($user_pass === $user_cpass){
                $sql = "INSERT INTO `users`(`user_email`, `password`) VALUES ('','')";
                $result = mysqli_query($conn, $sql);
            } else{
                echo 'no';
            }
            
        }
    }
?>