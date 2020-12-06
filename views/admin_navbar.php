<?php

// Check if user already logged in
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  $show_logout = "show";
}

?>

<!-- Admin Navigation Bar -->

<header class="container-fluid admin-navbar-header my-0 p-0" style="margin-bottom: 94px">
    <nav class="navbar navbar-expand-md admin-navbar-custom navbar-fixed-top px-5 py-2">
        <a class="navbar-brand logo d-flex align-items-center" href="home.php">
            <img src="../images/T1_Logo_Final1.svg" alt="T1 Movies" class="mx-auto my-0" style="height: 70px">
        </a>
        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#collapsibleAdminNavbar">
            <span class="navbar-toggler-icon "></span>
        </button>        

        <div class="collapse navbar-collapse my-2 py-3" id="collapsibleAdminNavbar">
            <ul class="navbar-nav mr-auto my-auto">
                <li class="nav-item active"><a class="nav-link mx-1 pl-3 pr-4" href="home.php">
                    <?php
                        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                            if ($_SESSION["user_type"] !== 'ADMIN') {
                            echo "HOME";
                            } else {
                            echo "ADMIN";
                            }
                        } else {
                            echo "HOME";
                        }
                    ?>
                </a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mx-1 px-4" href="#" id="navbardrop" data-toggle="dropdown">MOVIES </a>
                    <div class="dropdown-menu py-0 my-2">
                        <a class="dropdown-item mx-0 my-2 px-4" href="now_showing.php">NOW SHOWING</a>
                        <a class="dropdown-item mx-0 my-2 px-4" href="coming_soon.php">COMING SOON</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link mx-1 px-4" href="theaters.php">THEATERS</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mx-1 px-4" href="#" id="navbardrop" data-toggle="dropdown">ACCOUNT </a>
                    <div class="dropdown-menu py-0 my-3">
                        <div id="id_logout" style="display: none;">
                            <a class="dropdown-item mx-0 my-2 px-4" href="profile.php">PROFILE</a>
                            <a class="dropdown-item mx-0 my-2 px-4" href="../config/logout.php">LOG OUT</a>
                        </div>
                        <div id="id_loginregister" style="display: block;">
                            <button class="dropdown-item mx-0 my-2 px-4" onclick="document.getElementById('id01').style.display='block'">LOGIN/SIGN UP</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

</header>

<script>
  // Modal call
  let modal = document.getElementById('id01');
  let search = document.getElementById('search');

  //Close when clicked outside
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
      document.getElementById('error1').style.display = 'none';
      document.getElementById('error2').style.display = 'none';
      document.getElementById("uText").value = "";
      document.getElementById("pText").value = "";
    } else if (event.target == search) {
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

  //Show Logout, Hide Register
  let show_logout = "<?php echo $show_logout ?>";
  if (show_logout === "show") {
    document.getElementById('id_logout').style.display = "block";
    document.getElementById('id_loginregister').style.display = "none";
  } else {
    document.getElementById('id_logout').style.display = "none";
    document.getElementById('id_loginregister').style.display = "block";
  }
</script>