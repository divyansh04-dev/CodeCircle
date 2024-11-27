<?php
include_once '_connection.php';
echo '<nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand text-white ms-4" href="index.php">CodeCircle</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">About us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Categories
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success me-2" type="submit">Search</button>
                    </form>
                    <div>';
                    
                    if (isset($_SESSION['user_email'])) {
                        echo '<a href="_logout.php" class="btn btn-outline-danger btn-md ms-2 me-4">Logout</a>';
                    } else {
                        echo '<a href="" data-bs-toggle="modal" data-bs-target="#sign-in-modal" class="btn btn-outline-success btn-md ms-2">Sign in</a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#sign-up-modal" class="btn btn-outline-success btn-md me-4">Sign up</a>';
                    }

echo '      </div>
                </div>
            </div>
        </nav>';
?>