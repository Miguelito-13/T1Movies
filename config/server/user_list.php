<?php

include('../config_pdo.php');
include('user_records.php');

// Fetch
$query = '';
$output = array();
$query .= "SELECT * FROM users_account ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE USERNAME LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR EMAIL LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR ADMIN LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR ACTIVE LIKE "%' . $_POST["search"]["value"] . '%" ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY ACCOUNT_ID ASC ';
}

if ($_POST["length"] != -1) {
    $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row["ACCOUNT_ID"];
    $sub_array[] = $row["USERNAME"];
    $sub_array[] = $row["EMAIL"];
    $sub_array[] = $row["ADMIN"];
    if ($row["ACTIVE"] == 0) {
        $sub_array[] = '<span class="text-danger">(0) Inactive</span>';
    } else {
        $sub_array[] = '<span class="text-success">(1) Active</span>';
    }
    $sub_array[] = '<button data-toggle="modal" data-target="#userModal" style="width: 100%" type="button" id="' . $row["ACCOUNT_ID"] . '" class="btn btn-info btn-sm edit-user">Edit</button>';

    $data[] = $sub_array;
}
$output = array(
    "draw"              =>  intval($_POST["draw"]),
    "recordsTotal"      =>  $filtered_rows,
    "recordsFiltered"   =>  get_total_all_records(),
    "data"              =>  $data
);
echo json_encode($output);

// data-toggle="modal" data-target="#movieModal"
