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
    xmlhttp.open("GET", "../config/admin_functions.php?q=" + str, true);
    xmlhttp.send();
  }
}

// Movies
$(document).ready(function () {
  $("#add_button").click(function () {
    $("#course_form")[0].reset();
    $(".modal-title").text("Add Course Details");
    $("#action").val("Add");
    $("#operation").val("Add");
  });

  var dataTable = $("#course_table").DataTable({
    paging: true,
    processing: true,
    serverSide: true,
    order: [],
    info: true,
    ajax: {
      url: "../config/fetch.php",
      type: "POST",
    },
    columnDefs: [
      {
        target: [0, 3, 4],
        orderable: false,
      },
    ],
  });

  $(document).on("submit", "#course_form", function (event) {
    event.preventDefault();
    var id = $("#id").val();
    var course = $("#course").val();
    var students = $("#students").val();

    if (course != "" && students != "") {
      $.ajax({
        url: "../config/insert.php",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (data) {
          $("#course_form")[0].reset();
          $("#userModal").modal("hide");
          dataTable.ajax.reload();
        },
      });
    } else {
      alert("Course Name, Number of students Fields are Required");
    }
  });

  $(document).on("click", ".update", function () {
    var course_id = $(this).attr("id");
    $.ajax({
      url: "../config/fetch_single.php",
      method: "POST",
      data: { course_id: course_id },
      dataType: "json",
      success: function (data) {
        $("#userModal").modal("show");
        $("#id").val(data.id);
        $("#course").val(data.course);
        $("#students").val(data.students);
        $(".modal-title").text("Edit Course Details");
        $("#course_id").val(course_id);
        $("#action").val("Save");
        $("#operation").val("Edit");
      },
    });
  });

  $(document).on("click", ".delete", function () {
    var course_id = $(this).attr("id");
    if (confirm("Are you sure want to delete this user?")) {
      $.ajax({
        url: "../config/delete.php",
        method: "POST",
        data: { course_id: course_id },
        success: function (data) {
          dataTable.ajax.reload();
        },
      });
    } else {
      return false;
    }
  });
});
// End of Movies
