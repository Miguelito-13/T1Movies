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
                <?php
                $sql = "SELECT * FROM movies WHERE ACTIVE = '2' ORDER BY MOVIE_TITLE ASC LIMIT 5";
                $res = mysqli_query($link,  $sql);
                if (mysqli_num_rows($res) > 0) {
                  while ($row = mysqli_fetch_assoc($res)) { ?>
                    <div class="col-md-2 container mx-auto my-3 p-0">
                      <img src="../images/movies/poster/<?= $row['POSTER'] ?>" alt="<?= $row['MOVIE_TITLE'] ?>" class="movie-poster">
                      <div class="overlay">
                        <a class="text"><?= $row['MOVIE_TITLE'] ?></a>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                          <input name="view_id" type="text" value="<?= $row['MOVIE_ID'] ?>" style="display: none;">
                          <input name="view_movie" type="submit" value="View Movie" class="btn btn-warning buy-button">
                        </form>
                      </div>
                    </div>
                  <?php
                  }
                } else { ?>
                  <div class="col-md-4 text-center container mx-auto my-3 p-0">
                    <h1>Movies Showing Soon...</h1>
                  </div>
                <?php
                } ?>
              </div>
            </li>
          </ul>
          <hr />
        </div>

        <div class="col-md-12 mb-5 custom-general-holder">
          <span class="row px-3">
            <h3>COMING SOON</h3>
            <a href="coming_soon.php" class="ml-auto see-more my-auto">SEE MORE</a>
          </span>
          <hr />
          <ul class="list-unstyled">
            <li>
              <div class="row mx-auto px-auto">
                <?php
                $sql = "SELECT * FROM movies WHERE ACTIVE = '1' ORDER BY PREMIERE_DATE ASC LIMIT 5";
                $res = mysqli_query($link,  $sql);
                if (mysqli_num_rows($res) > 0) {
                  while ($row = mysqli_fetch_assoc($res)) { ?>
                    <div class="col-md-2 container movie-poster-container mx-auto my-3 p-0">
                      <img src="../images/movies/poster/<?= $row['POSTER'] ?>" alt="<?= $row['MOVIE_TITLE'] ?>" class="movie-poster"> <!-- palitan nung php for db -->
                      <div class="overlay">
                        <a class="text"><?= $row['MOVIE_TITLE'] ?></a> <!-- palitan nung php for db -->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                          <input name="view_id" type="text" value="<?= $row['MOVIE_ID'] ?>" style="display: none;">
                          <input name="view_movie" type="submit" value="View Movie" class="btn buy-button">
                        </form>
                      </div>
                    </div>
                  <?php
                  }
                } else { ?>
                  <div class="col-md-4 container mx-auto my-3 p-0">
                    <h1>Movies Coming Soon...</h1>
                  </div>
                <?php
                } ?>
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