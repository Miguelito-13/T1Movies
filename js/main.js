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
