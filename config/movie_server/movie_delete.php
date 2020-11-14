<?php

include('database connection.php');
include('function.php');

if (isset($_POST["movie_id"])) {
    $statement = $connection->prepare(
        "DELETE FROM movies WHERE MOVIE_D = :id"
    );
    $result = $statement->execute(

        array(':id'    =>    $_POST["movie_id"])

    );
}
