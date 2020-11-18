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
    <title>Movie Server</title>

    <!-- Bootstrap Lib -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Datatable Dib -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body class="bg-light">
    <div class="content" style="margin: 0 20% 0 20%">
        <h2>Movies</h2>
        <a href="../views/profile.php">Profile</a><br>
        <a href="../config/logout.php">Sign out</a>
        <hr />
        <!-- Movies Table -->
        <table id="movie_table" class="table table-bordered table-striped" style="margin: 0; width: 100%;">
            <thead class="thead-dark">
                <tr>
                    <th>MOVIE ID</th>
                    <th>MOVIE TITLE</th>
                    <th>RATED</th>
                    <th>PREMIERE DATE</th>
                    <th>ACTIVE</th>
                    <th scope="col">MODIFY</th>
                </tr>
            </thead>
        </table>
        <div align="right">
            <button type="button" id="add_button" data-toggle="modal" data-target="#movieModal" class="btn btn-success">Add Movie</button>
        </div>
    </div>
</body>

</html>

<div id="movieModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="movie_form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Movie</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <label class="title">Movie Title *</label>
                    <input type="text" name="movie" id="movie" class="form-control" placeholder="Movie" />
                    <br>
                    <label class="title">Movie Description *</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Description" />
                    <br>
                    <label class="title">Movie Duration *</label>
                    <input type="number" name="duration" id="duration" class="form-control" placeholder="0 min/s" />
                    <br>
                    <label class="title">Movie Rated *</label><br>
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
                    <label class="title">Movie Rating *</label>
                    <input type="text" name="rating_user" id="rating_user" class="form-control" placeholder="data-user" />
                    <input type="text" name="rating_title" id="rating_title" class="form-control" placeholder="data-title" />
                    <br>
                    <!-- Genre -->
                    <label class="title">Movie Genre</label>
                    <div class="col-12">
                        <input type="checkbox" id="action_" name="action_" value=1>
                        <label for="action_">Action&nbsp;&nbsp;</label>
                        <input type="checkbox" id="adventure" name="adventure" value=2>
                        <label for="adventure">Adventure&nbsp;&nbsp;</label>
                        <input type="checkbox" id="animation" name="animation" value=3>
                        <label for="animation">Animation&nbsp;&nbsp;</label>
                    </div>
                    <div class="col-12">
                        <input type="checkbox" id="comedy" name="comedy" value=4>
                        <label for="comedy">Comedy&nbsp;&nbsp;</label>
                        <input type="checkbox" id="drama" name="drama" value=5>
                        <label for="drama">Drama&nbsp;&nbsp;</label>
                        <input type="checkbox" id="family" name="family" value=6>
                        <label for="family">Family&nbsp;&nbsp;</label>
                    </div>
                    <div class="col-12">
                        <input type="checkbox" id="fantasy" name="fantasy" value=7>
                        <label for="fantasy">Fantasy&nbsp;&nbsp;</label>
                        <input type="checkbox" id="horror" name="horror" value=8>
                        <label for="horror">Horror&nbsp;&nbsp;</label>
                        <input type="checkbox" id="musical" name="musical" value=9>
                        <label for="musical">Musical&nbsp;&nbsp;</label>
                    </div>
                    <div class="col-12">
                        <input type="checkbox" id="mystery" name="mystery" value=10>
                        <label for="mystery">Mystery&nbsp;&nbsp;</label>
                        <input type="checkbox" id="romance" name="romance" value=11>
                        <label for="romance">Romance&nbsp;&nbsp;</label>
                        <input type="checkbox" id="sci" name="sci" value=12>
                        <label for="sci">Sci-Fi&nbsp;&nbsp;</label>
                    </div>
                    <div class="col-12">
                        <input type="checkbox" id="thriller" name="thriller" value=13>
                        <label for="thriller">Thriller&nbsp;&nbsp;</label>
                    </div>
                    <!-- End of Genre -->
                    <label class="p-title">Movie Poster *</label><br>
                    <input id="poster" type="file" name="movie_image" accept="image/*" /><br>
                    <label class="pbg-title">Movie Poster Background</label><br>
                    <input id="poster_bg" type="file" name="movie_image_bg" accept="image/*" />
                    <br>
                    <label class="title">Movie Trailer *</label>
                    <input type="text" name="trailer" id="trailer" class="form-control" placeholder="URL Link" />
                    <br>
                    <label class="title" for="premiereDate">Premiere Date *</label><br>
                    <input type="datetime-local" id="premiereDate" name="premiereDate" /><br>
                    <br>
                    <label class="title">Ticket Price *</label>
                    <input step="any" type="number" name="price" id="price" class="form-control" placeholder="0 php" />
                    <br>
                    <label class="title">Movie Active *</label>
                    <div id="movie_active">
                        <input id="active_inactive" name="movie_active" class="radio-button" type="radio" value=0 />
                        <label for="active_inactive">Inactive &nbsp;&nbsp;</label>
                        <input id="active_coming" name="movie_active" class="radio-button" type="radio" value=1 />
                        <label for="active_coming">Coming Soon &nbsp;&nbsp;</label>
                        <input class="active_now" id="active_now" name="movie_active" class="radio-button" type="radio" value=2 />
                        <label for="active_now">Now Showing &nbsp;&nbsp;</label>
                    </div>
                    <div id="movie_branch" style="display: none;">
                        <label class="title">Movie Branch *</label><br>
                        <input type="checkbox" id="Manila" name="Manila" value=1>
                        <label for="Manila">Manila &nbsp;</label>
                        <input type="checkbox" id="Marikina" name="Marikina" value=2>
                        <label for="Marikina">Marikina &nbsp;</label>
                        <input type="checkbox" id="North" name="North" value=3>
                        <label for="North">North Edsa &nbsp;</label>
                        <input type="checkbox" id="Bacoor" name="Bacoor" value=4>
                        <label for="Bacoor">Bacoor &nbsp;</label>
                        <br>
                    </div>
                    <div id="cinema_manila" style="display: none;">
                        <label class="title">Cinema (Manila) *</label><br>
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
                        <label class="title">Cinema (Marikina) *</label><br>
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
                        <label class="title">Cinema (North Edsa) *</label><br>
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
                        <label class="title">Cinema (Bacoor) *</label><br>
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
                    <input type="submit" name="action" id="action" class="btn btn-primary" value="Add" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="../js/main.js"></script>