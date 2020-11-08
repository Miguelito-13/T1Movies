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

include("header.php");

?>

<body>
    <!-- ?php echo htmlspecialchars($_SESSION["username"]); ? -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <button class="btn btn-primary ml-3" id="menu-toggle">Toggle Menu</button>
        <div class="form-inline ml-4 my-2 my-lg-0 search-box">
            <input type="text" autocomplete="off" class="form-control" placeholder="Search">
            <div class="result"></div>
        </div>
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
                    </div>
                </div>
                <div class="tab-pane fade" id="list-database" role="tabpanel" aria-labelledby="list-database-list">
                    <!-- Content -->
                    <div class="container-fluid p-3">
                        <h2>Database</h2>
                        <hr />
                        <form class="">
                            <select name="tables" onchange="showTable(this.value)">
                                <option value="">Select a table:</option>
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
                        <div id="txtHint" class="mb-4"><b>Table info will be listed here...</b>
                            <br><br>
                        </div>
                    </div>

                    <div class="container-fluid">

                    </div>
                </div>
                <div class="tab-pane fade" id="list-movies" role="tabpanel" aria-labelledby="list-movies-list">
                    <!-- Content -->
                    <div class="container-fluid p-3">
                        <h2>Movies</h2>
                        <hr />
                    </div>
                </div>
                <div class="tab-pane fade" id="list-users" role="tabpanel" aria-labelledby="list-users-list">
                    <!-- Content -->
                    <div class="container-fluid p-3">
                        <h2>Users</h2>
                        <hr />
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
    <!-- Main JS -->
    <script type="text/javascript" src="../js/main.js"></script>

</body>