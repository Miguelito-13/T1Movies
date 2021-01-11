<?php

    require_once "../config/config.php";

    session_start();

    // Check if user already logged in
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] === 'ADMIN') {
            header("location: admin_site.php");
            exit;
        }
    }

    include('header.php');

?>

<body>
    <?php
        include('navbar.php');
        include('announcements.php');
    ?>
    <hr />
    <!-- main body -->
    <section class="container-fluid">
        <div class="general-container">
            <div class="row mt-3">

                <?php 
                    include('home_now_showing.php');
                    include('home_coming_soon.php');
                ?>
              
            </div>
        </div>
    </section>
    <!-- End of Main Body -->

    <?php include('footer.php'); ?>

</body>

</html>