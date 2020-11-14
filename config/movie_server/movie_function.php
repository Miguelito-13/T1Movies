<?php

function get_total_all_records()
{
    include('movie_dbconn.php');
    $statement = $connection->prepare("SELECT * FROM movies");
    $statement->execute();
    $result = $statement->fetchAll();
    return $statement->rowCount();
}
