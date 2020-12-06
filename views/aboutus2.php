<?php

session_start();

include('header.php');
include('navbar.php');

?>

<section class="container-fluid" style="margin-top: 150px; width:80%">
    <div class="aboutus my-5">
        <h3 class="aboutus-title">Our Mission and Vision</h3>
        <hr />
        <div class="row">
            <div class="col-md-6">
                <h4 class="aboutus-subtitle">Mission</h4>
                <hr />
                <p class="aboutus-p">Our mission at T1 Movies, Inc. is to help our clients have a wonderful movie experience by providing movie ticket reservations with sincerity, originality and pride</p>
            </div>
            <div class="col-md-6">
                <h4 class="aboutus-subtitle">Vision</h4>
                <hr />
                <p class="aboutus-p">T1 Movies Inc. brings sincerity and originality to movie ticket reservation while making customers experience high definition movies and world-class service.</p>
            </div>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>