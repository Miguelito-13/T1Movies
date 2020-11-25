<!-- FOOTER -->
<footer class="page-footer font-small footer-custom mt-2 pt-2" id="main-footer">
  <div class="container-fluid text-center text-md-left pb-2">
    <div class="row">
      <div class="col-md-3 my-auto mx-5">
        <img src="../images/T1_Logo_Final1.svg" alt="T1 Movies" class="img-fluid py-2" style="height: 100px" />
      </div>
      <hr class="clearfix w-100 d-md-none pb-3">

      <div class="col-md-3 mb-md-0 my-3 py-auto">
        <h3 class="text-uppercase pb-2">ABOUT US</h3>
        <ul class="list-unstyled">
          <li>
            <a href="aboutus1.php">Who We Are</a>
          </li>
          <li>
            <a href="aboutus2.php">Our Mission & Vision</a>
          </li>
        </ul>
      </div>

      <div class="col-md-3 mb-md-0 my-3 py-auto">
        <h3 class="text-uppercase pb-2">QUICK LINKS</h3>
        <ul class="list-unstyled">
          <li>
            <a href="movies.php">Movies</a>
          </li>
          <li>
            <a href="theaters.php">Theaters</a>
          </li>
        </ul>
      </div>

      <div class="col-md-2 mb-md-0 my-3 py-auto">
        <h3 class="text-uppercase pb-2">MOVIES</h3>
        <ul class="list-unstyled">
          <li>
            <a href="now_showing.php">Now Showing</a>
          </li>
          <li>
            <a href="coming_soon.php">Coming Soon</a>
          </li>
        </ul>
      </div>

    </div>
  </div>

  <div class="footer-copyright text-center py-2">
    <p>©2020 <a href="home.php">T1 Movies Inc.</a> All Rights Reserved.</p>
  </div>

</footer>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script type="text/javascript">
  let modal = document.getElementById("id01");
  let search = document.getElementById("search");

  //Close when clicked outside
  window.onclick = function(event) {
    // Login
    if (event.target == modal) {
      modal.style.display = "none";
      document.getElementById("error1").style.display = "none";
      document.getElementById("error2").style.display = "none";
      document.getElementById("uText").value = "";
      document.getElementById("pText").value = "";
    }
    // Search
    else if (event.target == search) {
      $(document).ready(function() {
        $('.form-search-custom input[type="text"]').on("keyup input", function() {
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".search-result");
          if (inputVal.length) {
            $.get("../config/functions.php", {
              search_term: inputVal,
            }).done(function(data) {
              // Display the returned data in browser
              resultDropdown.html(data);
            });
          } else {
            resultDropdown.empty();
          }
        });

        // Set search input value on click of result item
        $(document).on("click", ".search-result p", function() {
          $(this)
            .parents(".form-search-custom")
            .find('input[type="text"]')
            .val($(this).text());
          $("#search_button").trigger("click");
          $(this).parent(".search-result").empty();
        });
      });
    }
  };
</script>

<?php
// Close Connection 
mysqli_close($link);
?>