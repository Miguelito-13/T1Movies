<?php

session_start();

include('header.php');
include('navbar.php');

isset($_SESSION["movie_id"]) ? $movie_id = $_SESSION["movie_id"] : $movie_id = 0;

date_default_timezone_set('Asia/Manila');

if (isset($_SESSION["send"]) && $_SESSION["send"] == "send") {
    $temp_code = "";
    include("../config/email.php");
}

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
                                <img src="../images/movies/poster/<?= $row['POSTER'] ?>" class="custom-movie-profile-poster" alt="<?= $row['MOVIE_TITLE'] ?>" />
                            </div>
                            <div class="col-md-9 col-sm-7">
                                <div class="row pr-3">
                                    <div class="col-md-12">
                                        <!-- Movie Title -->
                                        <h3><?= $row['MOVIE_TITLE'] ?></h3>
                                        <hr />
                                    </div>

                                    <div class="col-md-12 mb-1">
                                        <h6>
                                            <i class="fas fa-info-circle"></i> <?= $date ?>
                                            <?php if ($row['ACTION'] != 0) { ?>/&nbsp;Action<?php } ?>
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
                                    <div class="col-md-9 mb-1">
                                        <h6><i class="fa fa-clock-o" aria-hidden="true"></i> <?= $row['MOVIE_DURATION'] ?> min/s</h6>
                                    </div>
                                    <div class="col-md-9">
                                        <h6><i class="fas fa-star-half-alt"></i> <?= $row['RATED'] ?></h6>
                                    </div>

                                    <div class="col-md-12">
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
                                                <div class="embed-responsive embed-responsive-16by9 custom-trailer m-0">
                                                    <iframe id="trailer" class="embed-responsive-item" src="<?= $row['TRAILER'] ?>" allowfullscreen="true"></iframe> <!-- replace "watch?v=" with "embed/" -->
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

            <?php if ($row['ACTIVE'] == 0) { /*THIS IS FOR INACTIVE*/ ?>
                <!-- THIS IS FOR INACTIVE, you may leave it blank or put design-->
                <!-- CHIEF: Upon checking, parang goods na to kahit wala nang ilagay -->
                <hr style="border: 2em solid #1c1a18; margin: auto; padding: 0" />
            <?php } else if ($row['ACTIVE'] == 1) { ?>
                <!-- ****************** COMING SOON ******************** -->
                <!-- <hr style="border: 3em solid #1c1a18; margin: auto; padding: 0" /> -->
                <div class="container-fluid coming-soon-bottom my-0 py-4">
                    <div class="row mt-4 mb-3 mx-auto" style="width: 80%">
                        <div class="col-12 mb-3">
                            <h3 class="mx-auto">COMING SOON</h3>
                        </div>
                        <div class="col-12">

                            <p class="mx-auto">Ticket reservation will be available on <b><?php $date = date_create($row['PREMIERE_DATE']);
                                                                                            echo date_format($date, "F d, Y"); ?></b></p>
                            <p class="mx-auto">
                                <a href="home.php">Go back to homepage</a>, or try browsing what is
                                <a href="now_showing.php">now showing</a> and other
                                <a href="coming_soon.php">upcoming movies</a>.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- ****************** NOW SHOWING ******************** -->
                <?php } else {
                $sql = "SELECT * from now_showing LEFT JOIN movies ON movies.MOVIE_ID = now_showing.MOVIE_ID WHERE movies.MOVIE_ID = '$movie_id'";
                $res = mysqli_query($link,  $sql);
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) { ?>
                        <input type="hidden" name="movie_id" class="movie_id" id="<?= $row["MOVIE_ID"] ?>" />

                        <nav class="navbar navbar-expand-md m-0 p-0">
                            <button class="navbar-toggler custom-movie-toggler p-3" type="button" data-toggle="collapse" data-target="#collapsibleMovieNavbar">
                                <span style="font-weight: bold">SCHEDULE</span>
                            </button>

                            <div class="collapse navbar-collapse" id="collapsibleMovieNavbar">
                                <div class="movie-navbar" style="width: 100%">
                                    <div class="row px-auto d-flex justify-content-center">
                                        <div class="col-7 col-md-2 input-group mb-3 my-3">
                                            <select class="custom-select" id="inputSelectTheater" name="inputSelectTheater">
                                                <option value="0" selected disabled>Select Theater</option>
                                                <?php if ($row['B_MANILA'] != 0) { ?><option value="1">SM Manila</option><?php } ?>
                                                <?php if ($row['B_MARIKINA'] != 0) { ?><option value="2">SM Marikina</option><?php } ?>
                                                <?php if ($row['B_NORTH'] != 0) { ?><option value="3">SM North Edsa</option><?php } ?>
                                                <?php if ($row['B_BACOOR'] != 0) { ?><option value="4">SM Bacoor</option><?php } ?>
                                            </select>
                                        </div>

                                        <div class=" col-7 col-md-2 input-group mb-3 my-3">
                                            <select class="custom-select" id="inputSelectDate" name="inputSelectDate">
                                                <option selected disabled>Select Date</option>
                                                <option <?php $today = new DateTime();
                                                        $today = date_format($today, 'Y-m-d');
                                                        $temp_date = $row['PREMIERE_DATE'];
                                                        $prem_date = new DateTime($temp_date);
                                                        $prem_date = date_format($prem_date, 'Y-m-d');
                                                        if ($prem_date < $today) { ?> disabled <?php } ?> value="1<?php $date = date_create($row['PREMIERE_DATE']);
                                                                                                                    echo date_format($date, "Y-m-d"); ?>"><?php $date = date_create($row['PREMIERE_DATE']);
                                                                                                                                                            echo date_format($date, "F d, Y"); ?></option>
                                                <option <?php $today = new DateTime();
                                                        $today = date_format($today, 'Y-m-d');
                                                        $temp_date = $row['PREMIERE_DATE'] . '+ 1 days';
                                                        $prem_date = new DateTime($temp_date);
                                                        $prem_date = date_format($prem_date, 'Y-m-d');
                                                        if ($prem_date < $today) { ?> disabled <?php } ?> value="2<?php $date = date_create($row['PREMIERE_DATE'] . '+ 1 days');
                                                                                                                    echo date_format($date, "Y-m-d"); ?>"><?php $date = date_create($row['PREMIERE_DATE'] . '+ 1 days');
                                                                                                                                                            echo date_format($date, "F d, Y"); ?></option>
                                                <option <?php $today = new DateTime();
                                                        $today = date_format($today, 'Y-m-d');
                                                        $temp_date = $row['PREMIERE_DATE'] . '+ 2 days';
                                                        $prem_date = new DateTime($temp_date);
                                                        $prem_date = date_format($prem_date, 'Y-m-d');
                                                        if ($prem_date < $today) { ?> disabled <?php } ?> value="3<?php $date = date_create($row['PREMIERE_DATE'] . '+ 2 days');
                                                                                                                    echo date_format($date, "Y-m-d"); ?>"><?php $date = date_create($row['PREMIERE_DATE'] . '+ 2 days');
                                                                                                                                                            echo date_format($date, "F d, Y"); ?></option>
                                                <option <?php $today = new DateTime();
                                                        $today = date_format($today, 'Y-m-d');
                                                        $temp_date = $row['PREMIERE_DATE'] . '+ 3 days';
                                                        $prem_date = new DateTime($temp_date);
                                                        $prem_date = date_format($prem_date, 'Y-m-d');
                                                        if ($prem_date < $today) { ?> disabled <?php } ?> value="4<?php $date = date_create($row['PREMIERE_DATE'] . '+ 3 days');
                                                                                                                    echo date_format($date, "Y-m-d"); ?>"><?php $date = date_create($row['PREMIERE_DATE'] . '+ 3 days');
                                                                                                                                                            echo date_format($date, "F d, Y"); ?></option>
                                                <option <?php $today = new DateTime();
                                                        $today = date_format($today, 'Y-m-d');
                                                        $temp_date = $row['PREMIERE_DATE'] . '+ 4 days';
                                                        $prem_date = new DateTime($temp_date);
                                                        $prem_date = date_format($prem_date, 'Y-m-d');
                                                        if ($prem_date < $today) { ?> disabled <?php } ?> value="5<?php $date = date_create($row['PREMIERE_DATE'] . '+ 4 days');
                                                                                                                    echo date_format($date, "Y-m-d"); ?>"><?php $date = date_create($row['PREMIERE_DATE'] . '+ 4 days');
                                                                                                                                                            echo date_format($date, "F d, Y"); ?></option>
                                                <option <?php $today = new DateTime();
                                                        $today = date_format($today, 'Y-m-d');
                                                        $temp_date = $row['PREMIERE_DATE'] . '+ 5 days';
                                                        $prem_date = new DateTime($temp_date);
                                                        $prem_date = date_format($prem_date, 'Y-m-d');
                                                        if ($prem_date < $today) { ?> disabled <?php } ?> value="6<?php $date = date_create($row['PREMIERE_DATE'] . '+ 5 days');
                                                                                                                    echo date_format($date, "Y-m-d"); ?>"><?php $date = date_create($row['PREMIERE_DATE'] . '+ 5 days');
                                                                                                                                                            echo date_format($date, "F d, Y"); ?></option>
                                                <option <?php $today = new DateTime();
                                                        $today = date_format($today, 'Y-m-d');
                                                        $temp_date = $row['PREMIERE_DATE'] . '+ 6 days';
                                                        $prem_date = new DateTime($temp_date);
                                                        $prem_date = date_format($prem_date, 'Y-m-d');
                                                        if ($prem_date < $today) { ?> disabled <?php } ?> value="7<?php $date = date_create($row['PREMIERE_DATE'] . '+ 6 days');
                                                                                                                    echo date_format($date, "Y-m-d"); ?>"><?php $date = date_create($row['PREMIERE_DATE'] . '+ 6 days');
                                                                                                                                                            echo date_format($date, "F d, Y"); ?></option>
                                            </select>
                                        </div>
                                        <?php /*if (time() > strtotime('10:30 am')) {
                                        }
                                        */ ?>
                                        <div class=" col-7 col-md-2 input-group mb-3 my-3">
                                            <select class="custom-select" id="inputSelectTime" name="inputSelectTime">
                                                <option selected disabled>Select Time</option>
                                                <option value="1" id="time1">9:30 am</option>
                                                <option value="2" id="time2">1:00 pm</option>
                                                <option value="3" id="time3">4:30 pm</option>
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
                                                                <label class="custom-control-label" for="Sold">Reserved</label>
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

                                    <!-- Transaction -->
                                    <div class="transaction-button d-flex align-items-end justify-content-end mb-5">
                                        <?php
                                        $account_id = isset($_SESSION["id"]) ? $_SESSION["id"] : 0;
                                        $sql = "SELECT * from users_account  WHERE ACCOUNT_ID = '$account_id' LIMIT 1";
                                        $res = mysqli_query($link,  $sql);
                                        if (mysqli_num_rows($res) > 0) {
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                $verified = $row["VERIFIED"];
                                            }
                                        }
                                        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                                            if ($verified == 1) { ?>
                                                <button type="button" id="purchase_button" data-toggle="modal" data-target="#reserve_modal" class="btn buy-ticket-button">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM4 14a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm7 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm.354-7.646a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                                    </svg>
                                                    Purchase
                                                </button>
                                            <?php } else { ?>
                                                <a href="verify_email.php" class="btn buy-ticket-button" target="_blank">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM4 14a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm7 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm.354-7.646a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                                    </svg>
                                                    Purchase
                                                </a>
                                            <?php }
                                        } else { ?>
                                            <button type="button" id="purchase_button" data-toggle="modal" data-target="#" class="btn buy-ticket-button" disabled>
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM4 14a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm7 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm.354-7.646a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                                </svg>
                                                Purchase
                                            </button>
                                        <?php } ?>
                                    </div>
                                    <div id="reserve_modal" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title movie-title">Confirm Purchase</h4>
                                                    <button type="button" class="close p-0 mr-1 mt-3" data-dismiss="modal">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6>Movie: </h6>
                                                    <span>
                                                        <?php
                                                        $movie_id = $_SESSION["movie_id"];
                                                        $sql = "SELECT * from movies WHERE MOVIE_ID = '$movie_id'";
                                                        $res = mysqli_query($link,  $sql);
                                                        if (mysqli_num_rows($res) > 0) {
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo $row["MOVIE_TITLE"];
                                                            }
                                                        } ?>
                                                    </span>
                                                    <br><br>
                                                    <h6>Movie Branch: </h6>
                                                    <span class="branch-title"></span>
                                                    <br><br>
                                                    <h6>Date: </h6>
                                                    <span class="branch-date"></span>
                                                    <br><br>
                                                    <h6>Time: </h6>
                                                    <span class="branch-time"></span>
                                                    <br><br>
                                                    <h6>Seat/s: <span class="branch-quantity"></span></h6>
                                                    <span class="branch-seat"></span>
                                                    <br><br>
                                                    <h6>Price: </h6>
                                                    <span class="branch-price"></span>
                                                    <br><br>
                                                    <h6>Choose Payment Method: </h6>
                                                    <div id="paypal-payment-button">
                                                        <!-- Transaction Button -->
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Transaction -->

                                    <!-- Guidelines -->
                                    <div class="transaction-guidelines">
                                        <hr />
                                        <h4 class="mb-4">GUIDELINES FOR ONLINE TICKET PURCHASING:</h4>
                                        <p>Please note that the following should ALL bear the SAME NAME when buying tickets online:</p>
                                        <ol>
                                            <li><b>Login/Signup</b> to <b>T1 Movies</b>.</li>
                                            <li><b>Verify</b> your email address in profile page.</li>
                                            <li><b>Choose</b> your desired Now Showing Movie.</li>
                                            <li>Pay through <b>Paypal</b>.</li>
                                            <li><b>Redeem</b> ticket sent to your verified email address.</li>
                                        </ol>
                                        <p>Ticket redemption through a representative is <b>NOT</b> allowed. Only the cardholder who transacted online can redeem the ticket.</p>
                                        <p>By proceeding to payment, you agree with the above redemption process. Price is inclusive of standard ticket charges.</p>
                                    </div>
                                </div>
                            </div>
                        </section>

            <?php }
                }
            } ?>
        </section>
    <?php
    }
} else { ?>
    <section class="container-fluid search-results-container mb-5" style="margin-top: 150px; width: 90%">
        <section class="container-fluid custom-movie-profile mb-auto p-0">
            <div class="container-fluid search-results">
                <!-- removed "opacity" class -->
                <?php if (is_numeric($movie_id) == 1) { ?>

                    <!-- Movie Not Found -->
                    <div class="movies-list-container">
                        <!--  for "< ?= $movie_id ? >" -->
                        <h3>SEARCH RESULTS</h3>
                        <hr style="border-top: 1px solid rgba(0,0,0,0.15);" />
                    </div>
                    <?php include('movie_not_found.php'); ?>

                <?php } else { ?>
                    <div class="movies-list-container">
                        <h3>SEARCH RESULTS for "<?= $movie_id ?>"</h3>
                        <hr style="border-top: 1px solid rgba(0,0,0,0.15);" />
                    </div>
                    <?php
                    $sql = "SELECT * FROM movies WHERE MOVIE_TITLE LIKE '%$movie_id%' LIMIT 50";
                    if ($stmt = mysqli_prepare($link, $sql)) {
                        if (mysqli_stmt_execute($stmt)) {
                            $result = mysqli_stmt_get_result($stmt);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                                    <!-- SEARCH RESULTS -->
                                    <?php include('search_results.php'); ?>
                <?php
                                }
                            }
                        }
                    }
                    mysqli_stmt_close($stmt);
                } ?>
            </div>
        </section>
    </section>
<?php
} ?>

<?php include('footer.php'); ?>