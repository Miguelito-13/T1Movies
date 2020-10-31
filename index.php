  <?php include('header.php'); ?>

  <body>
    <?php include('navbar.php'); ?>
    <section>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="images/sample_banner.svg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/sample_banner.svg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/sample_banner.svg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </section>

    <!-- main body -->
    <!-- <main>
      <hr />

      <section>
        <div class="slideshow">
          <h1>NOW SHOWING</h1>
          <ul>
            <li>
              <div></div>
            </li>
          </ul>
        </div>
      </section>

      <hr />

      <section>
        <div class="slideshow">
          <h1>COMING SOON</h1>
          <ul>
            <li>
              <div></div>
            </li>
          </ul>
        </div>
      </section>
    </main> -->

    <?php include('footer.php'); ?>
  </body>

  

  </html>