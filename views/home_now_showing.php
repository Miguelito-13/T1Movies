<?php
include('header.php');
?>

<div class="col-md-12 mb-5 custom-general-holder">
    <span class="row px-3">
    <h3>NOW SHOWING</h3>
    <a href="now_showing.php" class="ml-auto see-more my-auto">SEE MORE ></a>
    </span>
    <hr />

    <div class="glideNS glide-1" id="glideNS">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides list-unstyled">     
                <?php
                $sql = "SELECT * FROM movies WHERE ACTIVE = '2' ORDER BY MOVIE_TITLE ASC LIMIT 20";
                $res = mysqli_query($link,  $sql);
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) { ?>
                        <!-- NOW SHOWING LIST -->
                        <li class="glide__slide">
                            <div class="row mx-auto px-auto">
                                <div class="col-md-2 container d-flex justify-content-center mx-auto my-3 p-0">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <div class="movie-card">
                                            <img src="../images/movies/poster/<?= $row['POSTER'] ?>" alt="<?= $row['MOVIE_TITLE'] ?>" class="movie-poster">
                                            <div class="card-title">
                                                <h5>
                                                    <?=
                                                        substr($row['MOVIE_TITLE'], 0, 15);
                                                        if(strlen($row['MOVIE_TITLE']) > 15) {
                                                            echo "...";
                                                        }
                                                    ?>
                                                </h5>
                                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                                    <input name="view_id" type="text" value="<?= $row['MOVIE_ID'] ?>" style="display: none;">
                                                    <input name="view_movie" type="submit" value="View Movie" class="btn buy-button">
                                                </form>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <?php
                        }
                        } else { ?>
                            </ul>
                            <div class="row container" style="width: 100vw">
                                <div class="col-12 text-center container d-flex justify-content-center mx-auto my-3 p-0">
                                    <h4 class="pt-2 pb-3" style="z-index:3; width: 100%">Movies Showing Soon...</h4>
                                </div>
                            </div>
                        <?php
                    } ?>        
            
        </div>

        <?php
            $sql = "SELECT * FROM movies WHERE ACTIVE = '2' ORDER BY MOVIE_TITLE ASC LIMIT 20";
            $res = mysqli_query($link,  $sql);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) { ?>
                    <div class="glide__arrows" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fas fa-chevron-left"></i></button>
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fas fa-chevron-right"></i></button>
                    </div>
            <?php }
        } ?>
    </div>
    <hr />
</div>

<script src ="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
<script>
    const config1 = {
        type: "slider",
        perView: 5,
        breakpoints: {
            1200: {
                perView: 4
            },
            1000: {
                perView: 3
            },
            800: {
                perView: 2
            },
            500: {
                perView: 1
            }
        }
    }
    const glide1 = new Glide('.glide-1', config1);
    glide1.mount();
</script>
<script>
    import Glide, { Swipe } from '@glidejs/glide/dist/glide.modular.esm'

    new Glide('#glideNS').mount({ Swipe })
</script>