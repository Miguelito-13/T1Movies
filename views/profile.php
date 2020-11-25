<?php

session_start();

// Check user login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: home.php");
    exit;
}

include('header.php');
include('navbar.php');

?>

<section class="container-fluid" style="margin-top: 150px; width:80%">
    <div class="custom-profile">
        <div class="row">
            <div class="col-9 col-md-3 mx-auto px-auto custom-profile-picture mb-3">
                <!-- <img src="../images/Default_DP.png" class="d-flex justify-content-center profile-picture" /> -->
                <img src="<?php echo $image; ?>" class="d-flex justify-content-center profile-picture" />    
            </div>

            <div class ="col-12 col-md-9 custom-profile-navbar">                    
                <ul class="nav nav-tabs" id="profileTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active px-auto" id="#nav-user-profile-tab" data-toggle="tab" href="#nav-user-profile" role="tab" aria-controls="home" aria-selected="true">USER PROFILE</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link px-auto" id="nav-transaction-history-tab" data-toggle="tab" href="#nav-transaction-history" role="tab" aria-controls="contact" aria-selected="false">TRANSACTION HISTORY</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="nav-user-profile" role="tabpanel" aria-labelledby="nav-user-profile-tab">
                        <?php include("user_profile.php"); ?>
                    </div>
                    <div class="tab-pane fade" id="nav-transaction-history" role="tabpanel" aria-labelledby="nav-transaction-history-tab">
                        <?php include("transaction_history.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>