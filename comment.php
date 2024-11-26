<?php include_once 'common/_connection.php'; 
    if($_GET['threadid']){
        $threadid = $_GET['threadid'];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['addpost'])) {
            $comment_desc = mysqli_real_escape_string($conn, $_POST['comment_desc']);

            $add_sql = "INSERT INTO `comments`(`thread_id`, `comment_desc`) VALUES ('$threadid','$comment_desc')";
            $add_result = mysqli_query($conn, $add_sql);
            if($add_result){
                header("location: comment.php?threadid=$threadid");
                exit();
            }
            
        }
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
    <script src="jquery-3.7.1.min.js"></script>

    <style>
    .hero-unit {
        background-color: #E9ECEF;
        padding-top: 15px;
        min-height: 210px;
        border-radius: 10px;
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
        $result = mysqli_query($conn, "SELECT * FROM `threads` WHERE thread_id = $threadid ");

        if($result){
            while($row = mysqli_fetch_assoc($result)){
                echo '<div class="container hero-unit my-4">
                        <h1>'. $row['thread_title'] .'</h2>
                        <p class="my-3">'. $row['thread_desc'] .'</p>
                        <hr class="my-4">
                        <p>Forum rules promote respectful discussions by avoiding spam, offensive language, personal attacks, and
                            sharing inappropriate content.</p>
                    </div>';
            }
        }
    ?>

    <div class="container my-4">
        <h1>Post Comments</h1>
    </div>

    <div class="container">
        <form action="comment.php?threadid=<?= $threadid ?>" method="POST">
            <div class="form-floating">
                <textarea class="form-control" name="comment_desc" placeholder="Leave a comment here"
                    id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Comments</label>
            </div>
            <button type="submit" name="addpost" class="btn btn-primary my-3">Post</button>
        </form>
    </div>

    <div class="container my-4">
        <h1>Discussion</h1>
    </div>

    <?php        
        $threadid = $_GET['threadid'];
        $result = mysqli_query($conn, "SELECT * FROM `comments` WHERE thread_id = $threadid");

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="container my-5 d-flex justify-content-start">
                        <div class="me-3 d-inline">
                            <img src="img/user.jpg" alt="not found" class="rounded-circle" style="height: 45px; width: 47px;">
                        </div>
                        <div class="d-flex justify-content-start">
                            <p class="mb-0 text-muted">' . $row['comment_desc'] . '</p>
                        </div>
                    </div>';
            }
        } else {
            echo '<div class="container my-4">
                    <p>Start a Discussion</p>
                </div>';
        }
    ?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="common/_fotter.php"></script>

</body>

</html>