<?php

session_start();

include('header.php');
include('navbar.php');

?>
<section class="container-fluid mb-5" style="margin-top: 150px; width: 90%">
  <div class="movies-list-container">
    <h3>COMING SOON</h3>
    <hr />

    <?php include('genre_nav.php'); ?>

    <div class="row justify-content-center custom-table mx-auto py-3">
      <div class="col-12 col-sm-4 col-md-2">
        <img src="../images/sample_poster.jpg" style="width: 100%" />
      </div>
      <div class="col-12 col-sm-8 col-md-10 custom-movies-description">
        <h4 class="pt-2">Movie Title</h4>
        <hr />
        <p id="movieDescription">
          The grave course of events set in motion by Thanos that wiped out half the universe and fractured the Avengers ranks compels the remaining Avengers to take one final stand in Marvel Studios' grand conclusion to twenty-two films, "Avengers: Endgame."
        </p>
        <div class="text-right mb-auto">
          <!-- <button class="btn buy-button2" href="movie_profile.php">See Schedule</button> -->
          <a class="btn buy-button2 p-0" href="movie_profile.php">See Schedule</a>
        </div>
      </div>
    </div>

    <div class="row justify-content-center custom-table mx-auto py-3">
      <div class="col-12 col-sm-4 col-md-2">
        <img src="../images/sample_poster.jpg" style="width: 100%" />
      </div>
      <div class="col-12 col-sm-8 col-md-10 custom-movies-description">
        <h4 class="pt-2">Movie Title</h4>
        <hr />
        <p id="movieDescription">
          The grave course of events set in motion by Thanos that wiped out half the universe and fractured the Avengers ranks compels the remaining Avengers to take one final stand in Marvel Studios' grand conclusion to twenty-two films, "Avengers: Endgame."
        </p>
        <div class="text-right mb-auto">
          <!-- <button class="btn buy-button2" href="movie_profile.php">See Schedule</button> -->
          <a class="btn buy-button2 p-0" href="movie_profile.php">See Schedule</a>
        </div>
      </div>
    </div>

    <div class="row justify-content-center custom-table mx-auto py-3">
      <div class="col-12 col-sm-4 col-md-2">
        <img src="../images/sample_poster.jpg" style="width: 100%" />
      </div>
      <div class="col-12 col-sm-8 col-md-10 custom-movies-description">
        <h4 class="pt-2">Movie Title</h4>
        <hr />
        <p id="movieDescription">
          The grave course of events set in motion by Thanos that wiped out half the universe and fractured the Avengers ranks compels the remaining Avengers to take one final stand in Marvel Studios' grand conclusion to twenty-two films, "Avengers: Endgame."
        </p>
        <div class="text-right mb-auto">
          <!-- <button class="btn buy-button2" href="movie_profile.php">See Schedule</button> -->
          <a class="btn buy-button2 p-0" href="movie_profile.php">See Schedule</a>
        </div>
      </div>
    </div>

    <hr />
  </div>

  <!-- <nav aria-label="page-navigation">
      <ul class="pagination justify-content-end custom-page-navigation">
        <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
        </li>
        <li class="page-item"><a class="page-link active">1</a></li>
        <li class="page-item"><a class="page-link" href="#page2">2</a></li>
        <li class="page-item"><a class="page-link" href="#page3">3</a></li>
        <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
        </li>
      </ul>
    </nav> -->
</section>

<?php include('footer.php'); ?>