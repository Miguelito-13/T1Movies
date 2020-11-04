//-***************************************
//-*               Index
//-***************************************
//-*
// Modal call
let modal = document.getElementById("id01");

//Close when clicked outside
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

//-**************************************
//-               Login
//-**************************************
//-
//Show Login
let show = "<?php echo $show ?>";
window.onload = function () {
  if (show === "show") {
    document.getElementById("id01").style.display = "block";
  }
};

//-***************************************
//-*               Navbar
//-***************************************
//-*
//Show Logout, Hide Register
let show_logout = "<?php echo $show_logout ?>";
if (show_logout === "show") {
  document.getElementById("id_logout").style.display = "block";
  document.getElementById("id_loginregister").style.display = "none";
} else {
  document.getElementById("id_logout").style.display = "none";
  document.getElementById("id_loginregister").style.display = "block";
}

//-***************************************
//-*               Sign up
//-***************************************
//-*
document.querySelector("#bdate").valueAsDate = new Date();
