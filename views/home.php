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

<body class="bg-light">
  <?php
  include('navbar.php');
  include('announcements.php');
  ?>
  <hr />
  <!-- main body -->
  <section class="container-fluid">
    <div class="general-container">
      <!-- sample format of php db -->
      <!-- (<)?php
          $query = $conn->query("select * from post LEFT JOIN members on members.member_id = post.member_id order by post_id DESC");
          while($row = $query->fetch()){
          $posted_by = $row['firstname']." ".$row['lastname'];
          $posted_image = $row['image'];
          $id = $row['post_id'];
        ?()>) -->

      <div class="row mt-5">
        <div class="col-md-12 mb-5 custom-general-holder">
          <span class="row px-3">
            <h3>NOW SHOWING</h3>
            <a href="now_showing.php" class="ml-auto see-more my-auto">SEE MORE ></a>
          </span>
          <hr />
          <ul class="list-unstyled">
            <li>
              <div class="row mx-auto px-auto">
                <div class="col-md-2 container mx-auto my-3 p-0">
                  <img src="../images/sample_poster.jpg" alt="Movie Title" class="movie-poster"> <!-- palitan nung php for db -->
                  <div class="overlay">
                    <a href="movie_profile.php" class="text">Avengers Infinity War</a> <!-- palitan nung php for db -->
                  </div>
                </div>

                <div class="col-md-2 container mx-auto my-3 p-0">
                  <img src="../images/sample_poster.jpg" alt="Movie Title" class="movie-poster"> <!-- palitan nung php for db -->
                  <div class="overlay">
                    <a href="movie_profile.php" class="text">Avengers Infinity War</a> <!-- palitan nung php for db -->
                  </div>
                </div>

                <div class="col-md-2 container mx-auto my-3 p-0">
                  <img src="../images/sample_poster.jpg" alt="Movie Title" class="movie-poster"> <!-- palitan nung php for db -->
                  <div class="overlay">
                    <a href="movie_profile.php" class="text">Avengers Infinity War</a> <!-- palitan nung php for db -->
                  </div>
                </div>

                <div class="col-md-2 container mx-auto my-3 p-0">
                  <img src="../images/sample_poster.jpg" alt="Movie Title" class="movie-poster"> <!-- palitan nung php for db -->
                  <div class="overlay">
                    <a href="movie_profile.php" class="text">Avengers Infinity War</a> <!-- palitan nung php for db -->
                  </div>
                </div>

                <div class="col-md-2 container mx-auto my-3 p-0">
                  <img src="../images/sample_poster.jpg" alt="Movie Title" class="movie-poster"> <!-- palitan nung php for db -->
                  <div class="overlay">
                    <a href="movie_profile.php" class="text">Avengers Infinity War</a> <!-- palitan nung php for db -->
                  </div>
                </div>
              </div>
            </li>
          </ul>
          <hr />
        </div>

        <div class="col-md-12 mb-5 custom-general-holder">
          <span class="row px-3">
            <h3>COMING SOON</h3>
            <a href="coming_soon.php" class="ml-auto see-more my-auto">SEE MORE ></a>
          </span>
          <hr />
          <ul class="list-unstyled">
            <li>
              <div class="row mx-auto px-auto">
                <div class="col-md-2 container mx-auto my-3 p-0">
                  <img src="../images/sample_poster.jpg" alt="Movie Title" class="movie-poster"> <!-- palitan nung php for db -->
                  <div class="overlay">
                    <a href="movie_profile.php" class="text">Avengers Infinity War</a> <!-- palitan nung php for db -->
                  </div>
                </div>

                <div class="col-md-2 container mx-auto my-3 p-0">
                  <img src="../images/sample_poster.jpg" alt="Movie Title" class="movie-poster"> <!-- palitan nung php for db -->
                  <div class="overlay">
                    <a href="movie_profile.php" class="text">Avengers Infinity War</a> <!-- palitan nung php for db -->
                  </div>
                </div>

                <div class="col-md-2 container mx-auto my-3 p-0">
                  <img src="../images/sample_poster.jpg" alt="Movie Title" class="movie-poster"> <!-- palitan nung php for db -->
                  <div class="overlay">
                    <a href="movie_profile.php" class="text">Avengers Infinity War</a> <!-- palitan nung php for db -->
                  </div>
                </div>

                <div class="col-md-2 container mx-auto my-3 p-0">
                  <img src="../images/sample_poster.jpg" alt="Movie Title" class="movie-poster"> <!-- palitan nung php for db -->
                  <div class="overlay">
                    <a href="movie_profile.php" class="text">Avengers Infinity War</a> <!-- palitan nung php for db -->
                  </div>
                </div>

                <div class="col-md-2 container mx-auto my-3 p-0">
                  <img src="../images/sample_poster.jpg" alt="Movie Title" class="movie-poster"> <!-- palitan nung php for db -->
                  <div class="overlay">
                    <a href="movie_profile.php" class="text">Avengers Infinity War</a> <!-- palitan nung php for db -->
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End of Main Body -->

  <?php include('footer.php'); ?>

</body>

</html>