<?php 
    include_once 'common/_connection.php';
    if($_GET['catid']){
        $catid = mysqli_real_escape_string($conn, $_GET['catid']);
    } else{
        die('invalied category id');
    } 
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Threads</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
    .Welcome {
        background-color: #E9ECEF;
        min-height: 230px;
        border-radius: 10px;
        padding-top: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    a {
        text-decoration: none;
        color: black;
    }
    </style>
</head>

<body>

    <?php include 'common/_header.php'; ?>
    <?php
        $catid = $_GET['catid'];
        $result = mysqli_query($conn, "SELECT * FROM `categories` WHERE category_id = $catid ");

        if($result){
            while($row = mysqli_fetch_assoc($result)){
                echo '<div class="container Welcome my-4">
                        <h1 class="display-4">Welcome to '. $row['category_title'] .' Forum</h1>
                        <p class="lead my-3">'. $row['category_desc'] .'</p>
                        <hr class="my-4">
                        <p>Forum rules promote respectful discussions by avoiding spam, offensive language, personal attacks, and
                            sharing inappropriate content.</p>
                    </div>';
            }
        }
    ?>


    <div class="container my-4">
        <h1>Add Question</h1>
    </div>

    <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST['add_thread'])){
                $catid = $_GET['catid'];
                $thread_title = mysqli_real_escape_string($conn, $_POST['thread_title']);
                $thread_desc = mysqli_real_escape_string($conn, $_POST['thread_desc']);                
        
                $add_sql = "INSERT INTO `threads`(`category_id`, `thread_title`, `thread_desc`) VALUES ('$catid','$thread_title','$thread_desc')";
                $add_result = mysqli_query($conn, $add_sql);

                if(!$add_result){
                    echo 'failed!' . mysqli_error($conn);
                }
            }
        }
    ?>

    <div class="container">
        <form action="threadlist.php?catid=<?= $catid; ?>" method="POST">
            <div class="mb-3">
                <label for="thread_title">Title</label>
                <input type="text" class="form-control" id="thread_title" name="thread_title" required>
            </div>
            <div class="mb-3">
                <label for="thread_desc">Description</label>
                <input type="text" class="form-control" id="thread_desc" name="thread_desc" required>
            </div>
            <button type="submit" name="add_thread" class="btn btn-primary">Post</button>
        </form>
    </div>


    <div class="container mt-4 mb-5">
        <h1>Browse Question..</h1>
    </div>

    <?php
        $result = mysqli_query($conn, "SELECT * FROM `threads` WHERE category_id = $catid");

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="container my-3 d-flex justify-content-start">
                        <div class="me-3">
                            <img src="img/user.jpg" alt="not found" class="rounded-circle" style="height: 45px; width: 47px;">
                        </div>
                        <div>
                            <h5 class="mb-1"><a href="comment.php?threadid='. $row['thread_id'] .' ">' . $row['thread_title'] . '</a></h5>
                            <p class="mb-0 text-muted">' . $row['thread_desc'] . '</p>
                        </div>
                    </div>';
            }
        } else {
            echo '<div class="container my-4">
                    <p>Start your first question</p>
                </div>';
        }
    ?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>