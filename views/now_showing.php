<?php

session_start();

include('header.php');
include('navbar.php');

?>
<section class="container-fluid mb-5" style="margin-top: 150px; width: 90%">
  <div class="genre-menu">
    <nav>
      <!-- insert dropdown button nav for genre here -->
    </nav>
  </div>

  <div class="movies-list-container">
    <h3>NOW SHOWING</h3>
    <hr />

    <?php include('genre_nav.php'); ?>

    <div class="tab-content" id="nav-tabContent">
      <!-- ALL -->
      <div class="tab-pane fade show active" id="nav-genre-all" role="tabpanel" aria-labelledby="nav-genre-all-tab">
        <?php
        $sql = "SELECT * FROM movies WHERE ACTIVE = '2' ORDER BY MOVIE_TITLE ASC";
        $res = mysqli_query($link,  $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) { ?>
            <div class="row justify-content-center custom-table mx-auto py-3">
              <div class="col-12 col-sm-4 col-md-2">
                <img src="../images/movies/poster/<?= $row['POSTER'] ?>" style="width: 100%" />
              </div>
              <div class="col-12 col-sm-8 col-md-10 custom-movies-description">
                <h4 class="pt-2"><?= $row['MOVIE_TITLE'] ?></h4>
                <hr />
                <p id="movieDescription">
                  "<?= $row['MOVIE_DESC'] ?>"
                </p>
                <div class="text-right ml-auto mb-auto col-2">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input name="view_id" type="text" value="<?= $row['MOVIE_ID'] ?>" style="display: none;">
                    <input name="view_movie" type="submit" value="View Movie" class="p-2">
                  </form>
                </div>
              </div>
            </div>
          <?php
          }
        } else { ?>
          <div class="row justify-content-center custom-table mx-auto py-5">
            <h1>Movies Showing Soon...</h1>
          </div>
        <?php
        } ?>
      </div>
      <!-- ACTION -->
      <div class="tab-pane fade" id="nav-genre-action" role="tabpanel" aria-labelledby="nav-genre-action-tab">
        <?php
        $sql = "SELECT * from genre LEFT JOIN movies ON movies.MOVIE_ID = genre.MOVIE_ID WHERE genre.ACTION = '1' AND movies.ACTIVE = '2'";
        $res = mysqli_query($link,  $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) { ?>
            <div class="row justify-content-center custom-table mx-auto py-3">
              <div class="col-12 col-sm-4 col-md-2">
                <img src="../images/movies/poster/<?= $row['POSTER'] ?>" style="width: 100%" />
              </div>
              <div class="col-12 col-sm-8 col-md-10 custom-movies-description">
                <h4 class="pt-2"><?= $row['MOVIE_TITLE'] ?></h4>
                <hr />
                <p id="movieDescription">
                  "<?= $row['MOVIE_DESC'] ?>"
                </p>
                <div class="text-right ml-auto mb-auto col-2">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input name="view_id" type="text" value="<?= $row['MOVIE_ID'] ?>" style="display: none;">
                    <input name="view_movie" type="submit" value="View Movie" class="p-2">
                  </form>
                </div>
              </div>
            </div>
          <?php }
        } else { ?>
          <div class="row justify-content-center custom-table mx-auto py-5">
            <h1>Action Movies Showing Soon...</h1>
          </div>
        <?php
        } ?>
      </div>
      <!-- ADVENTURE -->
      <div class="tab-pane fade" id="nav-genre-adventure" role="tabpanel" aria-labelledby="nav-genre-adventure-tab">
        <?php
        $sql = "SELECT * from genre LEFT JOIN movies ON movies.MOVIE_ID = genre.MOVIE_ID WHERE genre.ADVENTURE = '2' AND movies.ACTIVE = '2'";
        $res = mysqli_query($link,  $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) { ?>
            <div class="row justify-content-center custom-table mx-auto py-3">
              <div class="col-12 col-sm-4 col-md-2">
                <img src="../images/movies/poster/<?= $row['POSTER'] ?>" style="width: 100%" />
              </div>
              <div class="col-12 col-sm-8 col-md-10 custom-movies-description">
                <h4 class="pt-2"><?= $row['MOVIE_TITLE'] ?></h4>
                <hr />
                <p id="movieDescription">
                  "<?= $row['MOVIE_DESC'] ?>"
                </p>
                <div class="text-right ml-auto mb-auto col-2">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input name="view_id" type="text" value="<?= $row['MOVIE_ID'] ?>" style="display: none;">
                    <input name="view_movie" type="submit" value="View Movie" class="p-2">
                  </form>
                </div>
              </div>
            </div>
          <?php }
        } else { ?>
          <div class="row justify-content-center custom-table mx-auto py-5">
            <h1>Adventure Movies Showing Soon...</h1>
          </div>
        <?php
        } ?>
      </div>
      <!-- ANIMATION -->
      <div class="tab-pane fade" id="nav-genre-animation" role="tabpanel" aria-labelledby="nav-genre-animation-tab">
        <?php
        $sql = "SELECT * from genre LEFT JOIN movies ON movies.MOVIE_ID = genre.MOVIE_ID WHERE genre.ANIMATION = '3' AND movies.ACTIVE = '2'";
        $res = mysqli_query($link,  $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) { ?>
            <div class="row justify-content-center custom-table mx-auto py-3">
              <div class="col-12 col-sm-4 col-md-2">
                <img src="../images/movies/poster/<?= $row['POSTER'] ?>" style="width: 100%" />
              </div>
              <div class="col-12 col-sm-8 col-md-10 custom-movies-description">
                <h4 class="pt-2"><?= $row['MOVIE_TITLE'] ?></h4>
                <hr />
                <p id="movieDescription">
                  "<?= $row['MOVIE_DESC'] ?>"
                </p>
                <div class="text-right ml-auto mb-auto col-2">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input name="view_id" type="text" value="<?= $row['MOVIE_ID'] ?>" style="display: none;">
                    <input name="view_movie" type="submit" value="View Movie" class="p-2">
                  </form>
                </div>
              </div>
            </div>
          <?php }
        } else { ?>
          <div class="row justify-content-center custom-table mx-auto py-5">
            <h1>Animation Movies Showing Soon...</h1>
          </div>
        <?php
        } ?>
      </div>
      <!-- COMEDY -->
      <div class="tab-pane fade" id="nav-genre-comedy" role="tabpanel" aria-labelledby="nav-genre-comedy-tab">
        <?php
        $sql = "SELECT * from genre LEFT JOIN movies ON movies.MOVIE_ID = genre.MOVIE_ID WHERE genre.COMEDY = '4' AND movies.ACTIVE = '2'";
        $res = mysqli_query($link,  $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) { ?>
            <div class="row justify-content-center custom-table mx-auto py-3">
              <div class="col-12 col-sm-4 col-md-2">
                <img src="../images/movies/poster/<?= $row['POSTER'] ?>" style="width: 100%" />
              </div>
              <div class="col-12 col-sm-8 col-md-10 custom-movies-description">
                <h4 class="pt-2"><?= $row['MOVIE_TITLE'] ?></h4>
                <hr />
                <p id="movieDescription">
                  "<?= $row['MOVIE_DESC'] ?>"
                </p>
                <div class="text-right ml-auto mb-auto col-2">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input name="view_id" type="text" value="<?= $row['MOVIE_ID'] ?>" style="display: none;">
                    <input name="view_movie" type="submit" value="View Movie" class="p-2">
                  </form>
                </div>
              </div>
            </div>
          <?php }
        } else { ?>
          <div class="row justify-content-center custom-table mx-auto py-5">
            <h1>Comedy Movies Showing Soon...</h1>
          </div>
        <?php
        } ?>
      </div>
      <!-- DRAMA -->
      <div class="tab-pane fade" id="nav-genre-drama" role="tabpanel" aria-labelledby="nav-genre-drama-tab">
        <?php
        $sql = "SELECT * from genre LEFT JOIN movies ON movies.MOVIE_ID = genre.MOVIE_ID WHERE genre.DRAMA = '5' AND movies.ACTIVE = '2'";
        $res = mysqli_query($link,  $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) { ?>
            <div class="row justify-content-center custom-table mx-auto py-3">
              <div class="col-12 col-sm-4 col-md-2">
                <img src="../images/movies/poster/<?= $row['POSTER'] ?>" style="width: 100%" />
              </div>
              <div class="col-12 col-sm-8 col-md-10 custom-movies-description">
                <h4 class="pt-2"><?= $row['MOVIE_TITLE'] ?></h4>
                <hr />
                <p id="movieDescription">
                  "<?= $row['MOVIE_DESC'] ?>"
                </p>
                <div class="text-right ml-auto mb-auto col-2">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input name="view_id" type="text" value="<?= $row['MOVIE_ID'] ?>" style="display: none;">
                    <input name="view_movie" type="submit" value="View Movie" class="p-2">
                  </form>
                </div>
              </div>
            </div>
          <?php }
        } else { ?>
          <div class="row justify-content-center custom-table mx-auto py-5">
            <h1>Drama Movies Showing Soon...</h1>
          </div>
        <?php
        } ?>
      </div>
      <!-- FAMILY -->
      <div class="tab-pane fade" id="nav-genre-family" role="tabpanel" aria-labelledby="nav-genre-family-tab">
        <?php
        $sql = "SELECT * from genre LEFT JOIN movies ON movies.MOVIE_ID = genre.MOVIE_ID WHERE genre.FAMILY = '6' AND movies.ACTIVE = '2'";
        $res = mysqli_query($link,  $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) { ?>
            <div class="row justify-content-center custom-table mx-auto py-3">
              <div class="col-12 col-sm-4 col-md-2">
                <img src="../images/movies/poster/<?= $row['POSTER'] ?>" style="width: 100%" />
              </div>
              <div class="col-12 col-sm-8 col-md-10 custom-movies-description">
                <h4 class="pt-2"><?= $row['MOVIE_TITLE'] ?></h4>
                <hr />
                <p id="movieDescription">
                  "<?= $row['MOVIE_DESC'] ?>"
                </p>
                <div class="text-right ml-auto mb-auto col-2">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input name="view_id" type="text" value="<?= $row['MOVIE_ID'] ?>" style="display: none;">
                    <input name="view_movie" type="submit" value="View Movie" class="p-2">
                  </form>
                </div>
              </div>
            </div>
          <?php }
        } else { ?>
          <div class="row justify-content-center custom-table mx-auto py-5">
            <h1>Family Movies Showing Soon...</h1>
          </div>
        <?php
        } ?>
      </div>
      <!-- FANTASY -->
      <div class="tab-pane fade" id="nav-genre-fantasy" role="tabpanel" aria-labelledby="nav-genre-fantasy-tab">
        <?php
        $sql = "SELECT * from genre LEFT JOIN movies ON movies.MOVIE_ID = genre.MOVIE_ID WHERE genre.FANTASY = '7' AND movies.ACTIVE = '2'";
        $res = mysqli_query($link,  $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) { ?>
            <div class="row justify-content-center custom-table mx-auto py-3">
              <div class="col-12 col-sm-4 col-md-2">
                <img src="../images/movies/poster/<?= $row['POSTER'] ?>" style="width: 100%" />
              </div>
              <div class="col-12 col-sm-8 col-md-10 custom-movies-description">
                <h4 class="pt-2"><?= $row['MOVIE_TITLE'] ?></h4>
                <hr />
                <p id="movieDescription">
                  "<?= $row['MOVIE_DESC'] ?>"
                </p>
                <div class="text-right ml-auto mb-auto col-2">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input name="view_id" type="text" value="<?= $row['MOVIE_ID'] ?>" style="display: none;">
                    <input name="view_movie" type="submit" value="View Movie" class="p-2">
                  </form>
                </div>
              </div>
            </div>
          <?php }
        } else { ?>
          <div class="row justify-content-center custom-table mx-auto py-5">
            <h1>Fantasy Movies Showing Soon...</h1>
          </div>
        <?php
        } ?>
      </div>
      <!-- HORROR -->
      <div class="tab-pane fade" id="nav-genre-horror" role="tabpanel" aria-labelledby="nav-genre-horror-tab">
        <?php
        $sql = "SELECT * from genre LEFT JOIN movies ON movies.MOVIE_ID = genre.MOVIE_ID WHERE genre.HORROR = '8' AND movies.ACTIVE = '2'";
        $res = mysqli_query($link,  $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) { ?>
            <div class="row justify-content-center custom-table mx-auto py-3">
              <div class="col-12 col-sm-4 col-md-2">
                <img src="../images/movies/poster/<?= $row['POSTER'] ?>" style="width: 100%" />
              </div>
              <div class="col-12 col-sm-8 col-md-10 custom-movies-description">
                <h4 class="pt-2"><?= $row['MOVIE_TITLE'] ?></h4>
                <hr />
                <p id="movieDescription">
                  "<?= $row['MOVIE_DESC'] ?>"
                </p>
                <div class="text-right ml-auto mb-auto col-2">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input name="view_id" type="text" value="<?= $row['MOVIE_ID'] ?>" style="display: none;">
                    <input name="view_movie" type="submit" value="View Movie" class="p-2">
                  </form>
                </div>
              </div>
            </div>
          <?php }
        } else { ?>
          <div class="row justify-content-center custom-table mx-auto py-5">
            <h1>Horror Movies Showing Soon...</h1>
          </div>
        <?php
        } ?>
      </div>
      <!-- MUSICAL -->
      <div class="tab-pane fade" id="nav-genre-musical" role="tabpanel" aria-labelledby="nav-genre-musical-tab">
        <?php
        $sql = "SELECT * from genre LEFT JOIN movies ON movies.MOVIE_ID = genre.MOVIE_ID WHERE genre.MUSICAL = '9' AND movies.ACTIVE = '2'";
        $res = mysqli_query($link,  $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) { ?>
            <div class="row justify-content-center custom-table mx-auto py-3">
              <div class="col-12 col-sm-4 col-md-2">
                <img src="../images/movies/poster/<?= $row['POSTER'] ?>" style="width: 100%" />
              </div>
              <div class="col-12 col-sm-8 col-md-10 custom-movies-description">
                <h4 class="pt-2"><?= $row['MOVIE_TITLE'] ?></h4>
                <hr />
                <p id="movieDescription">
                  "<?= $row['MOVIE_DESC'] ?>"
                </p>
                <div class="text-right ml-auto mb-auto col-2">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input name="view_id" type="text" value="<?= $row['MOVIE_ID'] ?>" style="display: none;">
                    <input name="view_movie" type="submit" value="View Movie" class="p-2">
                  </form>
                </div>
              </div>
            </div>
          <?php }
        } else { ?>
          <div class="row justify-content-center custom-table mx-auto py-5">
            <h1>Musical Movies Showing Soon...</h1>
          </div>
        <?php
        } ?>
      </div>
      <!-- MYSTERY -->
      <div class="tab-pane fade" id="nav-genre-mystery" role="tabpanel" aria-labelledby="nav-genre-mystery-tab">
        <?php
        $sql = "SELECT * from genre LEFT JOIN movies ON movies.MOVIE_ID = genre.MOVIE_ID WHERE genre.MYSTERY = '10' AND movies.ACTIVE = '2'";
        $res = mysqli_query($link,  $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) { ?>
            <div class="row justify-content-center custom-table mx-auto py-3">
              <div class="col-12 col-sm-4 col-md-2">
                <img src="../images/movies/poster/<?= $row['POSTER'] ?>" style="width: 100%" />
              </div>
              <div class="col-12 col-sm-8 col-md-10 custom-movies-description">
                <h4 class="pt-2"><?= $row['MOVIE_TITLE'] ?></h4>
                <hr />
                <p id="movieDescription">
                  "<?= $row['MOVIE_DESC'] ?>"
                </p>
                <div class="text-right ml-auto mb-auto col-2">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input name="view_id" type="text" value="<?= $row['MOVIE_ID'] ?>" style="display: none;">
                    <input name="view_movie" type="submit" value="View Movie" class="p-2">
                  </form>
                </div>
              </div>
            </div>
          <?php }
        } else { ?>
          <div class="row justify-content-center custom-table mx-auto py-5">
            <h1>Mystery Movies Showing Soon...</h1>
          </div>
        <?php
        } ?>
      </div>
      <!-- ROMANCE -->
      <div class="tab-pane fade" id="nav-genre-romance" role="tabpanel" aria-labelledby="nav-genre-romance-tab">
        <?php
        $sql = "SELECT * from genre LEFT JOIN movies ON movies.MOVIE_ID = genre.MOVIE_ID WHERE genre.ROMANCE = '11' AND movies.ACTIVE = '2'";
        $res = mysqli_query($link,  $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) { ?>
            <div class="row justify-content-center custom-table mx-auto py-3">
              <div class="col-12 col-sm-4 col-md-2">
                <img src="../images/movies/poster/<?= $row['POSTER'] ?>" style="width: 100%" />
              </div>
              <div class="col-12 col-sm-8 col-md-10 custom-movies-description">
                <h4 class="pt-2"><?= $row['MOVIE_TITLE'] ?></h4>
                <hr />
                <p id="movieDescription">
                  "<?= $row['MOVIE_DESC'] ?>"
                </p>
                <div class="text-right ml-auto mb-auto col-2">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input name="view_id" type="text" value="<?= $row['MOVIE_ID'] ?>" style="display: none;">
                    <input name="view_movie" type="submit" value="View Movie" class="p-2">
                  </form>
                </div>
              </div>
            </div>
          <?php }
        } else { ?>
          <div class="row justify-content-center custom-table mx-auto py-5">
            <h1>Romance Movies Showing Soon...</h1>
          </div>
        <?php
        } ?>
      </div>
      <!-- SCI-FI -->
      <div class="tab-pane fade" id="nav-genre-sci" role="tabpanel" aria-labelledby="nav-genre-sci-tab">
        <?php
        $sql = "SELECT * from genre LEFT JOIN movies ON movies.MOVIE_ID = genre.MOVIE_ID WHERE genre.SCI_FI = '12' AND movies.ACTIVE = '2'";
        $res = mysqli_query($link,  $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) { ?>
            <div class="row justify-content-center custom-table mx-auto py-3">
              <div class="col-12 col-sm-4 col-md-2">
                <img src="../images/movies/poster/<?= $row['POSTER'] ?>" style="width: 100%" />
              </div>
              <div class="col-12 col-sm-8 col-md-10 custom-movies-description">
                <h4 class="pt-2"><?= $row['MOVIE_TITLE'] ?></h4>
                <hr />
                <p id="movieDescription">
                  "<?= $row['MOVIE_DESC'] ?>"
                </p>
                <div class="text-right ml-auto mb-auto col-2">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input name="view_id" type="text" value="<?= $row['MOVIE_ID'] ?>" style="display: none;">
                    <input name="view_movie" type="submit" value="View Movie" class="p-2">
                  </form>
                </div>
              </div>
            </div>
          <?php }
        } else { ?>
          <div class="row justify-content-center custom-table mx-auto py-5">
            <h1>Sci-Fi Movies Showing Soon...</h1>
          </div>
        <?php
        } ?>
      </div>
      <!-- THRILLER -->
      <div class="tab-pane fade" id="nav-genre-thriller" role="tabpanel" aria-labelledby="nav-genre-thriller-tab">
        <?php
        $sql = "SELECT * from genre LEFT JOIN movies ON movies.MOVIE_ID = genre.MOVIE_ID WHERE genre.THRILLER = '13' AND movies.ACTIVE = '2'";
        $res = mysqli_query($link,  $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) { ?>
            <div class="row justify-content-center custom-table mx-auto py-3">
              <div class="col-12 col-sm-4 col-md-2">
                <img src="../images/movies/poster/<?= $row['POSTER'] ?>" style="width: 100%" />
              </div>
              <div class="col-12 col-sm-8 col-md-10 custom-movies-description">
                <h4 class="pt-2"><?= $row['MOVIE_TITLE'] ?></h4>
                <hr />
                <p id="movieDescription">
                  "<?= $row['MOVIE_DESC'] ?>"
                </p>
                <div class="text-right ml-auto mb-auto col-2">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input name="view_id" type="text" value="<?= $row['MOVIE_ID'] ?>" style="display: none;">
                    <input name="view_movie" type="submit" value="View Movie" class="p-2">
                  </form>
                </div>
              </div>
            </div>
          <?php }
        } else { ?>
          <div class="row justify-content-center custom-table mx-auto py-5">
            <h1>Thriller Movies Showing Soon...</h1>
          </div>
        <?php
        } ?>
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