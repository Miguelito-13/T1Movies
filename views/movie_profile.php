<?php

session_start();

include('header.php');
include('navbar.php');

isset($_SESSION["movie_id"]) ? $movie_id = $_SESSION["movie_id"] : $movie_id = 0;

?>

<!-- Movie Description and Reservation -->
<?php
$sql = "SELECT * from genre LEFT JOIN movies ON movies.MOVIE_ID = genre.MOVIE_ID WHERE movies.MOVIE_ID = '$movie_id'";
$res = mysqli_query($link,  $sql);
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $date = substr($row['PREMIERE_DATE'], 0, 4); ?>
        <section id="movie-profile">
            <section class="container-fluid custom-movie-profile mb-auto p-0" style="background: url(../images/movies/poster_bg/<?= $row['POSTER_BG'] ?>); background-size: cover; background-position: center; min-height: 88.5vh">
                <!-- set horizontal poster as background with css -->
                <div class="container-fluid opacity">
                    <div class="row mx-auto" style="width: 80%">
                        <div class="row" style="margin-top:49px">
                            <!-- Movie Description -->
                            <div class="col-md-3 col-sm-5 mb-4 pr-5">
                                <img src="../images/movies/poster/<?= $row['POSTER'] ?>" class="custom-movie-poster" alt="<?= $row['MOVIE_TITLE'] ?>" />
                            </div>
                            <div class="col-md-9 col-sm-7">
                                <div class="row pr-3">
                                    <div class="col-md-12">
                                        <!-- Movie Title -->
                                        <h3><?= $row['MOVIE_TITLE'] ?></h3>
                                        <hr />
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <h6>• <?= $date ?> <?php if ($row['ACTION'] != 0) { ?>/&nbsp;Action<?php } ?>
                                            <?php if ($row['ADVENTURE'] != 0) { ?>/&nbsp;Adventure<?php } ?>
                                            <?php if ($row['ANIMATION'] != 0) { ?>/&nbsp;Animation<?php } ?>
                                            <?php if ($row['COMEDY'] != 0) { ?>/&nbsp;Comedy<?php } ?>
                                            <?php if ($row['DRAMA'] != 0) { ?>/&nbsp;Drama<?php } ?>
                                            <?php if ($row['FAMILY'] != 0) { ?>/&nbsp;Family<?php } ?>
                                            <?php if ($row['FANTASY'] != 0) { ?>/&nbsp;Fantasy<?php } ?>
                                            <?php if ($row['HORROR'] != 0) { ?>/&nbsp;Horror<?php } ?>
                                            <?php if ($row['MUSICAL'] != 0) { ?>/&nbsp;Musical<?php } ?>
                                            <?php if ($row['MYSTERY'] != 0) { ?>/&nbsp;Mystery<?php } ?>
                                            <?php if ($row['ROMANCE'] != 0) { ?>/&nbsp;Romance<?php } ?>
                                            <?php if ($row['SCI_FI'] != 0) { ?>/&nbsp;Sci-Fi<?php } ?>
                                            <?php if ($row['THRILLER'] != 0) { ?>/&nbsp;Thriller<?php } ?>
                                        </h6>
                                    </div>
                                    <div class="col-md-9 mb-2">
                                        <h6><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $row['MOVIE_DURATION'] ?> min/s</h6>
                                    </div>

                                    <div class="col-md-12 mb-1">
                                        <!-- <p><i class="fa fa-imdb" aria-hidden="true"></i> 0/10.0</p> -->
                                        <span class="imdbRatingPlugin p-0 m-0" data-user="<?= $row['RATING_USER'] ?>" data-title="<?= $row['RATING_TITLE'] ?>" data-style="p4">
                                            <a href="https://www.imdb.com/title/tt4154756/?ref_=plg_rt_1">
                                                <!-- <img src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/images/imdb_31x14.png" /> -->
                                            </a>
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
                                </div>
                                <br />
                                <button class="btn watch-btn m-0" data-toggle="modal" data-target="#trailerModal">
                                    Watch Trailer &nbsp;<i class="fa fa-play" aria-hidden="true"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="trailerModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content modal-lg custom-trailer-modal p-0">
                                            <div class="modal-body">
                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button><br />
                                                <div class="embed-responsive embed-responsive-16by9 custom-trailer m-0">
                                                    <iframe class="embed-responsive-item" src="<?= $row['TRAILER'] ?>" allowfullscreen="true"></iframe> <!-- replace "watch?v=" with "embed/" -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4" style="height: auto">
                            <hr />
                            <h4 class="mb-4">PLOT</h4>
                            <p class="mx-auto" style="width: 95%">
                                <?= $row['MOVIE_DESC'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <?php if ($row['ACTIVE'] == 0) { ?>
            <?php } else if ($row['ACTIVE'] == 1) { ?>
                <nav class="navbar navbar-expand-md bg-dark m-0 p-0">
                    <h1 class="mx-auto py-3 text-warning">Coming Soon</h1>
                </nav>
            <?php } else { ?>
                <nav class="navbar navbar-expand-md m-0 p-0">
                    <button class="navbar-toggler custom-movie-toggler p-3" type="button" data-toggle="collapse" data-target="#collapsibleMovieNavbar">
                        <span style="font-weight: bold">SCHEDULE</span>
                    </button>

                    <div class="collapse navbar-collapse" id="collapsibleMovieNavbar">
                        <div class="movie-navbar" style="width: 100%">
                            <div class="row px-auto d-flex justify-content-center">
                                <div class="col-7 col-md-2 input-group mb-3 my-3">
                                    <select class="custom-select" id="inputSelectTheater">
                                        <option selected disabled>Select Theater</option>
                                        <option value="Theater-1">SM Manila</option>
                                        <option value="Theater-2">SM Marikina</option>
                                        <option value="Theater-3">SM North Edsa</option>
                                        <option value="Theater-4">SM Bacoor</option>
                                    </select>
                                </div>

                                <div class=" col-7 col-md-2 input-group mb-3 my-3">
                                    <select class="custom-select" id="inputSelectDate">
                                        <option selected disabled>Select Date</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                                <div class=" col-7 col-md-2 input-group mb-3 my-3">
                                    <select class="custom-select" id="inputSelectTime">
                                        <option selected disabled>Select Time</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>


                <section class="container-fluid custom-movie-profile-more">
                    <div class="row mx-auto mt-3" style="width: 88%">
                        <!-- Seat Plan -->
                        <div class="col-md-8 order-md-12 custom-seats">
                            <div class="row">
                                <!-- Seat Reservation Navbar -->
                                <div class="col-md-12 custom-seats-legend">
                                    <div class="row mx-auto">
                                        <div class="col-md-12">
                                            <div class="row d-flex justify-content-center mx-auto mt-3 mb-0 px-auto py-2">
                                                <div class="col-md-3 col-sm-4 col-4">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheckAvailable" onclick="return false">
                                                        <label class="custom-control-label" for="customCheckAvailable">Available</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-4 col-4">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="Selected" checked="checked" onclick="return false">
                                                        <label class="custom-control-label" for="Selected">Selected</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-4 col-4">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="Sold" checked="checked" disabled>
                                                        <label class="custom-control-label" for="Sold">Sold</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Seat Reservation -->
                                <div class="col-md-12 custom-seats-reservation py-3">
                                    <?php include('seat_reservation.php'); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Seat Reservation Payment -->
                        <div class="col-md-4 order-md-1 mb-4 px-4 py-3 custom-transaction">
                            <table class="table table-hover table-borderless">
                                <thead>
                                    <tr>
                                        <th colspan="3" class="transaction-table-title">SEATS RESERVED</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <thead>
                                        <td class="transaction-table-subtitle">Seat Plan</td>
                                        <td class="transaction-table-subtitle">Quantity</td>
                                        <td class="transaction-table-subtitle">Price</td>
                                    </thead>
                                    <tr>
                                        <td>Regular</td>
                                        <td>
                                            <div id="checkCount">0</div>
                                        </td>
                                        <td>
                                            <div>₱<span id="printSubtotal">0</span>.00</div> <!-- checkCount * price -->
                                        </td>
                                    </tr>
                                    <thead style="border-top: 1px solid #1c1a18">
                                        <td class="transaction-table-total">Total</td>
                                        <td class="transaction-table-total">-</td>
                                        <td class="transaction-table-total">
                                            <div>₱<span id="printTotal">0</span>.00</div> <!-- checkCount * price -->
                                        </td>
                                    </thead>
                                </tbody>
                            </table>

                            <!-- Transaction Buttons -->
                            <div class="transaction-button d-flex align-items-end justify-content-end mb-5">
                                <button class="btn buy-ticket-button">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM4 14a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm7 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm.354-7.646a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                    </svg>
                                    Purchase
                                </button>
                            </div>

                            <!-- Guidelines -->
                            <div class="transaction-guidelines">
                                <hr />
                                <h4 class="mb-4">GUIDELINES FOR ONLINE TICKET PURCHASING:</h4>
                                <p>Please note that the following should ALL bear the SAME NAME when buying tickets online:</p>
                                <ol>
                                    <li>T1 Movies user account.</li>
                                    <li>Payment method to be used.</li>
                                    <li>One (1) valid government ID to be presented for redemption.</li>
                                </ol>
                                <p>Ticket redemption through a representative is <b>NOT</b> allowed. Only the cardholder who transacted online can redeem the ticket.</p>
                                <p>By proceeding to payment, you agree with the above redemption process. Price is inclusive of standard ticket charges.</p>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
        </section>
    <?php
    }
} else { ?>
    <section id="movie-profile">
        <section class="container-fluid custom-movie-profile mb-auto p-0">
            <!-- set horizontal poster as background with css -->
            <div class="container-fluid opacity">
                <h1 class="mx-auto">Movie Not Found!</h1>
            </div>
        </section>
    </section>
<?php
} ?>

<?php include('footer.php'); ?>