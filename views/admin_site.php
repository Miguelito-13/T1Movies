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
        <div class="ml-4 search-box">
            <input type="text" autocomplete="off" placeholder="Search" />
            <div class="result"></div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse mr-4" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Account
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../config/logout.php">Sign out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right position-fixed bg-light" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light">Database</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Movies</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Users</a>
            </div>
        </div>
        <!-- Temporary sidebar wrapper for page content below. Try removing to see result -->
        <div id="sidebar-wrapper">
            <div class="list-group list-group-flush">
            </div>
        </div>
        <!-- Temporary sidebar wrapper for page content below. Try removing to see result -->
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="bg-light" id="page-content-wrapper">
            <div class="container-fluid">
                <form class="pt-4">
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
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Main JS -->
    <script>
        jQuery(document).ready(function($) {
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        });

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
                xmlhttp.open("GET", "../config/selectTable.php?q=" + str, true);
                xmlhttp.send();
            }
        }

        $(document).ready(function() {
            $('.search-box input[type="text"]').on("keyup input", function() {
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if (inputVal.length) {
                    $.get("../config/search.php", {
                        term: inputVal
                    }).done(function(data) {
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else {
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".result p", function() {
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });
        });
    </script>

</body>