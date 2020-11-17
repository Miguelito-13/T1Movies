<?php

session_start();

include('header.php');
include('navbar.php');

isset($_SESSION["search_title"]) ? $search_title = $_SESSION["search_title"] : $search_title = 0;
isset($_SESSION["movie_id"]) ? $movie_id = $_SESSION["movie_id"] : $movie_id = 0;

echo $movie_id . ' + ' . $search_title;
?>

<!-- Movie Description and Reservation -->
<section class="movie-profile">
    <section class="container-fluid custom-movie-profile mb-3">
        <div class="row mx-auto" style="width: 85%">
            <div class="row" style="margin-top:49px" style="background: url(...)">
                <!-- set horizontal poster as background with css -->
                <!-- Movie Description -->
                <div class="col-md-2 col-sm-4 mb-4">
                    <img src="../images/sample_poster.jpg" class="px-3" style="width:100%" />
                </div>
                <div class="col-md-10 col-sm-8">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Movie Title -->
                            <h3>MOVIE TITLE</h3>
                            <hr />
                        </div>
                        <div class="col-md-2">
                            <!-- <p><i class="fa fa-imdb" aria-hidden="true"></i> 0/10.0</p> -->
                            <span class="imdbRatingPlugin" data-user="ur126089657" data-title="tt4154756" data-style="p4">
                                <a href="https://www.imdb.com/title/tt4154756/?ref_=plg_rt_1"><img src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/images/imdb_31x14.png" alt=" Avengers: Infinity War (2018) on IMDb" /></a>
                            </span>
                            <script>
                                (function(d, s, id) {
                                    var js, stags = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) {
                                        return;
                                    }
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = "https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js";
                                    stags.parentNode.insertBefore(js, stags);
                                })(document, "script", "imdb-rating-api");
                            </script>
                        </div>
                        <div class="col-md-2">
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 2h 10min</p>
                        </div>
                        <div class="col-md-4">
                            <p>2020 • Genre/Genre</p>
                        </div>
                    </div>
                    <br />
                    <button class="btn btn-primary" data-toggle="modal" data-target="#trailerModal">
                        Watch Trailer &nbsp;<i class="fa fa-play" aria-hidden="true"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="trailerModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content modal-lg">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="embed-responsive embed-responsive-16by9 custom-trailer mb-4 mx-auto">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/6ZfuNTqbHE8" allowfullscreen="true"></iframe> <!-- replace "watch?v=" with "embed/" -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
            </div>

            <!-- Movie Trailer -->
            <!-- <div class="col-md-6 embed-responsive embed-responsive-16by9 custom-trailer mb-4 mx-auto">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/6ZfuNTqbHE8" allowfullscreen="true"></iframe> replace "watch?v=" with "embed/"
            </div> -->


            <div class="col-12">
                <hr />
                <p class="mx-auto" style="width: 90%">
                    description goes here... The grave course of events set in motion by Thanos that wiped out half the universe and fractured the Avengers ranks compels the remaining Avengers to take one final stand in Marvel Studios' grand conclusion to twenty-two films, "Avengers: Endgame."
                </p>
            </div>
        </div>
    </section>

    <nav class="navbar navbar-expand-md movie-navbar" style="width: 100%">
        <ul class="navbar-nav mx-auto my-auto">
            <li class="nav-item active"><a class="nav-link mx-1 px-3" href="home.php"><i class="fa fa-calendar" aria-hidden="true"></i> DATE</a></li>
            <li class="nav-item"><a class="nav-link mx-1 px-3" href="home.php">TIME</a></li>
            <li class="nav-item"><a class="nav-link mx-1 px-3" href="home.php">THEATER</a></li>
        </ul>
    </nav>

    <section class="container-fluid custom-movie-profile-more">
        <div class="row mx-auto mt-3" style="width: 85%">
            <!-- Seat Reservation Payment -->
            <div class="col-md-4 mb-4 px-4 py-3 custom-transaction">
                <table class="table table-hover table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">Seats Reserved</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Normal</td>
                            <td>-</td>
                            <td>₱0.00</td>
                        </tr>
                        <tr>
                            <td>VIP</td>
                            <td>-</td>
                            <td>₱0.00</td>
                        </tr>
                        <thead class="table-total" style="border-top: 1px solid #1c1a18">
                            <td>Total</td>
                            <td>-</td>
                            <td>₱0.00</td>
                        </thead>
                    </tbody>
                </table>

                <!-- Transaction Buttons -->
                <div class="transaction-button d-flex align-items-end justify-content-end mb-5">
                    <a class="btn btn-primary buy-ticket-button">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM4 14a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm7 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm.354-7.646a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                        </svg>
                        Purchase
                    </a>
                </div>
            </div>

            <!-- Seat Plan -->
            <div class="col-md-8 custom-seats">
                <div class="row">
                    <div class="col-md-12 custom-seats-legend">
                        <div class="row mx-auto">
                            <div class="col-md-12">
                                <div class="row ml-auto py-3">
                                    <div class="col-2">Normal</div>
                                    <div class="col-4">Special</div>
                                    <div class="col-2">Selected</div>
                                    <div class="col-2">Available</div>
                                    <div class="col-2">Sold</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Seat Reservation -->
                    <div class="col-md-12 custom-seats-reservation py-3">
                        <p>Seat Reservation goes here</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
</section>


<?php include('footer.php'); ?>