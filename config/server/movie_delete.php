<?php

include('../config_pdo.php');
include('movie_records.php');

if (isset($_POST["movie_id"])) {
    $statement = $connection->prepare(
        "DELETE FROM movies WHERE MOVIE_D = :id"
    );
    $result = $statement->execute(

        array(':id'    =>    $_POST["movie_id"])

    );
}
