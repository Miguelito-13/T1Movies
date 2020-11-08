//-***************************************
//-*               ADMIN
//-***************************************
//-*
// Menu
jQuery(document).ready(function ($) {
  $("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
});

// Table
function showTable(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "../config/selectTable.php?q=" + str, true);
    xmlhttp.send();
  }
}

// Search
$(document).ready(function () {
  $('.search-box input[type="text"]').on("keyup input", function () {
    /* Get input value on change */
    var inputVal = $(this).val();
    var resultDropdown = $(this).siblings(".result");
    if (inputVal.length) {
      $.get("../config/search.php", {
        term: inputVal,
      }).done(function (data) {
        // Display the returned data in browser
        resultDropdown.html(data);
      });
    } else {
      resultDropdown.empty();
    }
  });

  // Set search input value on click of result item
  $(document).on("click", ".result p", function () {
    $(this)
      .parents(".search-box")
      .find('input[type="text"]')
      .val($(this).text());
    $(this).parent(".result").empty();
  });
});
