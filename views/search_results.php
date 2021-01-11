<div class="movies-list-container">
    <div>
        <div class="row justify-content-center custom-table mx-auto py-3">
            <div class="col-12 col-sm-4 col-md-2">
                <img src="../images/movies/poster/<?= $row['POSTER'] ?>" style="width: 100%" class="custom-movie-poster"/>
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
    </div>
</div>