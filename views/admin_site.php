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
                        <h4><a class="text-info" href="http://localhost/t1/front_end/config/movie_server/movie_index.php" target="_blank">http://localhost/t1/front_end/config/movie_server/movie_index.php</a></h4>
                        <hr />
                        <h2>Movies</h2>
                        <hr />
                        <!-- Movies Table -->
                        <table id="movie_table" class="table table-bordered table-striped" style="margin: 0; width: 100%;">
                            <thead class="thead-dark">
                                <tr>
                                    <th>MOVIE ID</th>
                                    <th>MOVIE TITLE</th>
                                    <th>RATED</th>
                                    <th>PREMIERE DATE</th>
                                    <!--
                                    <th>BRANCH {</th>
                                    <th>ID</th>
                                    <th>ID</th>
                                    <th>ID }</th>
                                    <th>CINEMA {</th>
                                    <th>ROOM</th>
                                    <th>ROOM</th>
                                    <th>ROOM }</th>
                                    -->
                                    <th>ACTIVE</th>
                                    <th scope="col">MODIFY</th>
                                </tr>
                            </thead>
                        </table>
                        <br>

                        <div align="right">
                            <button type="button" id="add_button" data-toggle="modal" data-target="#movieModal" class="btn btn-success">Add Movie</button>
                        </div>

                        <!-- Add movie modal -->
                        <div id="movieModal" class="modal fade">
                            <div class="modal-dialog">
                                <form method="post" id="movie_form" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                            <h4 class="modal-title">Add Movie</h4>
                                        </div>
                                        <div class="modal-body">
                                            <label class="title">Movie Title</label>
                                            <input type="text" name="movie" id="movie" class="form-control" placeholder="Movie" />
                                            <br>
                                            <label class="title">Movie Description</label>
                                            <input type="text" name="description" id="description" class="form-control" placeholder="Description" />
                                            <br>
                                            <label class="title">Movie Duration</label>
                                            <input type="number" name="duration" id="duration" class="form-control" placeholder="0 min/s" />
                                            <br>
                                            <label class="title">Movie Rated</label><br>
                                            <input id="rated_g" name="rated" class="radio-button" type="radio" value="G" />
                                            <label for="rated_g">G &nbsp;</label>
                                            <input id="rated_pg" name="rated" class="radio-button" type="radio" value="PG" />
                                            <label for="rated_pg">PG &nbsp;</label>
                                            <input id="rated_pg_13" name="rated" class="radio-button" type="radio" value="PG-13" />
                                            <label for="rated_pg_13">PG-13 &nbsp;</label>
                                            <input id="rated_r" name="rated" class="radio-button" type="radio" value="R" />
                                            <label for="rated_r">R &nbsp;</label>
                                            <input id="rated_nc" name="rated" class="radio-button" type="radio" value="NC-17" />
                                            <label for="rated_nc">NC-17</label>
                                            <br>
                                            <label class="title">Movie Rating</label>
                                            <input type="text" name="rating_user" id="rating_user" class="form-control" placeholder="data-user" />
                                            <input type="text" name="rating_title" id="rating_title" class="form-control" placeholder="data-title" />
                                            <br>
                                            <!-- Genre -->
                                            <label class="title">Movie Genre</label>
                                            <div class="col-12">
                                                <input type="checkbox" id="Action" name="genre" value=1>
                                                <label for="Action">Action&nbsp;&nbsp;</label>
                                                <input type="checkbox" id="Adventure" name="genre" value=2>
                                                <label for="Adventure">Adventure&nbsp;&nbsp;</label>
                                                <input type="checkbox" id="Animation" name="genre" value=3>
                                                <label for="Animation">Animation&nbsp;&nbsp;</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="checkbox" id="Comedy" name="genre" value=4>
                                                <label for="Comedy">Comedy&nbsp;&nbsp;</label>
                                                <input type="checkbox" id="Drama" name="genre" value=5>
                                                <label for="Drama">Drama&nbsp;&nbsp;</label>
                                                <input type="checkbox" id="Family" name="genre" value=6>
                                                <label for="Family">Family&nbsp;&nbsp;</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="checkbox" id="Fantasy" name="genre" value=7>
                                                <label for="Fantasy">Fantasy&nbsp;&nbsp;</label>
                                                <input type="checkbox" id="Horror" name="genre" value=8>
                                                <label for="Horror">Horror&nbsp;&nbsp;</label>
                                                <input type="checkbox" id="Musical" name="genre" value=9>
                                                <label for="Musical">Musical&nbsp;&nbsp;</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="checkbox" id="Mystery" name="genre" value=10>
                                                <label for="Mystery">Mystery&nbsp;&nbsp;</label>
                                                <input type="checkbox" id="Romance" name="genre" value=11>
                                                <label for="Romance">Romance&nbsp;&nbsp;</label>
                                                <input type="checkbox" id="Sci" name="genre" value=12>
                                                <label for="Sci">Sci-Fi&nbsp;&nbsp;</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="checkbox" id="Thriller" name="genre" value=13>
                                                <label for="Thriller">Thriller&nbsp;&nbsp;</label>
                                            </div>
                                            <!-- End of Genre -->
                                            <label class="title">Movie Poster</label><br>
                                            <input type="file" name="movie_image" accept="image/*" /><br>
                                            <br>
                                            <label class="title">Movie Trailer</label>
                                            <input type="text" name="trailer" id="trailer" class="form-control" placeholder="URL Link" />
                                            <br>
                                            <label class="title" for="premiereDate">Premiere Date</label><br>
                                            <input type="datetime-local" id="premiereDate" name="premiereDate" /><br>
                                            <br>
                                            <label class="title">Movie Active</label><br>
                                            <div id="movie_active">
                                                <input id="active_inactive" name="movie_active" class="radio-button" type="radio" value=0 />
                                                <label for="active_inactive">Inactive &nbsp;&nbsp;</label>
                                                <input id="active_coming" name="movie_active" class="radio-button" type="radio" value=1 />
                                                <label for="active_coming">Coming Soon &nbsp;&nbsp;</label>
                                                <input class="active_now" id="active_now" name="movie_active" class="radio-button" type="radio" value=2 />
                                                <label for="active_now">Now Showing &nbsp;&nbsp;</label>
                                            </div>
                                            <div id="movie_branch" style="display: none;">
                                                <label class="title">Movie Branch</label><br>
                                                <input type="checkbox" id="Manila" name="branch" value=1>
                                                <label for="Manila">Manila &nbsp;</label>
                                                <input type="checkbox" id="Marikina" name="branch" value=2>
                                                <label for="Marikina">Marikina &nbsp;</label>
                                                <input type="checkbox" id="North" name="branch" value=3>
                                                <label for="North">North Edsa &nbsp;</label>
                                                <input type="checkbox" id="Bacoor" name="branch" value=4>
                                                <label for="Bacoor">Bacoor &nbsp;</label>
                                                <br>
                                            </div>
                                            <div id="cinema_manila" style="display: none;">
                                                <label class="title">Cinema (Manila)</label><br>
                                                <input id="1_manila" name="cinema_manila" class="radio-button" type="radio" value=1 />
                                                <label for="1_manila">1 &nbsp;&nbsp;</label>
                                                <input id="2_manila" name="cinema_manila" class="radio-button" type="radio" value=2 />
                                                <label for="2_manila">2 &nbsp;&nbsp;</label>
                                                <input id="3_manila" name="cinema_manila" class="radio-button" type="radio" value=3 />
                                                <label for="3_manila">3 &nbsp;&nbsp;</label>
                                                <input id="4_manila" name="cinema_manila" class="radio-button" type="radio" value=4 />
                                                <label for="4_manila">4 &nbsp;&nbsp;</label>
                                                <input id="5_manila" name="cinema_manila" class="radio-button" type="radio" value=5 />
                                                <label for="5_manila">5 &nbsp;&nbsp;</label>
                                                <br>
                                            </div>
                                            <div id="cinema_marikina" style="display: none;">
                                                <label class="title">Cinema (Marikina)</label><br>
                                                <input id="1_marikina" name="cinema_marikina" class="radio-button" type="radio" value=1 />
                                                <label for="1_marikina">1 &nbsp;&nbsp;</label>
                                                <input id="2_marikina" name="cinema_marikina" class="radio-button" type="radio" value=2 />
                                                <label for="2_marikina">2 &nbsp;&nbsp;</label>
                                                <input id="3_marikina" name="cinema_marikina" class="radio-button" type="radio" value=3 />
                                                <label for="3_marikina">3 &nbsp;&nbsp;</label>
                                                <input id="4_marikina" name="cinema_marikina" class="radio-button" type="radio" value=4 />
                                                <label for="4_marikina">4 &nbsp;&nbsp;</label>
                                                <input id="5_marikina" name="cinema_marikina" class="radio-button" type="radio" value=5 />
                                                <label for="5_marikina">5 &nbsp;&nbsp;</label>
                                                <br>
                                            </div>
                                            <div id="cinema_north" style="display: none;">
                                                <label class="title">Cinema (North Edsa)</label><br>
                                                <input id="1_north" name="cinema_north" class="radio-button" type="radio" value=1 />
                                                <label for="1_north">1 &nbsp;&nbsp;</label>
                                                <input id="2_north" name="cinema_north" class="radio-button" type="radio" value=2 />
                                                <label for="2_north">2 &nbsp;&nbsp;</label>
                                                <input id="3_north" name="cinema_north" class="radio-button" type="radio" value=3 />
                                                <label for="3_north">3 &nbsp;&nbsp;</label>
                                                <input id="4_north" name="cinema_north" class="radio-button" type="radio" value=4 />
                                                <label for="4_north">4 &nbsp;&nbsp;</label>
                                                <input id="5_north" name="cinema_north" class="radio-button" type="radio" value=5 />
                                                <label for="5_north">5 &nbsp;&nbsp;</label>
                                                <br>
                                            </div>
                                            <div id="cinema_bacoor" style="display: none;">
                                                <label class="title">Cinema (Bacoor)</label><br>
                                                <input id="1_bacoor" name="cinema_bacoor" class="radio-button" type="radio" value=1 />
                                                <label for="1_bacoor">1 &nbsp;&nbsp;</label>
                                                <input id="2_bacoor" name="cinema_bacoor" class="radio-button" type="radio" value=2 />
                                                <label for="2_bacoor">2 &nbsp;&nbsp;</label>
                                                <input id="3_bacoor" name="cinema_bacoor" class="radio-button" type="radio" value=3 />
                                                <label for="3_bacoor">3 &nbsp;&nbsp;</label>
                                                <input id="4_bacoor" name="cinema_bacoor" class="radio-button" type="radio" value=4 />
                                                <label for="4_bacoor">4 &nbsp;&nbsp;</label>
                                                <input id="5_bacoor" name="cinema_bacoor" class="radio-button" type="radio" value=5 />
                                                <label for="5_bacoor">5 &nbsp;&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="movie_id" id="movie_id" />
                                            <input type="hidden" name="operation" id="operation" />
                                            <input type="submit" name="action" id="action" class="btn" value="Add" />
                                            <button id="close" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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

                        <?php
                        include("../config/config.php");
                        $sql = "SELECT * FROM movies";
                        $res = mysqli_query($link,  $sql);

                        if (mysqli_num_rows($res) > 0) {
                            while ($images = mysqli_fetch_assoc($res)) {  ?>

                                <div class="alb">
                                    <img src="../images/movies/<?= $images['POSTER'] ?>">
                                </div>

                        <?php }
                        } ?>
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

            // Movies
            $("#add_button").click(function() {
                $("#movie_form")[0].reset();
                $(".modal-title").text("Add Movie Details");
                $("#action").val("Add");
                $("#operation").val("Add");

                // Hide on close
                $("#movie_branch").hide();
                $("#cinema_manila").hide();
                $("#cinema_marikina").hide();
                $("#cinema_north").hide();
                $("#cinema_bacoor").hide();
            });

            // Movies - show branch
            $('input[name="movie_active"]').change(function() {
                if (this.value == 2) {
                    $("#movie_branch").show();
                } else {
                    $("#movie_branch").hide();
                    $("#cinema_manila").hide();
                    $("#cinema_marikina").hide();
                    $("#cinema_north").hide();
                    $("#cinema_bacoor").hide();
                    $("#Manila").prop('checked', false);
                    $("#Marikina").prop('checked', false);
                    $("#North").prop('checked', false);
                    $("#Bacoor").prop('checked', false);
                    $('input[name="cinema_manila"]').prop('checked', false);
                    $('input[name="cinema_marikina"]').prop('checked', false);
                    $('input[name="cinema_north"]').prop('checked', false);
                    $('input[name="cinema_bacoor"]').prop('checked', false);
                }
            });

            // Movies - show cinema
            $('input[name="branch"]').change(function() {
                if ($('#Manila').is(':checked')) {
                    $("#cinema_manila").show();
                } else {
                    $("#cinema_manila").hide();
                    $('input[name="cinema_manila"]').prop('checked', false);
                }
                if ($('#Marikina').is(':checked')) {
                    $("#cinema_marikina").show();
                } else {
                    $("#cinema_marikina").hide();
                    $('input[name="cinema_marikina"]').prop('checked', false);
                }
                if ($('#North').is(':checked')) {
                    $("#cinema_north").show();
                } else {
                    $("#cinema_north").hide();
                    $('input[name="cinema_north"]').prop('checked', false);
                }
                if ($('#Bacoor').is(':checked')) {
                    $("#cinema_bacoor").show();
                } else {
                    $("#cinema_bacoor").hide();
                    $('input[name="cinema_bacoor"]').prop('checked', false);
                }
            });

            // Movies - fetch
            var dataTable = $("#movie_table").DataTable({
                paging: true,
                processing: true,
                serverSide: true,
                order: [],
                info: true,
                ajax: {
                    url: "../config/movie_server/movie_fetch.php",
                    type: "POST",
                },
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2, 3, 4, 5],
                }, ],
            });

            // Movies - insert
            $(document).on("submit", "#movie_form", function(event) {
                event.preventDefault();
                var id = $("#id").val();
                var movie = $("#movie").val();
                var description = $("#description").val();
                var duration = $("#description").val();
                var rated = $("input[name='rated']:checked").val();
                var rating_user = $("#rating_user").val();
                var rating_title = $("#rating_title").val();
                var genre = [];
                $.each($("input[name='genre']:checked"), function() {
                    genre.push($(this).val());
                });
                //movie_image
                var trailer = $("#trailer").val();
                var premiereDate = $("#premiereDate").val();
                var movie_active = $("input[name='movie_active']:checked").val();
                if (movie_active == 2) {
                    var branch = [];
                    $.each($("input[name='branch']:checked"), function() {
                        branch.push($(this).val());
                    });
                    var cinema_manila = $("input[name='cinema_manila']:checked").val();
                    var cinema_marikina = $("input[name='cinema_marikina']:checked").val();
                    var cinema_north = $("input[name='cinema_north']:checked").val();
                    var cinema_bacoor = $("input[name='cinema_bacoor']:checked").val();

                } else {
                    var cinema_manila = 0;
                    var cinema_marikina = 0;
                    var cinema_north = 0;
                    var cinema_bacoor = 0;
                }

                if (movie != "" && description != "" && duration != "" && rated != "" && rating_user != "" && rating_title != "" && trailer != "" && premiereDate != "" && movie_active != "") {
                    $.ajax({
                        url: "../config/movie_server/movie_insert.php",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $("#movie_form")[0].reset();
                            $('#close').trigger('click');
                            $("#movie_table").DataTable().ajax.reload();
                            /* For poster error
                            if (data == 'invalid') {
                                alert("Invalid file format.");
                            } else {
                                $("#movie_form")[0].reset();
                                $("#movieModal").modal("hide");
                                dataTable.ajax.reload();
                            }*/
                        },
                    });
                } else {
                    alert("All fields are required.");
                }
            });

            // Movies - fetch_single
            $('#exampleModal').on('show.bs.modal', function(e) {
                $('.modalTextInput').val('');
                let btn = $(e.relatedTarget); // e.related here is the element that opened the modal, specifically the row button
                let id = btn.data('id'); // this is how you get the of any `data` attribute of an element
                $('.saveEdit').data('id', id); // then pass it to the button inside the modal
            });

            $(document).on("click", ".update", function() {
                $(".modal-title").text("Edit Movie Details");
                $("#action").val("Save");
                $("#operation").val("Edit");

                var movie_id = $(this).attr("id");

                $.ajax({
                    url: "../config/movie_server/movie_fetch_single.php",
                    method: "POST",
                    data: {
                        movie_id: movie_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#movieModal').modal('show');
                        $('#id').val(data.id);
                        $("#movie").val(data.movie);
                        $("#description").val(data.description);
                        $("#duration").val(data.duration);
                        $("#rated").val(data.rated);
                        $("#rating_user").val(data.rating_user);
                        $("#rating_title").val(data.rating_title);
                        $("#trailer").val(data.trailer);
                        $("#premiereDate").val(data.premiereDate);
                        $("#movie_active").val(data.movie_active);
                        $('.modal-title').text("Edit Movie Details");
                        $('#movie_id').val(movie_id);
                        $('#action').val("Save");
                        $('#operation').val("Edit");
                    },
                });
            });

            /* FOR EDIT src= https://www.studentstutorial.com/ajax/crud
            $(document).on('click','.update',function(e) {
		var id=$(this).attr("data-id");
		var name=$(this).attr("data-name");
		var email=$(this).attr("data-email");
		var phone=$(this).attr("data-phone");
		var city=$(this).attr("data-city");
		$('#id_u').val(id);
		$('#name_u').val(name);
		$('#email_u').val(email);
		$('#phone_u').val(phone);
		$('#city_u').val(city);
	});
	
	$(document).on('click','#update',function(e) {
		var data = $("#update_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "backend/save.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#editEmployeeModal').modal('hide');
						alert('Data updated successfully !'); 
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
        */

            /*
            // Movies - delete
            $(document).on("click", ".delete", function() {
                var movie_id = $(this).attr("id");
                if (confirm("Are you sure want to delete this user?")) {
                    $.ajax({
                        url: "../config/delete.php",
                        method: "POST",
                        data: {
                            movie_id: movie_id
                        },
                        success: function(data) {
                            dataTable.ajax.reload();
                        },
                    });
                } else {
                    return false;
                }
            });*/
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