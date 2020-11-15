<?php

session_start();

// Check user login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: home.php");
    exit;
}

// Check user or admin
if ($_SESSION["user_type"] !== 'ADMIN') {
    header("location: home.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>T1 CINEMA: Your Choice for Movie Tickets</title>
    <link rel="shortcut icon" href="../images/T1_Logo_Final2.svg" type="image/svg+xml" />
    <link rel="stylesheet" href="../css/admin_style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <!-- ?php echo htmlspecialchars($_SESSION["username"]); ? -->
    <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark flex-md-nowrap p-1 shadow">
        <button class="btn btn-primary ml-3" id="menu-toggle">Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-4 mt-2 mt-lg-0 ml-md-auto mr-4">
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../config/logout.php">Sign out</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right position-fixed bg-light" id="sidebar-wrapper">
            <div class="list-group list-group-flush" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-dashboard-list" data-toggle="list" href="#list-dashboard" role="tab" aria-controls="dashboard">Dashboard</a>
                <a class="list-group-item list-group-item-action" id="list-database-list" data-toggle="list" href="#list-database" role="tab" aria-controls="database">Database</a>
                <a class="list-group-item list-group-item-action" id="list-movies-list" data-toggle="list" href="#list-movies" role="tab" aria-controls="movies">Movies</a>
                <a class="list-group-item list-group-item-action" id="list-users-list" data-toggle="list" href="#list-users" role="tab" aria-controls="users">Users</a>
            </div>
        </div>
        <!-- Temporary sidebar wrapper for page content below. Try removing to see result -->
        <div id="sidebar-wrapper">
            <div class="list-group">
            </div>
        </div>
        <!-- Temporary sidebar wrapper for page content below. Try removing to see result -->
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="bg-light" id="page-content-wrapper">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-dashboard" role="tabpanel" aria-labelledby="list-dashboard-list">
                    <!-- Content -->
                    <div class="container-fluid p-3">
                        <h1>Dashboard</h1>
                        <hr />
                        <h3>Recent Transactions: </h3>
                        <h3>Total Movies: </h3>
                        <h3>Movies (Now Showing): </h3>
                        <h3>Movies (Coming Soon): </h3>
                        <h3>Total Users:</h3>
                        <h3>Total Users (Active): </h3>
                    </div>
                </div>
                <div class="tab-pane fade" id="list-database" role="tabpanel" aria-labelledby="list-database-list">
                    <!-- Content -->
                    <div class="container-fluid p-3">
                        <h2>Database</h2>
                        <hr />
                        <form class="">
                            <select name="tables" onchange="showTable(this.value)">
                                <option value="0">Select a table:</option>
                                <option value="1">cinema</option>
                                <option value="2">gender</option>
                                <option value="3">genre</option>
                                <option value="4">movies</option>
                                <option value="5">movie_branches</option>
                                <option value="6">movie_category</option>
                                <option value="7">now_showing</option>
                                <option value="8">receipt</option>
                                <option value="9">reservation</option>
                                <option value="10">tickets</option>
                                <option value="11">users_account</option>
                                <option value="12">users_profile</option>
                                <option value="13">viewing_time</option>
                            </select>
                        </form>
                        <br>
                        <div id="txtHint" class="mb-4"></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="list-movies" role="tabpanel" aria-labelledby="list-movies-list">
                    <!-- Content -->
                    <div class="container-fluid p-3">
                        <h1 class="text-danger">THIS IS NOT WORKING!</h1>
                        <hr />
                        <h3 class="text-secondary">Access Below:</h3>
                        <hr />
                        <h4><a class="text-info" href="../config/movie_server/movie_index.php" target="_blank">movie_index.php</a></h4>
                        <hr />
                        <h2>Movies</h2>
                        <hr />
                    </div>
                </div>
                <div class="tab-pane fade" id="list-users" role="tabpanel" aria-labelledby="list-users-list">
                    <!-- Content -->
                    <div class="container-fluid p-3">
                        <h2>Users</h2>
                        <hr />

                        <?php if (isset($_GET['error'])) : ?>
                            <p><?php echo $_GET['error']; ?></p>
                        <?php endif ?>

                        <form action="../config/admin_functions.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="my_image">
                            <input type="submit" name="submit" value="Upload">
                        </form>

                        <div class="row">
                            <div class="col-6">
                                <?php
                                include("../config/config.php");
                                $sql = "SELECT * FROM movies";
                                $res = mysqli_query($link,  $sql);

                                if (mysqli_num_rows($res) > 0) {
                                    while ($images = mysqli_fetch_assoc($res)) {  ?>

                                        <div class="alb">
                                            <img src="../images/movies/poster_bg/<?= $images['POSTER_BG'] ?>">
                                        </div>

                                <?php }
                                } ?>
                            </div>
                            <div class="col-6">
                                <?php
                                $sql = "SELECT * FROM movies";
                                $res = mysqli_query($link,  $sql);

                                if (mysqli_num_rows($res) > 0) {
                                    while ($images = mysqli_fetch_assoc($res)) {  ?>

                                        <div class="alb">
                                            <img src="../images/movies/poster/<?= $images['POSTER'] ?>">
                                        </div>

                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <!-- Main JS -->
    <script type="text/javascript">
        // Toggle Menu
        jQuery(document).ready(function($) {
            // Menu Toggle
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        });

        // Table
        function showTable(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "../config/admin_functions.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</body>

</html>