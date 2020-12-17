<?php
include('../config_pdo.php');
include('user_records.php');

if (isset($_POST["account_id"])) {
    $output = array();

    $statement = $connection->prepare("SELECT * FROM users_account WHERE ACCOUNT_ID = '" . $_POST["account_id"] . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output["account_id"] = $row["ACCOUNT_ID"];
        $output["username"] = $row["USERNAME"];
        $output["email"] = $row["EMAIL"];
        $output["password"] = $row["ACCOUNT_PASSWORD"];
        $output["type"] = $row["ADMIN"];
        $output["code"] = $row["VERIFY_CODE"];
        $output["active"] = $row["ACTIVE"];
    }

    $statement = $connection->prepare("SELECT * FROM users_profile WHERE ACCOUNT_ID = '" . $_POST["account_id"] . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output["user_id"] = $row["USERS_ID"];
        $output["name"] = $row["FIRST_NAME"] . ' ' . $row["MI"] . $row["LAST_NAME"];
        $output["contact"] = $row["CONTACT_NO"];
        $output["address"] = $row["ADDRESS"];
        $output["gender"] = $row["GENDER_ID"];
        $output["age"] = $row["AGE"];
        $output["birthdate"] = $row["BIRTHDATE"];
    }

    echo json_encode($output);
}
