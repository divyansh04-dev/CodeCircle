<?php include_once 'common/_connection.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeCircle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
    .carousel-image {
        max-height: 450px;
        object-fit: cover;
    }

    .card-img {
        height: 200px;
    }

    a {
        text-decoration: none;
        color: black;
    }
    </style>
</head>

<body>

    <?php include 'common/_header.php'; ?>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/banner1.jpg" class="d-block w-100 carousel-image">
            </div>
            <div class="carousel-item">
                <img src="img/banner2.jpg" class="d-block w-100 carousel-image">
            </div>
            <div class="carousel-item">
                <img src="img/banner3.jpg" class="d-block w-100 carousel-image">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class=" container text-center my-4">
        <h4>CodeCircle - Categories</h4>
    </div>

    <?php
    $result = mysqli_query($conn, "SELECT * FROM `categories`");
    if ($result && mysqli_num_rows($result) > 0) {
        echo '<div class="container my-5">';
        echo '<div class="row">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
                <div class="col-3">
                    <div class="card mb-5">
                        <img alt="not found" src="img/'.$row['category_img'].'" class="card-img-top card-img">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="threadlist.php?catid='.$row['category_id'].' ">' . $row['category_title'] . '</a>
                            </h5>
                            <p class="card-text">' . substr($row['category_desc'], 0, 150) . '</p>
                            <a href="threadlist.php?catid='.$row['category_id'].'" class="btn btn-primary">View Threads</a>
                        </div>
                    </div>
                </div>';
        }
        echo '</div></div>';
    } else {
        echo '<div class="text-center my-5">No categories found.</div>';
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>