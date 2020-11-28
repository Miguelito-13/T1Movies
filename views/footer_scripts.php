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