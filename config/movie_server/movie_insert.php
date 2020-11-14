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
            } else {
                echo 'invalid';
            }
        }
    }
    if ($_POST["operation"] == "Edit") {
        $dt = new DateTime();
        $today = $dt->format('Y-m-d H:i:s');
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
    }
}
