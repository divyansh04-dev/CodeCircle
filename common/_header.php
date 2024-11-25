<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['adduser'])){
            
        }
    }
?>
<?php
echo '<nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="index.php">Forum</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">About us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
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
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
                <div>
                    <a href="" data-bs-toggle="modal" data-bs-target="#sign-in-modal" class="btn btn-outline-success btn-md ms-2">Sign in</a>
                    <a href=""  data-bs-toggle="modal" data-bs-target="#sign-up-modal" class="btn btn-outline-success btn-md">Sign up</a>
                </div>
            </div>
        </div>
    </nav>';

    echo '<!-- sign in modal -->
    <div class="modal fade" id="sign-in-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="user_email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="user_email id="user_email required" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="user_pass" class="form-label">Password</label>
                            <input type="password" class="form-control" name="user_pass" id="user_pass required">
                        </div>
                        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit</button>
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
                <div class="modal-body">
                    <form action="index.php" method="POST">
                        <div class="mb-3">
                            <label for="user_email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="user_email id="user_email" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_pass" class="form-label">Password</label>
                            <input type="password" class="form-control" name="user_pass" id="user_pass" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_cpass" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="user_cpass" id="user_cpass">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>';
?>