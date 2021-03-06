<?php

session_start();

// Check user login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: home.php");
    exit;
}


/* 
        <?php echo htmlspecialchars(isset($_SESSION["username"])) ? $_SESSION["username"] : ""; ?>
        <?php echo htmlspecialchars(isset($_SESSION["email"])) ? $_SESSION["email"] : ""; ?>
*/

include('header.php');
include('navbar.php');

?>

<section class="container-fluid" style="margin-top: 50px; width:80%">
    <div class="custom-profile">
        <h3>PROFILE</h3>
        <hr />
        <div class="row">
            <?php
            $account_id = $_SESSION["id"];
            $sql = "SELECT * from users_account LEFT JOIN users_profile ON users_account.ACCOUNT_ID = users_profile.ACCOUNT_ID WHERE users_account.ACCOUNT_ID = '$account_id' LIMIT 1";
            $res = mysqli_query($link,  $sql);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
            ?>
                    <div class="col-12 custom-profile-navbar">
                        <ul class="nav nav-tabs nav-justified" id="profileTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active px-auto" id="#nav-user-profile-tab" data-toggle="tab" href="#nav-user-profile" role="tab" aria-controls="home" aria-selected="true">USER PROFILE</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link px-auto" id="nav-transaction-history-tab" data-toggle="tab" href="#nav-transaction-history" role="tab" aria-controls="contact" aria-selected="false">TRANSACTION HISTORY</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="nav-user-profile" role="tabpanel" aria-labelledby="nav-user-profile-tab">
                                <div class="container custom-users-profile">
                                    <div class="row mt-3">
                                        <div class="col-12 col-md-7">
                                            <p>NAME: <span><?= $row['FIRST_NAME'] ?> <?= $row['MI'] ?><?php if (strlen($row['MI']) > 0) {
                                                                                                            echo ".";
                                                                                                        } ?> <?= $row['LAST_NAME'] ?></span></p>
                                            <p>ADDRESS: <span><?= $row['ADDRESS'] ?></span></p>
                                            <p>CONTACT NO: <span><?= $row['CONTACT_NO'] ?></span></p>
                                        </div>
                                        <div class="col-12 col-md-5">
                                            <p>BIRTH DATE: <span><?php $date = date_create($row['BIRTHDATE']);
                                                                    echo date_format($date, "F d, Y"); ?></span></p>
                                            <p>SEX: <span><?php if ($row['GENDER_ID'] == 1) { ?>Male<?php } else { ?>Female<?php } ?></span></p>
                                            <div class="col-12 d-flex justify-content-start px-0">
                                                <a href="edit_profile.php" class="btn custom-edit-btn p-auto" name="edit_profile">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg> Edit Profile
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-12 col-md-7">
                                            <p>USERNAME: <span><?= $row['USERNAME'] ?></span></p>
                                            <p>EMAIL ADDRESS: <span><?= $row['EMAIL'] ?></span></p>
                                        </div>

                                        <div class="col-12 col-md-5 d-flex justify-content-start mx-auto">
                                            <a href="verify_email.php" class="btn custom-edit-btn p-auto" name="edit_account">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                    <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                                                </svg> Verify Email
                                            </a>

                                            <a href="edit_account.php" class="btn custom-edit-btn p-auto ml-5" name="edit_account">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg> Edit Account
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-transaction-history" role="tabpanel" aria-labelledby="nav-transaction-history-tab">
                                <div class="container custom-users-profile">
                                    <div class="row mt-3">
                                        <div class="col-12 mb-3 mx-auto px-3 py-3 custom-transaction-history">
                                            <table class="table table-hover table-striped">
                                                <tbody>
                                                    <thead class="thead-dark">
                                                        <th class="transaction-table-subtitle">TRANSACTION DATE</td>
                                                        <th class="transaction-table-subtitle">MOVIE</td>
                                                        <th class="transaction-table-subtitle">BRANCH</td>
                                                        <th class="transaction-table-subtitle">CINEMA DATE</td>
                                                        <th class="transaction-table-subtitle">TIME</td>
                                                        <th class="transaction-table-subtitle">NO. OF TICKETS</td>
                                                        <th class="transaction-table-subtitle">TOTAL</td>
                                                    </thead>

                                                    <!-- PHP: If there are previous transactions, print this table. Else, print: "No Previous Transactions" -->

                                                    <?php
                                                    $sql = "SELECT * from transaction WHERE ACCOUNT_ID = '$account_id' ORDER BY TRANS_ID DESC";
                                                    $res = mysqli_query($link,  $sql);
                                                    if (mysqli_num_rows($res) > 0) {
                                                        while ($row2 = mysqli_fetch_assoc($res)) { ?>
                                                            <tr>
                                                                <td>
                                                                    <?php
                                                                    $date2 = date_create($row2["CREATED_ON"]);
                                                                    echo date_format($date2, "(D) M j, Y, g:i a");
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    require_once "../config/config_pdo.php";
                                                                    $stmt = $connection->query("SELECT * FROM movies WHERE MOVIE_ID = '" . $row2["MOVIE_ID"] . "'");
                                                                    while ($row3 = $stmt->fetch()) {
                                                                        if ($row3["MOVIE_ID"] == $row2["MOVIE_ID"]) {
                                                                            echo $row3["MOVIE_TITLE"];
                                                                        }
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    require_once "../config/config_pdo.php";
                                                                    $stmt = $connection->query("SELECT * FROM now_showing WHERE MOVIE_ID = '" . $row2["MOVIE_ID"] . "'");
                                                                    while ($row3 = $stmt->fetch()) {
                                                                        if ($row3["B_MANILA"] == $row2["BRANCH_ID"]) {
                                                                            echo "SM Manila";
                                                                        } else if ($row3["B_MARIKINA"] == $row2["BRANCH_ID"]) {
                                                                            echo "SM Marikina";
                                                                        } else if ($row3["B_NORTH"] == $row2["BRANCH_ID"]) {
                                                                            echo "SM North Edsa";
                                                                        } else {
                                                                            echo "SM Bacoor";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $date2 = date_create($row2["DATE"]);
                                                                    echo date_format($date2, "(D) M j, Y");
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if ($row2["TIME"] == 1) {
                                                                        echo "9:30 am";
                                                                    } else if ($row2["TIME"] == 2) {
                                                                        echo "1:00 pm";
                                                                    } else {
                                                                        echo "4:30 pm";
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?= $row2["SEATS"] ?>
                                                                </td>
                                                                <td>
                                                                    <div>₱<?= $row2["PRICE"] ?></span>.00</div> <!-- checkCount * price -->
                                                                </td>
                                                            </tr>
                                                        <?php }
                                                    } else { ?>
                                                        <tr>
                                                            <td colspan="7" class="text-center">
                                                                THERE ARE CURRENTLY NO TRANSACTIONS
                                                            </td>
                                                        </tr>
                                                    <?php } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            } else { ?>
                <div class="col-12 custom-profile-navbar">
                    PROFILE IS TEMPORARILY UNAVAILABLE!
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>