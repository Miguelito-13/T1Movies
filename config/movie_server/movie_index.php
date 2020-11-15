<!DOCTYPE html>
<html>

<head>
    <title>Movie Server</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- bootstrap Lib -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- datatable lib -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body class="bg-light">
    <div class="content" style="margin: 0 20% 0 20%">
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
                    <th>ACTIVE</th>
                    <th scope="col">MODIFY</th>
                </tr>
            </thead>
        </table>
        <br>
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
                    <label class="title">Movie Active *</label><br>
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

<script type="text/javascript">
    $(document).ready(function() {
        // Movies
        $("#add_button").click(function() {
            $("#movie_form")[0].reset();
            $(".modal-title").text("Add Movie Details");
            $("#action").val("Add");
            $("#operation").val("Add");
            $('.p-title').text("Movie Poster *");
            $('.pbg-title').text("Movie Poster Background");

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

                // Update
                $("#active_now").prop('checked', true);
                if ($('#active_now').prop("checked") == true) {
                    var movie_active = $(this).attr("id");
                    $.ajax({
                        url: "movie_fetch_single.php",
                        method: "POST",
                        data: {
                            movie_active: movie_active
                        },
                        dataType: "json",
                        success: function(data) {
                            // Manila
                            // 1
                            if (data.act_1 == 1) {
                                $('#1_manila').attr('disabled', true);
                            } else {
                                $('#1_manila').attr('disabled', false);
                            }
                            // 2
                            if (data.act_2 == 1) {
                                $('#2_manila').attr('disabled', true);
                            } else {
                                $('#2_manila').attr('disabled', false);
                            }
                            // 3
                            if (data.act_3 == 1) {
                                $('#3_manila').attr('disabled', true);
                            } else {
                                $('#3_manila').attr('disabled', false);
                            }
                            // 4
                            if (data.act_4 == 1) {
                                $('#4_manila').attr('disabled', true);
                            } else {
                                $('#4_manila').attr('disabled', false);
                            }
                            // 5
                            if (data.act_5 == 1) {
                                $('#5_manila').attr('disabled', true);
                            } else {
                                $('#5_manila').attr('disabled', false);
                            }

                            // Marikina
                            // 1
                            if (data.act_6 == 1) {
                                $('#1_marikina').attr('disabled', true);
                            } else {
                                $('#1_marikina').attr('disabled', false);
                            }
                            // 2
                            if (data.act_7 == 1) {
                                $('#2_marikina').attr('disabled', true);
                            } else {
                                $('#2_marikina').attr('disabled', false);
                            }
                            // 3
                            if (data.act_8 == 1) {
                                $('#3_marikina').attr('disabled', true);
                            } else {
                                $('#3_marikina').attr('disabled', false);
                            }
                            // 4
                            if (data.act_9 == 1) {
                                $('#4_marikina').attr('disabled', true);
                            } else {
                                $('#4_marikina').attr('disabled', false);
                            }
                            // 5
                            if (data.act_10 == 1) {
                                $('#5_marikina').attr('disabled', true);
                            } else {
                                $('#5_marikina').attr('disabled', false);
                            }

                            // North
                            // 1
                            if (data.act_11 == 1) {
                                $('#1_north').attr('disabled', true);
                            } else {
                                $('#1_north').attr('disabled', false);
                            }
                            // 2
                            if (data.act_12 == 1) {
                                $('#2_north').attr('disabled', true);
                            } else {
                                $('#2_north').attr('disabled', false);
                            }
                            // 3
                            if (data.act_13 == 1) {
                                $('#3_north').attr('disabled', true);
                            } else {
                                $('#3_north').attr('disabled', false);
                            }
                            // 4
                            if (data.act_14 == 1) {
                                $('#4_north').attr('disabled', true);
                            } else {
                                $('#4_north').attr('disabled', false);
                            }
                            // 5
                            if (data.act_15 == 1) {
                                $('#5_north').attr('disabled', true);
                            } else {
                                $('#5_north').attr('disabled', false);
                            }

                            // Bacoor
                            // 1
                            if (data.act_16 == 1) {
                                $('#1_bacoor').attr('disabled', true);
                            } else {
                                $('#1_bacoor').attr('disabled', false);
                            }
                            // 2
                            if (data.act_17 == 1) {
                                $('#2_bacoor').attr('disabled', true);
                            } else {
                                $('#2_bacoor').attr('disabled', false);
                            }
                            // 3
                            if (data.act_18 == 1) {
                                $('#3_bacoor').attr('disabled', true);
                            } else {
                                $('#3_bacoor').attr('disabled', false);
                            }
                            // 4
                            if (data.act_19 == 1) {
                                $('#4_bacoor').attr('disabled', true);
                            } else {
                                $('#4_bacoor').attr('disabled', false);
                            }
                            // 5
                            if (data.act_20 == 1) {
                                $('#5_bacoor').attr('disabled', true);
                            } else {
                                $('#5_bacoor').attr('disabled', false);
                            }
                        },
                    });
                }
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
        $('input[name="Manila"]').change(function() {
            if ($('#Manila').is(':checked')) {
                $("#cinema_manila").show();
            } else {
                $("#cinema_manila").hide();
                $('input[name="cinema_manila"]').prop('checked', false);
            }
        });
        $('input[name="Marikina"]').change(function() {
            if ($('#Marikina').is(':checked')) {
                $("#cinema_marikina").show();
            } else {
                $("#cinema_marikina").hide();
                $('input[name="cinema_marikina"]').prop('checked', false);
            }
        });
        $('input[name="North"]').change(function() {
            if ($('#North').is(':checked')) {
                $("#cinema_north").show();
            } else {
                $("#cinema_north").hide();
                $('input[name="cinema_north"]').prop('checked', false);
            }
        });
        $('input[name="Bacoor"]').change(function() {
            if ($('#Bacoor').is(':checked')) {
                $("#cinema_bacoor").show();
            } else {
                $("#cinema_bacoor").hide();
                $('input[name="cinema_bacoor"]').prop('checked', false);
            }
        });


        // Fetch
        var dataTable = $('#movie_table').DataTable({
            paging: true,
            processing: true,
            serverSide: true,
            order: [],
            info: true,
            ajax: {
                url: "movie_fetch.php",
                type: "POST"
            },
            columnDefs: [{
                orderable: false,
                targets: [0, 1, 2, 3, 4, 5],
            }, ],
        });

        // Insert
        $(document).on('submit', '#movie_form', function(event) {
            event.preventDefault();
            var id = $("#id").val();
            var movie = $("#movie").val();
            var description = $("#description").val();
            var duration = $("#description").val();
            var rated = $("input[name='rated']:checked").val();
            var rating_user = $("#rating_user").val();
            var rating_title = $("#rating_title").val();
            if ($("#action_").is(':checked')) {
                var action = $("#action_").val();
            } else {
                var action = 0;
            }
            if ($("#adventure").is(':checked')) {
                var adventure = $("#adventure").val();
            } else {
                var adventure = 0;
            }
            if ($("#animation").is(':checked')) {
                var animation = $("#animation").val();
            } else {
                var animation = 0;
            }
            if ($("#comedy").is(':checked')) {
                var comedy = $("#comedy").val();
            } else {
                var comedy = 0;
            }
            if ($("#drama").is(':checked')) {
                var drama = $("#drama").val();
            } else {
                var drama = 0;
            }
            if ($("#family").is(':checked')) {
                var family = $("#family").val();
            } else {
                var family = 0;
            }
            if ($("#fantasy").is(':checked')) {
                var fantasy = $("#fantasy").val();
            } else {
                var fantasy = 0;
            }
            if ($("#horror").is(':checked')) {
                var horror = $("#horror").val();
            } else {
                var horror = 0;
            }
            if ($("#musical").is(':checked')) {
                var musical = $("#musical").val();
            } else {
                var musical = 0;
            }
            if ($("#mystery").is(':checked')) {
                var mystery = $("#mystery").val();
            } else {
                var mystery = 0;
            }
            if ($("#romance").is(':checked')) {
                var romance = $("#romance").val();
            } else {
                var romance = 0;
            }
            if ($("#sci").is(':checked')) {
                var sci = $("#sci").val();
            } else {
                var sci = 0;
            }
            if ($("#thriller").is(':checked')) {
                var thriller = $("#thriller").val();
            } else {
                var thriller = 0;
            }
            var trailer = $("#trailer").val();
            var premiereDate = $("#premiereDate").val();
            var movie_active = $("input[name='movie_active']:checked").val();
            if ($("#Manila").is(':checked')) {
                var Manila = $("#Manila").val();
            } else {
                var Manila = 0;
            }
            if ($("#Marikina").is(':checked')) {
                var Marikina = $("#Marikina").val();
            } else {
                var Marikina = 0;
            }
            if ($("#North").is(':checked')) {
                var North = $("#North").val();
            } else {
                var North = 0;
            }
            if ($("#Bacoor").is(':checked')) {
                var Bacoor = $("#Bacoor").val();
            } else {
                var Bacoor = 0;
            }
            var cinema_manila = $("input[name='cinema_manila']:checked").val();
            var cinema_marikina = $("input[name='cinema_marikina']:checked").val();
            var cinema_north = $("input[name='cinema_north']:checked").val();
            var cinema_bacoor = $("input[name='cinema_bacoor']:checked").val();

            if (movie != "" && description != "" && duration != "" && rated != undefined && rating_user != "" && rating_title != "" && trailer != "" && premiereDate != "" && movie_active != "") {
                if (movie_active == 2 && Manila == 0 && Marikina == 0 && North == 0 && Bacoor == 0) {
                    alert("Movie Branch is required. (1 or more)");
                } else if (movie_active == 2 && Manila == 0 && Marikina == 2 && North == 0 && Bacoor == 0 && cinema_marikina == undefined) {
                    alert("Cinema is required.");
                } else if (movie_active == 2 && Manila == 0 && Marikina == 0 && North == 3 && Bacoor == 0 && cinema_north == undefined) {
                    alert("Cinema is required.");
                } else if (movie_active == 2 && Manila == 0 && Marikina == 0 && North == 0 && Bacoor == 4 && cinema_bacoor == undefined) {
                    alert("Cinema is required.");
                } else if (movie_active == 2 && Manila == 0 && Marikina == 2 && North == 3 && Bacoor == 0 && ((cinema_marikina == undefined && cinema_north == undefined) || (cinema_marikina != undefined && cinema_north == undefined) || (cinema_marikina == undefined && cinema_north != undefined))) {
                    alert("Cinema is required.");
                } else if (movie_active == 2 && Manila == 0 && Marikina == 2 && North == 0 && Bacoor == 4 && ((cinema_marikina == undefined && cinema_bacoor == undefined) || (cinema_marikina != undefined && cinema_bacoor == undefined) || (cinema_marikina == undefined && cinema_bacoor != undefined))) {
                    alert("Cinema is required.");
                } else if (movie_active == 2 && Manila == 0 && Marikina == 2 && North == 3 && Bacoor == 4 && ((cinema_marikina == undefined && cinema_north == undefined && cinema_bacoor == undefined) || (cinema_marikina != undefined && cinema_north == undefined && cinema_bacoor == undefined) || (cinema_marikina != undefined && cinema_north != undefined && cinema_bacoor == undefined) || (cinema_marikina != undefined && cinema_north == undefined && cinema_bacoor != undefined) || (cinema_marikina == undefined && cinema_north != undefined && cinema_bacoor != undefined) || (cinema_marikina == undefined && cinema_north != undefined && cinema_bacoor == undefined))) {
                    alert("Cinema is required.");
                } else if (movie_active == 2 && Manila == 0 && Marikina == 0 && North == 3 && Bacoor == 4 && ((cinema_north == undefined && cinema_bacoor == undefined) || (cinema_north != undefined && cinema_bacoor == undefined) || (cinema_north == undefined && cinema_bacoor != undefined))) {
                    alert("Cinema is required.");
                } else if (movie_active == 2 && Manila == 1 && Marikina == 0 && North == 0 && Bacoor == 0 && cinema_manila == undefined) {
                    alert("Cinema is required.");
                } else if (movie_active == 2 && Manila == 1 && Marikina == 2 && North == 0 && Bacoor == 0 && ((cinema_manila == undefined && cinema_marikina == undefined) || (cinema_manila != undefined && cinema_marikina == undefined) || (cinema_manila == undefined && cinema_marikina != undefined))) {
                    alert("Cinema is required.");
                } else if (movie_active == 2 && Manila == 1 && Marikina == 0 && North == 3 && Bacoor == 0 && ((cinema_manila == undefined && cinema_north == undefined) || (cinema_manila != undefined && cinema_north == undefined) || (cinema_manila == undefined && cinema_north != undefined))) {
                    alert("Cinema is required.");
                } else if (movie_active == 2 && Manila == 1 && Marikina == 0 && North == 0 && Bacoor == 4 && ((cinema_manila == undefined && cinema_bacoor == undefined) || (cinema_manila != undefined && cinema_bacoor == undefined) || (cinema_manila == undefined && cinema_bacoor != undefined))) {
                    alert("Cinema is required.");
                } else if (movie_active == 2 && Manila == 1 && Marikina == 2 && North == 3 && Bacoor == 0 && ((cinema_manila == undefined && cinema_marikina == undefined && cinema_north == undefined) || (cinema_manila != undefined && cinema_marikina == undefined && cinema_north == undefined) || (cinema_manila != undefined && cinema_marikina != undefined && cinema_north == undefined) || (cinema_manila != undefined && cinema_marikina == undefined && cinema_north != undefined) || (cinema_manila == undefined && cinema_marikina != undefined && cinema_north != undefined) || (cinema_manila == undefined && cinema_marikina != undefined && cinema_north == undefined))) {
                    alert("Cinema is required.");
                } else if (movie_active == 2 && Manila == 1 && Marikina == 2 && North == 0 && Bacoor == 4 && ((cinema_manila == undefined && cinema_marikina == undefined && cinema_bacoor == undefined) || (cinema_manila != undefined && cinema_marikina == undefined && cinema_bacoor == undefined) || (cinema_manila != undefined && cinema_marikina != undefined && cinema_bacoor == undefined) || (cinema_manila != undefined && cinema_marikina == undefined && cinema_bacoor != undefined) || (cinema_manila == undefined && cinema_marikina != undefined && cinema_bacoor != undefined) || (cinema_manila == undefined && cinema_marikina != undefined && cinema_bacoor == undefined))) {
                    alert("Cinema is required.");
                } else if (movie_active == 2 && Manila == 1 && Marikina == 0 && North == 3 && Bacoor == 4 && ((cinema_manila == undefined && cinema_north == undefined && cinema_bacoor == undefined) || (cinema_manila != undefined && cinema_north == undefined && cinema_bacoor == undefined) || (cinema_manila != undefined && cinema_north != undefined && cinema_bacoor == undefined) || (cinema_manila != undefined && cinema_north == undefined && cinema_bacoor != undefined) || (cinema_manila == undefined && cinema_north != undefined && cinema_bacoor != undefined))) {
                    alert("Cinema is required.");
                } else if (movie_active == 2 && Manila == 1 && Marikina == 2 && North == 3 && Bacoor == 4) {
                    if (cinema_manila == undefined && cinema_marikina == undefined && cinema_north == undefined && cinema_bacoor == undefined) {
                        alert("Cinema is required.");
                    } else if (cinema_manila == undefined && cinema_marikina != undefined && cinema_north == undefined && cinema_bacoor == undefined) {
                        alert("Cinema is required.");
                    } else if (cinema_manila == undefined && cinema_marikina == undefined && cinema_north != undefined && cinema_bacoor == undefined) {
                        alert("Cinema is required.");
                    } else if (cinema_manila == undefined && cinema_marikina != undefined && cinema_north != undefined && cinema_bacoor == undefined) {
                        alert("Cinema is required.");
                    } else if (cinema_manila == undefined && cinema_marikina == undefined && cinema_north == undefined && cinema_bacoor != undefined) {
                        alert("Cinema is required.");
                    } else if (cinema_manila == undefined && cinema_marikina != undefined && cinema_north != undefined && cinema_bacoor != undefined) {
                        alert("Cinema is required.");
                    } else if (cinema_manila == undefined && cinema_marikina == undefined && cinema_north != undefined && cinema_bacoor != undefined) {
                        alert("Cinema is required.");
                    } else if (cinema_manila == undefined && cinema_marikina != undefined && cinema_north == undefined && cinema_bacoor != undefined) {
                        alert("Cinema is required.");
                    } else if (cinema_manila != undefined && cinema_marikina == undefined && cinema_north == undefined && cinema_bacoor == undefined) {
                        alert("Cinema is required.");
                    } else if (cinema_manila != undefined && cinema_marikina != undefined && cinema_north == undefined && cinema_bacoor == undefined) {
                        alert("Cinema is required.");
                    } else if (cinema_manila != undefined && cinema_marikina != undefined && cinema_north != undefined && cinema_bacoor == undefined) {
                        alert("Cinema is required.");
                    } else if (cinema_manila != undefined && cinema_marikina != undefined && cinema_north == undefined && cinema_bacoor != undefined) {
                        alert("Cinema is required.");
                    } else if (cinema_manila != undefined && cinema_marikina == undefined && cinema_north != undefined && cinema_bacoor != undefined) {
                        alert("Cinema is required.");
                    } else if (cinema_manila != undefined && cinema_marikina == undefined && cinema_north == undefined && cinema_bacoor != undefined) {
                        alert("Cinema is required.");
                    } else { // Add or Update
                        $.ajax({
                            url: "movie_insert.php",
                            method: "POST",
                            data: new FormData(this),
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                if (data == 'invalid') {
                                    alert("Invalid or Empty File.");
                                } else {
                                    $('#movie_form')[0].reset();
                                    $('#movieModal').modal('hide');
                                    dataTable.ajax.reload();
                                }
                            },
                        });
                    }
                }
                // Add or Update
                else {
                    $.ajax({
                        url: "movie_insert.php",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            if (data == 'invalid') {
                                alert("Invalid or Empty File.");
                            } else {
                                $('#movie_form')[0].reset();
                                $('#movieModal').modal('hide');
                                dataTable.ajax.reload();
                            }
                        },
                    });
                }
            } else {
                alert("* fields are required.");
            }
        });

        // Update
        $(document).on('click', '.update', function() {
            var movie_id = $(this).attr("id");
            $.ajax({
                url: "movie_fetch_single.php",
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
                    if (data.rated == "G") {
                        $("#rated_g").prop('checked', true);
                    } else if (data.rated == "PG") {
                        $("#rated_pg").prop('checked', true);
                    } else if (data.rated == "PG-13") {
                        $("#rated_pg_13").prop('checked', true);
                    } else if (data.rated == "R") {
                        $("#rated_r").prop('checked', true);
                    } else {
                        $("#rated_nc").prop('checked', true);
                    }
                    $("#rating_user").val(data.rating_user);
                    $("#rating_title").val(data.rating_title);
                    if (data.action == 1) {
                        $("#action_").prop('checked', true);
                    } else {
                        $("#action_").prop('checked', false);
                    }
                    if (data.adventure == 2) {
                        $("#adventure").prop('checked', true);
                    } else {
                        $("#adventure").prop('checked', false);
                    }
                    if (data.animation == 3) {
                        $("#animation").prop('checked', true);
                    } else {
                        $("#animation").prop('checked', false);
                    }
                    if (data.comedy == 4) {
                        $("#comedy").prop('checked', true);
                    } else {
                        $("#comedy").prop('checked', false);
                    }
                    if (data.drama == 5) {
                        $("#drama").prop('checked', true);
                    } else {
                        $("#drama").prop('checked', false);
                    }
                    if (data.family == 6) {
                        $("#family").prop('checked', true);
                    } else {
                        $("#family").prop('checked', false);
                    }
                    if (data.fantasy == 7) {
                        $("#fantasy").prop('checked', true);
                    } else {
                        $("#fantasy").prop('checked', false);
                    }
                    if (data.horror == 8) {
                        $("#horror").prop('checked', true);
                    } else {
                        $("#horror").prop('checked', false);
                    }
                    if (data.musical == 9) {
                        $("#musical").prop('checked', true);
                    } else {
                        $("#musical").prop('checked', false);
                    }
                    if (data.mystery == 10) {
                        $("#mystery").prop('checked', true);
                    } else {
                        $("#mystery").prop('checked', false);

                    }
                    if (data.romance == 11) {
                        $("#romance").prop('checked', true);
                    } else {
                        $("#romance").prop('checked', false);
                    }
                    if (data.sci == 12) {
                        $("#sci").prop('checked', true);
                    } else {
                        $("#sci").prop('checked', false);
                    }
                    if (data.thriller == 13) {
                        $("#thriller").prop('checked', true);
                    } else {
                        $("#thriller").prop('checked', false);
                    }
                    $("#trailer").val(data.trailer);
                    $("#premiereDate").val(data.premiereDate);
                    $("#movie_active").val(data.movie_active);
                    if (data.movie_active == 0) {
                        $("#active_inactive").prop('checked', true);
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
                    } else if (data.movie_active == 1) {
                        $("#active_coming").prop('checked', true);
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
                    } else if (data.movie_active == 2) {
                        $("#active_now").prop('checked', true);
                        $("#movie_branch").show();
                        if (data.Manila == 1) {
                            $("#Manila").prop('checked', true);
                            $("#cinema_manila").show();
                            if (data.cinema_manila == 1) {
                                $("#1_manila").prop('checked', true);
                            } else if (data.cinema_manila == 2) {
                                $("#2_manila").prop('checked', true);
                            } else if (data.cinema_manila == 3) {
                                $("#3_manila").prop('checked', true);
                            } else if (data.cinema_manila == 4) {
                                $("#4_manila").prop('checked', true);
                            } else {
                                $("#5_manila").prop('checked', true);
                            }
                        } else {
                            $("#Manila").prop('checked', false);
                            $("#cinema_manila").hide();
                            $('input[name="cinema_manila"]').prop('checked', false);
                        }
                        if (data.Marikina == 2) {
                            $("#Marikina").prop('checked', true);
                            $("#cinema_marikina").show();
                            if (data.cinema_marikina == 1) {
                                $("#1_marikina").prop('checked', true);
                            } else if (data.cinema_marikina == 2) {
                                $("#2_marikina").prop('checked', true);
                            } else if (data.cinema_marikina == 3) {
                                $("#3_marikina").prop('checked', true);
                            } else if (data.cinema_marikina == 4) {
                                $("#4_marikina").prop('checked', true);
                            } else {
                                $("#5_marikina").prop('checked', true);
                            }
                        } else {
                            $("#Marikina").prop('checked', false);
                            $("#cinema_marikina").hide();
                            $('input[name="cinema_marikina"]').prop('checked', false);
                        }
                        if (data.North == 3) {
                            $("#North").prop('checked', true);
                            $("#cinema_north").show();
                            if (data.cinema_north == 1) {
                                $("#1_north").prop('checked', true);
                            } else if (data.cinema_north == 2) {
                                $("#2_north").prop('checked', true);
                            } else if (data.cinema_north == 3) {
                                $("#3_north").prop('checked', true);
                            } else if (data.cinema_north == 4) {
                                $("#4_north").prop('checked', true);
                            } else {
                                $("#5_north").prop('checked', true);
                            }
                        } else {
                            $("#North").prop('checked', false);
                            $("#cinema_north").hide();
                            $('input[name="cinema_north"]').prop('checked', false);
                        }
                        if (data.Bacoor == 4) {
                            $("#Bacoor").prop('checked', true);
                            $("#cinema_bacoor").show();
                            if (data.cinema_bacoor == 1) {
                                $("#1_bacoor").prop('checked', true);
                            } else if (data.cinema_bacoor == 2) {
                                $("#2_bacoor").prop('checked', true);
                            } else if (data.cinema_bacoor == 3) {
                                $("#3_bacoor").prop('checked', true);
                            } else if (data.cinema_bacoor == 4) {
                                $("#4_bacoor").prop('checked', true);
                            } else {
                                $("#5_bacoor").prop('checked', true);
                            }
                        } else {
                            $("#Bacoor").prop('checked', false);
                            $("#cinema_bacoor").hide();
                            $('input[name="cinema_bacoor"]').prop('checked', false);
                        }

                        // Disable
                        if ($('#active_now').prop("checked") == true) {
                            var movie_active = data.movie_active;
                            $.ajax({
                                url: "movie_fetch_single.php",
                                method: "POST",
                                data: {
                                    movie_active: movie_active
                                },
                                dataType: "json",
                                success: function(data) {
                                    // Manila
                                    // 1
                                    if (data.act_1 == 1) {
                                        $('#1_manila').attr('disabled', true);
                                    } else {
                                        $('#1_manila').attr('disabled', false);
                                    }
                                    // 2
                                    if (data.act_2 == 1) {
                                        $('#2_manila').attr('disabled', true);
                                    } else {
                                        $('#2_manila').attr('disabled', false);
                                    }
                                    // 3
                                    if (data.act_3 == 1) {
                                        $('#3_manila').attr('disabled', true);
                                    } else {
                                        $('#3_manila').attr('disabled', false);
                                    }
                                    // 4
                                    if (data.act_4 == 1) {
                                        $('#4_manila').attr('disabled', true);
                                    } else {
                                        $('#4_manila').attr('disabled', false);
                                    }
                                    // 5
                                    if (data.act_5 == 1) {
                                        $('#5_manila').attr('disabled', true);
                                    } else {
                                        $('#5_manila').attr('disabled', false);
                                    }

                                    // Marikina
                                    // 1
                                    if (data.act_6 == 1) {
                                        $('#1_marikina').attr('disabled', true);
                                    } else {
                                        $('#1_marikina').attr('disabled', false);
                                    }
                                    // 2
                                    if (data.act_7 == 1) {
                                        $('#2_marikina').attr('disabled', true);
                                    } else {
                                        $('#2_marikina').attr('disabled', false);
                                    }
                                    // 3
                                    if (data.act_8 == 1) {
                                        $('#3_marikina').attr('disabled', true);
                                    } else {
                                        $('#3_marikina').attr('disabled', false);
                                    }
                                    // 4
                                    if (data.act_9 == 1) {
                                        $('#4_marikina').attr('disabled', true);
                                    } else {
                                        $('#4_marikina').attr('disabled', false);
                                    }
                                    // 5
                                    if (data.act_10 == 1) {
                                        $('#5_marikina').attr('disabled', true);
                                    } else {
                                        $('#5_marikina').attr('disabled', false);
                                    }

                                    // North
                                    // 1
                                    if (data.act_11 == 1) {
                                        $('#1_north').attr('disabled', true);
                                    } else {
                                        $('#1_north').attr('disabled', false);
                                    }
                                    // 2
                                    if (data.act_12 == 1) {
                                        $('#2_north').attr('disabled', true);
                                    } else {
                                        $('#2_north').attr('disabled', false);
                                    }
                                    // 3
                                    if (data.act_13 == 1) {
                                        $('#3_north').attr('disabled', true);
                                    } else {
                                        $('#3_north').attr('disabled', false);
                                    }
                                    // 4
                                    if (data.act_14 == 1) {
                                        $('#4_north').attr('disabled', true);
                                    } else {
                                        $('#4_north').attr('disabled', false);
                                    }
                                    // 5
                                    if (data.act_15 == 1) {
                                        $('#5_north').attr('disabled', true);
                                    } else {
                                        $('#5_north').attr('disabled', false);
                                    }

                                    // Bacoor
                                    // 1
                                    if (data.act_16 == 1) {
                                        $('#1_bacoor').attr('disabled', true);
                                    } else {
                                        $('#1_bacoor').attr('disabled', false);
                                    }
                                    // 2
                                    if (data.act_17 == 1) {
                                        $('#2_bacoor').attr('disabled', true);
                                    } else {
                                        $('#2_bacoor').attr('disabled', false);
                                    }
                                    // 3
                                    if (data.act_18 == 1) {
                                        $('#3_bacoor').attr('disabled', true);
                                    } else {
                                        $('#3_bacoor').attr('disabled', false);
                                    }
                                    // 4
                                    if (data.act_19 == 1) {
                                        $('#4_bacoor').attr('disabled', true);
                                    } else {
                                        $('#4_bacoor').attr('disabled', false);
                                    }
                                    // 5
                                    if (data.act_20 == 1) {
                                        $('#5_bacoor').attr('disabled', true);
                                    } else {
                                        $('#5_bacoor').attr('disabled', false);
                                    }
                                },
                            });
                        }
                    }

                    $('.modal-title').text("Edit Movie Details");
                    $('.p-title').text("Update Movie Poster");
                    $('.pbg-title').text("Update Movie Poster Background");
                    $('#movie_id').val(movie_id);
                    $('#action').val("Save");
                    $('#operation').val("Edit");
                }
            });
        });
    });
</script>