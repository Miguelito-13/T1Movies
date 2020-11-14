<?php
include('movie_dbconn.php');
include('movie_function.php');

if (isset($_POST["movie_id"])) {
    $output = array();
    $statement = $connection->prepare("SELECT * FROM movies WHERE MOVIE_ID = '" . $_POST["movie_id"] . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output["movie_id"] = $row["MOVIE_ID"];
        $output["movie"] = $row["MOVIE_TITLE"];
        $output["description"] = $row["MOVIE_DESC"];
        $output["duration"] = $row["MOVIE_DURATION"];
        $output["rated"] = $row["RATED"];
        $output["rating_user"] = $row["RATING_USER"];
        $output["rating_title"] = $row["RATING_TITLE"];
        $output["trailer"] = $row["TRAILER"];
        $output["premiereDate"] = $row["PREMIERE_DATE"];
        $output["movie_active"] = $row["ACTIVE"];
    }
    $statement = $connection->prepare("SELECT * FROM genre WHERE MOVIE_ID = '" . $_POST["movie_id"] . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output["action"] = $row["ACTION"];
        $output["adventure"] = $row["ADVENTURE"];
        $output["animation"] = $row["ANIMATION"];
        $output["comedy"] = $row["COMEDY"];
        $output["drama"] = $row["DRAMA"];
        $output["family"] = $row["FAMILY"];
        $output["fantasy"] = $row["FANTASY"];
        $output["horror"] = $row["HORROR"];
        $output["musical"] = $row["MUSICAL"];
        $output["mystery"] = $row["MYSTERY"];
        $output["romance"] = $row["ROMANCE"];
        $output["sci"] = $row["SCI_FI"];
        $output["thriller"] = $row["THRILLER"];
    }
    echo json_encode($output);
}
