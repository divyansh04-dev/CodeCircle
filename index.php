<?php include_once 'common/_connection.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeCircle</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <link rel="icon" href="favicon.ico">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="common/_style.css">
    <style>
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 100;
        background: transparent;
        transition: background-color 0.3s ease;
    }

    .navbar-light .navbar-nav .nav-link {
        color: white;
    }

    .navbar-light .navbar-brand {
        color: white;
    }
    </style>
</head>

<body>
    <div id="success_msg"></div>
    <?php include 'common/_nav_header.php'; ?>

    <?php
        echo '<!-- sign in modal -->
        <div class="modal fade" id="sign-in-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="msg"></div>
                    <div class="modal-body">
                        <form action="" id="sign" method="POST">
                            <div class="mb-3">
                                <label for="check_name" class="form-label">User name</label>
                                <input type="text" class="form-control" id="check_name" name="check_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="check_pass" class="form-label">Password</label>
                                <input type="password" class="form-control" id="check_pass" name="check_pass" required>
                            </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <div class="row w-100">
                            <div class="col text-start">
                                <p id="forgot" class="mb-0">Forgot Password</p>
                            </div>
                            <div class="col text-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="check_user" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        
        echo '<!-- sign up modal -->
        <div class="modal fade" id="sign-up-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="show_msg"></div>
                    <div class="modal-body">
                        <form action="index.php" method="POST">
                            <div class="mb-3">
                                <label for="user_name" class="form-label">User name</label>
                                <input type="text" class="form-control" id="user_name" name="user_name" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_pass" class="form-label">Password</label>
                                <input type="password" class="form-control" id="user_pass" name="user_pass" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_cpass" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="user_cpass" name="user_cpass" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="adduser" class="btn btn-primary">Add User</button>
                    </div>
                </div>
            </div>
        </div>';
    ?>

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
                    <div class="card card-zoom mb-5">
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

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#forgot').click(function(e) {
            e.preventDefault();
            $('#sign').hide();
        });
    });
    </script>
    <script src="common/_script.js"></script>
    <?php include_once 'common/_footer.php'; ?>
    <script>
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
        } else {
            navbar.style.backgroundColor = 'transparent';
        }
    });
    </script>
</body>

</html>