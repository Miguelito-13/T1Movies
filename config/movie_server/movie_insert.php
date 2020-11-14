<?php
include('movie_dbconn.php');
include('movie_function.php');

if (isset($_POST["operation"])) {
    if ($_POST["operation"] == "Add") {
        if (isset($_FILES['movie_image']) && isset($_FILES['movie_image_bg'])) {
            $img_name = $_FILES['movie_image']['name'];
            $tmp_name = $_FILES['movie_image']['tmp_name'];

            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {

                // MOVIE
                $statement = $connection->prepare("INSERT INTO movies (MOVIE_TITLE, MOVIE_DESC, MOVIE_DURATION, RATED, RATING_USER, RATING_TITLE, TRAILER, PREMIERE_DATE, ACTIVE) VALUES (:movie, :description, :duration, :rated, :rating_user, :rating_title, :trailer, :premiereDate, :movie_active)");
                $result = $statement->execute(
                    array(
                        ':movie'   =>  $_POST["movie"],
                        ':description' =>  $_POST["description"],
                        ':duration' =>  $_POST["duration"],
                        ':rated' =>  $_POST["rated"],
                        ':rating_user' =>  $_POST["rating_user"],
                        ':rating_title' =>  $_POST["rating_title"],
                        ':trailer' =>  $_POST["trailer"],
                        ':premiereDate' =>  $_POST["premiereDate"],
                        ':movie_active' =>  $_POST["movie_active"]
                    )
                );

                $stmt = $connection->query("SELECT * FROM movies");
                while ($row = $stmt->fetch()) {
                    if ($row['MOVIE_TITLE'] == $_POST["movie"]) {
                        $curr_id = $row['MOVIE_ID'];
                    }
                }

                // GENRE
                $statement = $connection->prepare("INSERT INTO genre (MOVIE_ID, ACTION, ADVENTURE, ANIMATION, COMEDY, DRAMA, FAMILY, FANTASY, HORROR, MUSICAL, MYSTERY, ROMANCE, SCI_FI, THRILLER) VALUES ('$curr_id', :action_, :adventure, :animation, :comedy, :drama, :family, :fantasy, :horror, :musical, :mystery, :romance, :sci, :thriller)");
                $result = $statement->execute(
                    array(
                        ':action_'   =>  $_POST["action_"],
                        ':adventure' =>  $_POST["adventure"],
                        ':animation' =>  $_POST["animation"],
                        ':comedy' =>  $_POST["comedy"],
                        ':drama' =>  $_POST["drama"],
                        ':family' =>  $_POST["family"],
                        ':fantasy' =>  $_POST["fantasy"],
                        ':horror' =>  $_POST["horror"],
                        ':musical' =>  $_POST["musical"],
                        ':mystery' =>  $_POST["mystery"],
                        ':romance' =>  $_POST["romance"],
                        ':sci' =>  $_POST["sci"],
                        ':thriller' =>  $_POST["thriller"]
                    )
                );

                // POSTER
                $new_img_name = uniqid("T1-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../../images/movies/poster/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                $statement = $connection->prepare("UPDATE movies SET POSTER = ? WHERE MOVIE_ID = ?");
                $result = $statement->execute([$new_img_name, $curr_id]);

                // POSTER BG
                $img_name = $_FILES['movie_image_bg']['name'];
                $tmp_name = $_FILES['movie_image_bg']['tmp_name'];
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("T1-BG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = '../../images/movies/poster_bg/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    $statement = $connection->prepare("UPDATE movies SET POSTER_BG = ? WHERE MOVIE_ID = ?");
                    $result = $statement->execute([$new_img_name, $curr_id]);
                }

                $active = $_POST["movie_active"];

                // INACTIVE
                if ($active == 0) {
                    $statement = $connection->prepare("INSERT INTO coming_soon (MOVIE_ID, ACTIVE) VALUES ('$curr_id', '0')");
                    $result = $statement->execute();
                    $statement = $connection->prepare("INSERT INTO now_showing (MOVIE_ID, ACTIVE) VALUES ('$curr_id', '0')");
                    $result = $statement->execute();
                }

                // COMING SOON
                else if ($active == 1) {
                    $statement = $connection->prepare("INSERT INTO coming_soon (MOVIE_ID, ACTIVE) VALUES ('$curr_id', '1')");
                    $result = $statement->execute();
                    $statement = $connection->prepare("INSERT INTO now_showing (MOVIE_ID, ACTIVE) VALUES ('$curr_id', '0')");
                    $result = $statement->execute();
                }

                // NOW SHOWING
                else if ($active == 2) {
                    $statement = $connection->prepare("INSERT INTO coming_soon (MOVIE_ID, ACTIVE) VALUES ('$curr_id', '0')");
                    $result = $statement->execute();
                    $statement = $connection->prepare("INSERT INTO now_showing (MOVIE_ID, B_MANILA, B_MARIKINA, B_NORTH, B_BACOOR, C_MANILA, C_MARIKINA, C_NORTH, C_BACOOR, ACTIVE) VALUES ('$curr_id', :Manila, :Marikina, :North, :Bacoor, :cinema_manila, :cinema_marikina, :cinema_north, :cinema_bacoor, '1')");
                    $result = $statement->execute(
                        array(
                            ':Manila'   =>  $_POST["Manila"],
                            ':Marikina' =>  $_POST["Marikina"],
                            ':North' =>  $_POST["North"],
                            ':Bacoor' =>  $_POST["Bacoor"],
                            ':cinema_manila' =>  $_POST["cinema_manila"],
                            ':cinema_marikina' =>  $_POST["cinema_marikina"],
                            ':cinema_north' =>  $_POST["cinema_north"],
                            ':cinema_bacoor' =>  $_POST["cinema_bacoor"]
                        )
                    );

                    $dt = new DateTime();
                    $today = $dt->format('Y-m-d H:i:s');

                    // CINEMA
                    $manila = $_POST["Manila"];
                    $marikina = $_POST["Marikina"];
                    $north = $_POST["North"];
                    $bacoor = $_POST["Bacoor"];

                    if ($manila == 1 && isset($_POST["Manila"])) {
                        $statement = $connection->prepare("UPDATE cinema SET MOVIE_ID = '$curr_id', ACTIVE = '1', MODIFIED_ON = '$today' WHERE BRANCH_ID = '1' AND CINEMA_NO = :cinema_manila");
                        $result = $statement->execute(
                            array(
                                ':cinema_manila' =>  $_POST["cinema_manila"]
                            )
                        );
                    }
                    if ($marikina == 2 && isset($_POST["Marikina"])) {
                        $statement = $connection->prepare("UPDATE cinema SET MOVIE_ID = '$curr_id', ACTIVE = '1', MODIFIED_ON = '$today' WHERE BRANCH_ID = '2' AND CINEMA_NO = :cinema_marikina");
                        $result = $statement->execute(
                            array(
                                ':cinema_marikina' =>  $_POST["cinema_marikina"]
                            )
                        );
                    }
                    if ($north == 3 && isset($_POST["North"])) {
                        $statement = $connection->prepare("UPDATE cinema SET MOVIE_ID = '$curr_id', ACTIVE = '1', MODIFIED_ON = '$today' WHERE BRANCH_ID = '3' AND CINEMA_NO = :cinema_north");
                        $result = $statement->execute(
                            array(
                                ':cinema_north' =>  $_POST["cinema_north"]
                            )
                        );
                    }
                    if ($bacoor == 4 && isset($_POST["Bacoor"])) {
                        $statement = $connection->prepare("UPDATE cinema SET MOVIE_ID = '$curr_id', ACTIVE = '1', MODIFIED_ON = '$today' WHERE BRANCH_ID = '4' AND CINEMA_NO = :cinema_bacoor");
                        $result = $statement->execute(
                            array(
                                ':cinema_bacoor' =>  $_POST["cinema_bacoor"]
                            )
                        );
                    }
                }
            } else {
                echo 'invalid';
            }
        }
    }
    if ($_POST["operation"] == "Edit") {
        $dt = new DateTime();
        $today = $dt->format('Y-m-d H:i:s');

        // Movies
        $statement = $connection->prepare("UPDATE movies SET MOVIE_TITLE = :movie, MOVIE_DESC = :description, MOVIE_DURATION = :duration, RATED = :rated, RATING_USER = :rating_user, RATING_TITLE = :rating_title, TRAILER = :trailer, PREMIERE_DATE = :premiereDate, ACTIVE = :movie_active, MODIFIED_ON = '$today' WHERE MOVIE_ID = :id");
        $result = $statement->execute(
            array(
                ':movie'   =>  $_POST["movie"],
                ':description' =>  $_POST["description"],
                ':duration' =>  $_POST["duration"],
                ':rated' =>  $_POST["rated"],
                ':rating_user' =>  $_POST["rating_user"],
                ':rating_title' =>  $_POST["rating_title"],
                ':trailer' =>  $_POST["trailer"],
                ':premiereDate' =>  $_POST["premiereDate"],
                ':movie_active' =>  $_POST["movie_active"],
                ':id' => $_POST["movie_id"]
            )
        );

        // Genre
        $statement = $connection->prepare("UPDATE genre SET ACTION = :action_, ADVENTURE = :adventure, ANIMATION = :animation, COMEDY = :comedy, DRAMA = :drama, FAMILY = :family, FANTASY = :fantasy, HORROR = :horror, MUSICAL = :musical, MYSTERY = :mystery, ROMANCE = :romance, SCI_FI = :sci, THRILLER = :thriller, MODIFIED_ON = '$today' WHERE MOVIE_ID = :id");
        $result = $statement->execute(
            array(
                ':action_'   =>  $_POST["action_"],
                ':adventure' =>  $_POST["adventure"],
                ':animation' =>  $_POST["animation"],
                ':comedy' =>  $_POST["comedy"],
                ':drama' =>  $_POST["drama"],
                ':family' =>  $_POST["family"],
                ':fantasy' =>  $_POST["fantasy"],
                ':horror' =>  $_POST["horror"],
                ':musical' =>  $_POST["musical"],
                ':mystery' =>  $_POST["mystery"],
                ':romance' =>  $_POST["romance"],
                ':sci' =>  $_POST["sci"],
                ':thriller' =>  $_POST["thriller"],
                ':id' => $_POST["movie_id"]
            )
        );

        $stmt = $connection->query("SELECT * FROM movies");
        while ($row = $stmt->fetch()) {
            if ($row['MOVIE_TITLE'] == $_POST["movie"]) {
                $curr_id = $row['MOVIE_ID'];
            }
        }

        $allowed_exs = array("jpg", "jpeg", "png");

        // Poster
        if (isset($_FILES['movie_image'])) {
            $img_name = $_FILES['movie_image']['name'];
            $tmp_name = $_FILES['movie_image']['tmp_name'];
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("T1-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../../images/movies/poster/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                $statement = $connection->prepare("UPDATE movies SET POSTER = ? WHERE MOVIE_ID = ?");
                $result = $statement->execute([$new_img_name, $curr_id]);
            }
        }

        // Poster BG
        if (isset($_FILES['movie_image_bg'])) {
            $img_name = $_FILES['movie_image_bg']['name'];
            $tmp_name = $_FILES['movie_image_bg']['tmp_name'];
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("T1-BG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../../images/movies/poster_bg/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                $statement = $connection->prepare("UPDATE movies SET POSTER_BG = ? WHERE MOVIE_ID = ?");
                $result = $statement->execute([$new_img_name, $curr_id]);
            }
        }

        $active = $_POST["movie_active"];

        // INACTIVE
        if ($active == 0) {
            $statement = $connection->prepare("UPDATE coming_soon SET ACTIVE = ?, MODIFIED_ON = '$today' WHERE MOVIE_ID = ?");
            $result = $statement->execute(['0', $curr_id]);
            $statement = $connection->prepare("UPDATE now_showing SET ACTIVE = ?, MODIFIED_ON = '$today' WHERE MOVIE_ID = ?");
            $result = $statement->execute(['0', $curr_id]);

            // CINEMA
            if (empty($_POST["Manila"])) {
                $statement = $connection->prepare("UPDATE cinema SET ACTIVE = '0', MODIFIED_ON = '$today' WHERE BRANCH_ID = '1' AND MOVIE_ID = '$curr_id'");
                $result = $statement->execute();
            }
            if (empty($_POST["Marikina"])) {
                $statement = $connection->prepare("UPDATE cinema SET ACTIVE = '0', MODIFIED_ON = '$today' WHERE BRANCH_ID = '2' AND MOVIE_ID = '$curr_id'");
                $result = $statement->execute();
            }
            if (empty($_POST["North"])) {
                $statement = $connection->prepare("UPDATE cinema SET ACTIVE = '0', MODIFIED_ON = '$today' WHERE BRANCH_ID = '3' AND MOVIE_ID = '$curr_id'");
                $result = $statement->execute();
            }
            if (empty($_POST["Bacoor"])) {
                $statement = $connection->prepare("UPDATE cinema SET ACTIVE = '0', MODIFIED_ON = '$today' WHERE BRANCH_ID = '4' AND MOVIE_ID = '$curr_id'");
                $result = $statement->execute();
            }
        }

        // COMING SOON
        else if ($active == 1) {
            $statement = $connection->prepare("UPDATE coming_soon SET ACTIVE = ?, MODIFIED_ON = '$today' WHERE MOVIE_ID = ?");
            $result = $statement->execute(['1', $curr_id]);
            $statement = $connection->prepare("UPDATE now_showing SET ACTIVE = ?, MODIFIED_ON = '$today' WHERE MOVIE_ID = ?");
            $result = $statement->execute(['0', $curr_id]);

            // CINEMA
            if (empty($_POST["Manila"])) {
                $statement = $connection->prepare("UPDATE cinema SET ACTIVE = '0', MODIFIED_ON = '$today' WHERE BRANCH_ID = '1' AND MOVIE_ID = '$curr_id'");
                $result = $statement->execute();
            }
            if (empty($_POST["Marikina"])) {
                $statement = $connection->prepare("UPDATE cinema SET ACTIVE = '0', MODIFIED_ON = '$today' WHERE BRANCH_ID = '2' AND MOVIE_ID = '$curr_id'");
                $result = $statement->execute();
            }
            if (empty($_POST["North"])) {
                $statement = $connection->prepare("UPDATE cinema SET ACTIVE = '0', MODIFIED_ON = '$today' WHERE BRANCH_ID = '3' AND MOVIE_ID = '$curr_id'");
                $result = $statement->execute();
            }
            if (empty($_POST["Bacoor"])) {
                $statement = $connection->prepare("UPDATE cinema SET ACTIVE = '0', MODIFIED_ON = '$today' WHERE BRANCH_ID = '4' AND MOVIE_ID = '$curr_id'");
                $result = $statement->execute();
            }
        }

        // NOW SHOWING
        else if ($active == 2) {
            $statement = $connection->prepare("UPDATE coming_soon SET ACTIVE = ?, MODIFIED_ON = '$today' WHERE MOVIE_ID = ?");
            $result = $statement->execute(['0', $curr_id]);
            $statement = $connection->prepare("UPDATE now_showing SET B_MANILA = :Manila, B_MARIKINA = :Marikina, B_NORTH = :North, B_BACOOR = :Bacoor, C_MANILA = :cinema_manila, C_MARIKINA = :cinema_marikina, C_NORTH = :cinema_north, C_BACOOR = :cinema_bacoor, ACTIVE = '1', MODIFIED_ON = '$today' WHERE MOVIE_ID = :id");
            $result = $statement->execute(
                array(
                    ':Manila'   =>  $_POST["Manila"],
                    ':Marikina' =>  $_POST["Marikina"],
                    ':North' =>  $_POST["North"],
                    ':Bacoor' =>  $_POST["Bacoor"],
                    ':cinema_manila' =>  $_POST["cinema_manila"],
                    ':cinema_marikina' =>  $_POST["cinema_marikina"],
                    ':cinema_north' =>  $_POST["cinema_north"],
                    ':cinema_bacoor' =>  $_POST["cinema_bacoor"],
                    ':id' => $curr_id
                )
            );

            // CINEMA
            $manila = $_POST["Manila"];
            $marikina = $_POST["Marikina"];
            $north = $_POST["North"];
            $bacoor = $_POST["Bacoor"];

            // 1
            if ($manila == 1 && isset($_POST["Manila"])) {
                $statement = $connection->prepare("UPDATE cinema SET MOVIE_ID = '$curr_id', ACTIVE = '1', MODIFIED_ON = '$today' WHERE BRANCH_ID = '1' AND CINEMA_NO = :cinema_manila");
                $result = $statement->execute(
                    array(
                        ':cinema_manila' =>  $_POST["cinema_manila"]
                    )
                );
            } else {
                $statement = $connection->prepare("UPDATE cinema SET ACTIVE = '0', MODIFIED_ON = '$today' WHERE BRANCH_ID = '1' AND MOVIE_ID = '$curr_id'");
                $result = $statement->execute();
            }

            // 2
            if ($marikina == 2 && isset($_POST["Marikina"])) {
                $statement = $connection->prepare("UPDATE cinema SET MOVIE_ID = '$curr_id', ACTIVE = '1', MODIFIED_ON = '$today' WHERE BRANCH_ID = '2' AND CINEMA_NO = :cinema_marikina");
                $result = $statement->execute(
                    array(
                        ':cinema_marikina' =>  $_POST["cinema_marikina"]
                    )
                );
            } else {
                $statement = $connection->prepare("UPDATE cinema SET ACTIVE = '0', MODIFIED_ON = '$today' WHERE BRANCH_ID = '2' AND MOVIE_ID = '$curr_id'");
                $result = $statement->execute();
            }

            // 3
            if ($north == 3 && isset($_POST["North"])) {
                $statement = $connection->prepare("UPDATE cinema SET MOVIE_ID = '$curr_id', ACTIVE = '1', MODIFIED_ON = '$today' WHERE BRANCH_ID = '3' AND CINEMA_NO = :cinema_north ");
                $result = $statement->execute(
                    array(
                        ':cinema_north' =>  $_POST["cinema_north"]
                    )
                );
            } else {
                $statement = $connection->prepare("UPDATE cinema SET ACTIVE = '0', MODIFIED_ON = '$today' WHERE BRANCH_ID = '3' AND MOVIE_ID = '$curr_id'");
                $result = $statement->execute();
            }

            // 4
            if ($bacoor == 4 && isset($_POST["Bacoor"])) {
                $statement = $connection->prepare("UPDATE cinema SET MOVIE_ID = '$curr_id', ACTIVE = '1', MODIFIED_ON = '$today' WHERE BRANCH_ID = '4' AND CINEMA_NO = :cinema_bacoor");
                $result = $statement->execute(
                    array(
                        ':cinema_bacoor' =>  $_POST["cinema_bacoor"]
                    )
                );
            } else {
                $statement = $connection->prepare("UPDATE cinema SET ACTIVE = '0', MODIFIED_ON = '$today' WHERE BRANCH_ID = '4' AND MOVIE_ID = '$curr_id'");
                $result = $statement->execute();
            }
        }
    }
}
