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
