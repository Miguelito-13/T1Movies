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

    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-genre-all" role="tabpanel" aria-labelledby="nav-genre-all-tab">
        <?php
        $sql = "SELECT * FROM movies WHERE ACTIVE = '1' ORDER BY PREMIERE_DATE ASC";
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
                <div class="text-right mb-auto">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input name="view_id" type="text" value="<?= $row['MOVIE_ID'] ?>" style="display: none;">
                    <input name="view_movie" type="submit" value="View Movie" class="btn buy-button2 p-0">
                  </form>
                </div>
              </div>
            </div>
          <?php
          }
        } else { ?>
          <div class="row justify-content-center custom-table mx-auto py-3">
            <h1>Movies Coming Soon...</h1>
          </div>
        <?php
        } ?>
      </div>
      <!-- ACTION -->
      <div class="tab-pane fade" id="nav-genre-action" role="tabpanel" aria-labelledby="nav-genre-action-tab">
        ...
      </div>
      <div class="tab-pane fade" id="nav-genre-adventure" role="tabpanel" aria-labelledby="nav-genre-adventure-tab">...</div>
      <div class="tab-pane fade" id="nav-genre-animation" role="tabpanel" aria-labelledby="nav-genre-animation-tab">...</div>
      <div class="tab-pane fade" id="nav-genre-comedy" role="tabpanel" aria-labelledby="nav-genre-comedy-tab">...</div>
      <div class="tab-pane fade" id="nav-genre-drama" role="tabpanel" aria-labelledby="nav-genre-drama-tab">...</div>
      <div class="tab-pane fade" id="nav-genre-family" role="tabpanel" aria-labelledby="nav-genre-family-tab">...</div>
      <div class="tab-pane fade" id="nav-genre-fantasy" role="tabpanel" aria-labelledby="nav-genre-fantasy-tab">...</div>
      <div class="tab-pane fade" id="nav-genre-horror" role="tabpanel" aria-labelledby="nav-genre-horror-tab">...</div>
      <div class="tab-pane fade" id="nav-genre-musical" role="tabpanel" aria-labelledby="nav-genre-musical-tab">...</div>
      <div class="tab-pane fade" id="nav-genre-mystery" role="tabpanel" aria-labelledby="nav-genre-mystery-tab">...</div>
      <div class="tab-pane fade" id="nav-genre-sci" role="tabpanel" aria-labelledby="nav-genre-sci-tab">...</div>
      <div class="tab-pane fade" id="nav-genre-romance" role="tabpanel" aria-labelledby="nav-genre-romance-tab">...</div>
      <div class="tab-pane fade" id="nav-genre-thriller" role="tabpanel" aria-labelledby="nav-genre-thriller-tab">...</div>
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