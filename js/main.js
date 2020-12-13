//-***************************************
//-*               MAIN
//-***************************************
//-*

$(document).ready(function () {
  /********************************************************************************************/
  // login, Search, Trailer
  let modal = document.getElementById("id01");
  let search = document.getElementById("search");
  let modal2 = document.getElementById("trailerModal");

  //Close when clicked outside
  window.onclick = function (event) {
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
      $('.form-search-custom input[type="text"]').on(
        "keyup input",
        function () {
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".search-result");
          if (inputVal.length) {
            $.get("../config/functions.php", {
              search_term: inputVal,
            }).done(function (data) {
              // Display the returned data in browser
              resultDropdown.html(data);
            });
          } else {
            resultDropdown.empty();
          }
        }
      );

      // Set search input value on click of result item
      $(document).on("click", ".search-result p", function () {
        $(this)
          .parents(".form-search-custom")
          .find('input[type="text"]')
          .val($(this).text());
        $("#search_button").trigger("click");
        $(this).parent(".search-result").empty();
      });
    } else if (event.target == modal2) {
      $("#trailer").each(function () {
        var el_src = $(this).attr("src");
        $(this).attr("src", el_src);
      });
    }
  };

  /********************************************************************************************/
  // Transaction
  var price;
  var quantity;
  $(".checkCounter").change(function () {
    price = $("#printTotal").text();
    quantity = $("#checkCount").text();
  });

  paypal
    .Buttons({
      createOrder: function (data, actions) {
        return actions.order.create({
          purchase_units: [
            {
              amount: {
                value: price,
              },
            },
          ],
        });
      },
      onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
          console.log(details);
          alert(
            "Thank you for purchasing! You can check your transaction history in the profile page."
          );
          location.reload();
        });
      },
      onCancel: function (data) {
        //window.location.replace("home.php");
      },
    })
    .render("#paypal-payment-button");

  /********************************************************************************************/
  // Movie Profile

  var theater;
  var date;
  var time;

  // Theater
  if (!$("#inputSelectTheater").val()) {
    $("#inputSelectDate").attr("disabled", true);
    $("#inputSelectTime").attr("disabled", true);

    // Disable all seats
    // A
    $("#customCheckA1").attr("disabled", true);
    $("#customCheckA2").attr("disabled", true);
    $("#customCheckA3").attr("disabled", true);
    $("#customCheckA4").attr("disabled", true);
    $("#customCheckA5").attr("disabled", true);
    $("#customCheckA6").attr("disabled", true);
    $("#customCheckA7").attr("disabled", true);
    $("#customCheckA8").attr("disabled", true);
    // B
    $("#customCheckB1").attr("disabled", true);
    $("#customCheckB2").attr("disabled", true);
    $("#customCheckB3").attr("disabled", true);
    $("#customCheckB4").attr("disabled", true);
    $("#customCheckB5").attr("disabled", true);
    $("#customCheckB6").attr("disabled", true);
    $("#customCheckB7").attr("disabled", true);
    $("#customCheckB8").attr("disabled", true);
    $("#customCheckB9").attr("disabled", true);
    $("#customCheckB10").attr("disabled", true);
    // C
    $("#customCheckC1").attr("disabled", true);
    $("#customCheckC2").attr("disabled", true);
    $("#customCheckC3").attr("disabled", true);
    $("#customCheckC4").attr("disabled", true);
    $("#customCheckC5").attr("disabled", true);
    $("#customCheckC6").attr("disabled", true);
    $("#customCheckC7").attr("disabled", true);
    $("#customCheckC8").attr("disabled", true);
    $("#customCheckC9").attr("disabled", true);
    $("#customCheckC10").attr("disabled", true);
    // D
    $("#customCheckD1").attr("disabled", true);
    $("#customCheckD2").attr("disabled", true);
    $("#customCheckD3").attr("disabled", true);
    $("#customCheckD4").attr("disabled", true);
    $("#customCheckD5").attr("disabled", true);
    $("#customCheckD6").attr("disabled", true);
    $("#customCheckD7").attr("disabled", true);
    $("#customCheckD8").attr("disabled", true);
    // E
    $("#customCheckE1").attr("disabled", true);
    $("#customCheckE2").attr("disabled", true);
    $("#customCheckE3").attr("disabled", true);
    $("#customCheckE4").attr("disabled", true);
    $("#customCheckE5").attr("disabled", true);
    $("#customCheckE6").attr("disabled", true);
    $("#customCheckE7").attr("disabled", true);
    $("#customCheckE8").attr("disabled", true);
    // F
    $("#customCheckF1").attr("disabled", true);
    $("#customCheckF2").attr("disabled", true);
    $("#customCheckF3").attr("disabled", true);
    $("#customCheckF4").attr("disabled", true);
    $("#customCheckF5").attr("disabled", true);
    $("#customCheckF6").attr("disabled", true);
    $("#customCheckF7").attr("disabled", true);
    $("#customCheckF8").attr("disabled", true);
    $("#customCheckF9").attr("disabled", true);
    $("#customCheckF10").attr("disabled", true);
    // G
    $("#customCheckG1").attr("disabled", true);
    $("#customCheckG2").attr("disabled", true);
    $("#customCheckG3").attr("disabled", true);
    $("#customCheckG4").attr("disabled", true);
    $("#customCheckG5").attr("disabled", true);
    $("#customCheckG6").attr("disabled", true);
    $("#customCheckG7").attr("disabled", true);
    $("#customCheckG8").attr("disabled", true);
    $("#customCheckG9").attr("disabled", true);
    $("#customCheckG10").attr("disabled", true);
    // H
    $("#customCheckH1").attr("disabled", true);
    $("#customCheckH2").attr("disabled", true);
    $("#customCheckH3").attr("disabled", true);
    $("#customCheckH4").attr("disabled", true);
    $("#customCheckH5").attr("disabled", true);
    $("#customCheckH6").attr("disabled", true);
    $("#customCheckH7").attr("disabled", true);
    $("#customCheckH8").attr("disabled", true);
    $("#customCheckH9").attr("disabled", true);
    $("#customCheckH10").attr("disabled", true);
  }

  $("#inputSelectTheater").change(function () {
    $("#inputSelectDate").attr("disabled", false);
    $("#inputSelectDate").val("Select Date");
    theater = $("#inputSelectTheater").val();

    $("#printTotal").text("0");
    $("#printSubtotal").text("0");
    $("#checkCount").text("0");

    // Disable all seats
    // A
    $("#customCheckA1").attr("disabled", true);
    $("#customCheckA2").attr("disabled", true);
    $("#customCheckA3").attr("disabled", true);
    $("#customCheckA4").attr("disabled", true);
    $("#customCheckA5").attr("disabled", true);
    $("#customCheckA6").attr("disabled", true);
    $("#customCheckA7").attr("disabled", true);
    $("#customCheckA8").attr("disabled", true);
    // B
    $("#customCheckB1").attr("disabled", true);
    $("#customCheckB2").attr("disabled", true);
    $("#customCheckB3").attr("disabled", true);
    $("#customCheckB4").attr("disabled", true);
    $("#customCheckB5").attr("disabled", true);
    $("#customCheckB6").attr("disabled", true);
    $("#customCheckB7").attr("disabled", true);
    $("#customCheckB8").attr("disabled", true);
    $("#customCheckB9").attr("disabled", true);
    $("#customCheckB10").attr("disabled", true);
    // C
    $("#customCheckC1").attr("disabled", true);
    $("#customCheckC2").attr("disabled", true);
    $("#customCheckC3").attr("disabled", true);
    $("#customCheckC4").attr("disabled", true);
    $("#customCheckC5").attr("disabled", true);
    $("#customCheckC6").attr("disabled", true);
    $("#customCheckC7").attr("disabled", true);
    $("#customCheckC8").attr("disabled", true);
    $("#customCheckC9").attr("disabled", true);
    $("#customCheckC10").attr("disabled", true);
    // D
    $("#customCheckD1").attr("disabled", true);
    $("#customCheckD2").attr("disabled", true);
    $("#customCheckD3").attr("disabled", true);
    $("#customCheckD4").attr("disabled", true);
    $("#customCheckD5").attr("disabled", true);
    $("#customCheckD6").attr("disabled", true);
    $("#customCheckD7").attr("disabled", true);
    $("#customCheckD8").attr("disabled", true);
    // E
    $("#customCheckE1").attr("disabled", true);
    $("#customCheckE2").attr("disabled", true);
    $("#customCheckE3").attr("disabled", true);
    $("#customCheckE4").attr("disabled", true);
    $("#customCheckE5").attr("disabled", true);
    $("#customCheckE6").attr("disabled", true);
    $("#customCheckE7").attr("disabled", true);
    $("#customCheckE8").attr("disabled", true);
    // F
    $("#customCheckF1").attr("disabled", true);
    $("#customCheckF2").attr("disabled", true);
    $("#customCheckF3").attr("disabled", true);
    $("#customCheckF4").attr("disabled", true);
    $("#customCheckF5").attr("disabled", true);
    $("#customCheckF6").attr("disabled", true);
    $("#customCheckF7").attr("disabled", true);
    $("#customCheckF8").attr("disabled", true);
    $("#customCheckF9").attr("disabled", true);
    $("#customCheckF10").attr("disabled", true);
    // G
    $("#customCheckG1").attr("disabled", true);
    $("#customCheckG2").attr("disabled", true);
    $("#customCheckG3").attr("disabled", true);
    $("#customCheckG4").attr("disabled", true);
    $("#customCheckG5").attr("disabled", true);
    $("#customCheckG6").attr("disabled", true);
    $("#customCheckG7").attr("disabled", true);
    $("#customCheckG8").attr("disabled", true);
    $("#customCheckG9").attr("disabled", true);
    $("#customCheckG10").attr("disabled", true);
    // H
    $("#customCheckH1").attr("disabled", true);
    $("#customCheckH2").attr("disabled", true);
    $("#customCheckH3").attr("disabled", true);
    $("#customCheckH4").attr("disabled", true);
    $("#customCheckH5").attr("disabled", true);
    $("#customCheckH6").attr("disabled", true);
    $("#customCheckH7").attr("disabled", true);
    $("#customCheckH8").attr("disabled", true);
    $("#customCheckH9").attr("disabled", true);
    $("#customCheckH10").attr("disabled", true);
    // Uncheck all seats
    // A
    $("#customCheckA1").prop("checked", false);
    $("#customCheckA2").prop("checked", false);
    $("#customCheckA3").prop("checked", false);
    $("#customCheckA4").prop("checked", false);
    $("#customCheckA5").prop("checked", false);
    $("#customCheckA6").prop("checked", false);
    $("#customCheckA7").prop("checked", false);
    $("#customCheckA8").prop("checked", false);
    // B
    $("#customCheckB1").prop("checked", false);
    $("#customCheckB2").prop("checked", false);
    $("#customCheckB3").prop("checked", false);
    $("#customCheckB4").prop("checked", false);
    $("#customCheckB5").prop("checked", false);
    $("#customCheckB6").prop("checked", false);
    $("#customCheckB7").prop("checked", false);
    $("#customCheckB8").prop("checked", false);
    $("#customCheckB9").prop("checked", false);
    $("#customCheckB10").prop("checked", false);
    // C
    $("#customCheckC1").prop("checked", false);
    $("#customCheckC2").prop("checked", false);
    $("#customCheckC3").prop("checked", false);
    $("#customCheckC4").prop("checked", false);
    $("#customCheckC5").prop("checked", false);
    $("#customCheckC6").prop("checked", false);
    $("#customCheckC7").prop("checked", false);
    $("#customCheckC8").prop("checked", false);
    $("#customCheckC9").prop("checked", false);
    $("#customCheckC10").prop("checked", false);
    // D
    $("#customCheckD1").prop("checked", false);
    $("#customCheckD2").prop("checked", false);
    $("#customCheckD3").prop("checked", false);
    $("#customCheckD4").prop("checked", false);
    $("#customCheckD5").prop("checked", false);
    $("#customCheckD6").prop("checked", false);
    $("#customCheckD7").prop("checked", false);
    $("#customCheckD8").prop("checked", false);
    // E
    $("#customCheckE1").prop("checked", false);
    $("#customCheckE2").prop("checked", false);
    $("#customCheckE3").prop("checked", false);
    $("#customCheckE4").prop("checked", false);
    $("#customCheckE5").prop("checked", false);
    $("#customCheckE6").prop("checked", false);
    $("#customCheckE7").prop("checked", false);
    $("#customCheckE8").prop("checked", false);
    // F
    $("#customCheckF1").prop("checked", false);
    $("#customCheckF2").prop("checked", false);
    $("#customCheckF3").prop("checked", false);
    $("#customCheckF4").prop("checked", false);
    $("#customCheckF5").prop("checked", false);
    $("#customCheckF6").prop("checked", false);
    $("#customCheckF7").prop("checked", false);
    $("#customCheckF8").prop("checked", false);
    $("#customCheckF9").prop("checked", false);
    $("#customCheckF10").prop("checked", false);
    // G
    $("#customCheckG1").prop("checked", false);
    $("#customCheckG2").prop("checked", false);
    $("#customCheckG3").prop("checked", false);
    $("#customCheckG4").prop("checked", false);
    $("#customCheckG5").prop("checked", false);
    $("#customCheckG6").prop("checked", false);
    $("#customCheckG7").prop("checked", false);
    $("#customCheckG8").prop("checked", false);
    $("#customCheckG9").prop("checked", false);
    $("#customCheckG10").prop("checked", false);
    // H
    $("#customCheckH1").prop("checked", false);
    $("#customCheckH2").prop("checked", false);
    $("#customCheckH3").prop("checked", false);
    $("#customCheckH4").prop("checked", false);
    $("#customCheckH5").prop("checked", false);
    $("#customCheckH6").prop("checked", false);
    $("#customCheckH7").prop("checked", false);
    $("#customCheckH8").prop("checked", false);
    $("#customCheckH9").prop("checked", false);
    $("#customCheckH10").prop("checked", false);
  });

  //Date
  $("#inputSelectDate").change(function () {
    $("#inputSelectTime").attr("disabled", false);
    $("#inputSelectTime").val("Select Time");

    $("#printTotal").text("0");
    $("#printSubtotal").text("0");
    $("#checkCount").text("0");

    // Disable all seats
    // A
    $("#customCheckA1").attr("disabled", true);
    $("#customCheckA2").attr("disabled", true);
    $("#customCheckA3").attr("disabled", true);
    $("#customCheckA4").attr("disabled", true);
    $("#customCheckA5").attr("disabled", true);
    $("#customCheckA6").attr("disabled", true);
    $("#customCheckA7").attr("disabled", true);
    $("#customCheckA8").attr("disabled", true);
    // B
    $("#customCheckB1").attr("disabled", true);
    $("#customCheckB2").attr("disabled", true);
    $("#customCheckB3").attr("disabled", true);
    $("#customCheckB4").attr("disabled", true);
    $("#customCheckB5").attr("disabled", true);
    $("#customCheckB6").attr("disabled", true);
    $("#customCheckB7").attr("disabled", true);
    $("#customCheckB8").attr("disabled", true);
    $("#customCheckB9").attr("disabled", true);
    $("#customCheckB10").attr("disabled", true);
    // C
    $("#customCheckC1").attr("disabled", true);
    $("#customCheckC2").attr("disabled", true);
    $("#customCheckC3").attr("disabled", true);
    $("#customCheckC4").attr("disabled", true);
    $("#customCheckC5").attr("disabled", true);
    $("#customCheckC6").attr("disabled", true);
    $("#customCheckC7").attr("disabled", true);
    $("#customCheckC8").attr("disabled", true);
    $("#customCheckC9").attr("disabled", true);
    $("#customCheckC10").attr("disabled", true);
    // D
    $("#customCheckD1").attr("disabled", true);
    $("#customCheckD2").attr("disabled", true);
    $("#customCheckD3").attr("disabled", true);
    $("#customCheckD4").attr("disabled", true);
    $("#customCheckD5").attr("disabled", true);
    $("#customCheckD6").attr("disabled", true);
    $("#customCheckD7").attr("disabled", true);
    $("#customCheckD8").attr("disabled", true);
    // E
    $("#customCheckE1").attr("disabled", true);
    $("#customCheckE2").attr("disabled", true);
    $("#customCheckE3").attr("disabled", true);
    $("#customCheckE4").attr("disabled", true);
    $("#customCheckE5").attr("disabled", true);
    $("#customCheckE6").attr("disabled", true);
    $("#customCheckE7").attr("disabled", true);
    $("#customCheckE8").attr("disabled", true);
    // F
    $("#customCheckF1").attr("disabled", true);
    $("#customCheckF2").attr("disabled", true);
    $("#customCheckF3").attr("disabled", true);
    $("#customCheckF4").attr("disabled", true);
    $("#customCheckF5").attr("disabled", true);
    $("#customCheckF6").attr("disabled", true);
    $("#customCheckF7").attr("disabled", true);
    $("#customCheckF8").attr("disabled", true);
    $("#customCheckF9").attr("disabled", true);
    $("#customCheckF10").attr("disabled", true);
    // G
    $("#customCheckG1").attr("disabled", true);
    $("#customCheckG2").attr("disabled", true);
    $("#customCheckG3").attr("disabled", true);
    $("#customCheckG4").attr("disabled", true);
    $("#customCheckG5").attr("disabled", true);
    $("#customCheckG6").attr("disabled", true);
    $("#customCheckG7").attr("disabled", true);
    $("#customCheckG8").attr("disabled", true);
    $("#customCheckG9").attr("disabled", true);
    $("#customCheckG10").attr("disabled", true);
    // H
    $("#customCheckH1").attr("disabled", true);
    $("#customCheckH2").attr("disabled", true);
    $("#customCheckH3").attr("disabled", true);
    $("#customCheckH4").attr("disabled", true);
    $("#customCheckH5").attr("disabled", true);
    $("#customCheckH6").attr("disabled", true);
    $("#customCheckH7").attr("disabled", true);
    $("#customCheckH8").attr("disabled", true);
    $("#customCheckH9").attr("disabled", true);
    $("#customCheckH10").attr("disabled", true);
    // Uncheck all seats
    // A
    $("#customCheckA1").prop("checked", false);
    $("#customCheckA2").prop("checked", false);
    $("#customCheckA3").prop("checked", false);
    $("#customCheckA4").prop("checked", false);
    $("#customCheckA5").prop("checked", false);
    $("#customCheckA6").prop("checked", false);
    $("#customCheckA7").prop("checked", false);
    $("#customCheckA8").prop("checked", false);
    // B
    $("#customCheckB1").prop("checked", false);
    $("#customCheckB2").prop("checked", false);
    $("#customCheckB3").prop("checked", false);
    $("#customCheckB4").prop("checked", false);
    $("#customCheckB5").prop("checked", false);
    $("#customCheckB6").prop("checked", false);
    $("#customCheckB7").prop("checked", false);
    $("#customCheckB8").prop("checked", false);
    $("#customCheckB9").prop("checked", false);
    $("#customCheckB10").prop("checked", false);
    // C
    $("#customCheckC1").prop("checked", false);
    $("#customCheckC2").prop("checked", false);
    $("#customCheckC3").prop("checked", false);
    $("#customCheckC4").prop("checked", false);
    $("#customCheckC5").prop("checked", false);
    $("#customCheckC6").prop("checked", false);
    $("#customCheckC7").prop("checked", false);
    $("#customCheckC8").prop("checked", false);
    $("#customCheckC9").prop("checked", false);
    $("#customCheckC10").prop("checked", false);
    // D
    $("#customCheckD1").prop("checked", false);
    $("#customCheckD2").prop("checked", false);
    $("#customCheckD3").prop("checked", false);
    $("#customCheckD4").prop("checked", false);
    $("#customCheckD5").prop("checked", false);
    $("#customCheckD6").prop("checked", false);
    $("#customCheckD7").prop("checked", false);
    $("#customCheckD8").prop("checked", false);
    // E
    $("#customCheckE1").prop("checked", false);
    $("#customCheckE2").prop("checked", false);
    $("#customCheckE3").prop("checked", false);
    $("#customCheckE4").prop("checked", false);
    $("#customCheckE5").prop("checked", false);
    $("#customCheckE6").prop("checked", false);
    $("#customCheckE7").prop("checked", false);
    $("#customCheckE8").prop("checked", false);
    // F
    $("#customCheckF1").prop("checked", false);
    $("#customCheckF2").prop("checked", false);
    $("#customCheckF3").prop("checked", false);
    $("#customCheckF4").prop("checked", false);
    $("#customCheckF5").prop("checked", false);
    $("#customCheckF6").prop("checked", false);
    $("#customCheckF7").prop("checked", false);
    $("#customCheckF8").prop("checked", false);
    $("#customCheckF9").prop("checked", false);
    $("#customCheckF10").prop("checked", false);
    // G
    $("#customCheckG1").prop("checked", false);
    $("#customCheckG2").prop("checked", false);
    $("#customCheckG3").prop("checked", false);
    $("#customCheckG4").prop("checked", false);
    $("#customCheckG5").prop("checked", false);
    $("#customCheckG6").prop("checked", false);
    $("#customCheckG7").prop("checked", false);
    $("#customCheckG8").prop("checked", false);
    $("#customCheckG9").prop("checked", false);
    $("#customCheckG10").prop("checked", false);
    // H
    $("#customCheckH1").prop("checked", false);
    $("#customCheckH2").prop("checked", false);
    $("#customCheckH3").prop("checked", false);
    $("#customCheckH4").prop("checked", false);
    $("#customCheckH5").prop("checked", false);
    $("#customCheckH6").prop("checked", false);
    $("#customCheckH7").prop("checked", false);
    $("#customCheckH8").prop("checked", false);
    $("#customCheckH9").prop("checked", false);
    $("#customCheckH10").prop("checked", false);

    var today = new Date().toISOString().split("T")[0];
    date = $("#inputSelectDate").val().substr(1);
    if (today === date) {
      var d = new Date(); //without params it defaults to "now"
      var t = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
      if (t.substr(0, 1) != 1 && t.substr(0, 1) != 2) {
        t = "0" + t;
      }
      if (t > "10:30:00") {
        $("#time1").attr("disabled", true);
      }
      if (t > "14:00:00") {
        $("#time2").attr("disabled", true);
      }
      if (t > "17:30:00") {
        $("#time3").attr("disabled", true);
      }
    } else {
      $("#time1").attr("disabled", false);
      $("#time2").attr("disabled", false);
      $("#time3").attr("disabled", false);
    }
  });

  // Time
  $("#inputSelectTime").change(function () {
    // Uncheck all seats
    // A
    $("#customCheckA1").prop("checked", false);
    $("#customCheckA2").prop("checked", false);
    $("#customCheckA3").prop("checked", false);
    $("#customCheckA4").prop("checked", false);
    $("#customCheckA5").prop("checked", false);
    $("#customCheckA6").prop("checked", false);
    $("#customCheckA7").prop("checked", false);
    $("#customCheckA8").prop("checked", false);
    // B
    $("#customCheckB1").prop("checked", false);
    $("#customCheckB2").prop("checked", false);
    $("#customCheckB3").prop("checked", false);
    $("#customCheckB4").prop("checked", false);
    $("#customCheckB5").prop("checked", false);
    $("#customCheckB6").prop("checked", false);
    $("#customCheckB7").prop("checked", false);
    $("#customCheckB8").prop("checked", false);
    $("#customCheckB9").prop("checked", false);
    $("#customCheckB10").prop("checked", false);
    // C
    $("#customCheckC1").prop("checked", false);
    $("#customCheckC2").prop("checked", false);
    $("#customCheckC3").prop("checked", false);
    $("#customCheckC4").prop("checked", false);
    $("#customCheckC5").prop("checked", false);
    $("#customCheckC6").prop("checked", false);
    $("#customCheckC7").prop("checked", false);
    $("#customCheckC8").prop("checked", false);
    $("#customCheckC9").prop("checked", false);
    $("#customCheckC10").prop("checked", false);
    // D
    $("#customCheckD1").prop("checked", false);
    $("#customCheckD2").prop("checked", false);
    $("#customCheckD3").prop("checked", false);
    $("#customCheckD4").prop("checked", false);
    $("#customCheckD5").prop("checked", false);
    $("#customCheckD6").prop("checked", false);
    $("#customCheckD7").prop("checked", false);
    $("#customCheckD8").prop("checked", false);
    // E
    $("#customCheckE1").prop("checked", false);
    $("#customCheckE2").prop("checked", false);
    $("#customCheckE3").prop("checked", false);
    $("#customCheckE4").prop("checked", false);
    $("#customCheckE5").prop("checked", false);
    $("#customCheckE6").prop("checked", false);
    $("#customCheckE7").prop("checked", false);
    $("#customCheckE8").prop("checked", false);
    // F
    $("#customCheckF1").prop("checked", false);
    $("#customCheckF2").prop("checked", false);
    $("#customCheckF3").prop("checked", false);
    $("#customCheckF4").prop("checked", false);
    $("#customCheckF5").prop("checked", false);
    $("#customCheckF6").prop("checked", false);
    $("#customCheckF7").prop("checked", false);
    $("#customCheckF8").prop("checked", false);
    $("#customCheckF9").prop("checked", false);
    $("#customCheckF10").prop("checked", false);
    // G
    $("#customCheckG1").prop("checked", false);
    $("#customCheckG2").prop("checked", false);
    $("#customCheckG3").prop("checked", false);
    $("#customCheckG4").prop("checked", false);
    $("#customCheckG5").prop("checked", false);
    $("#customCheckG6").prop("checked", false);
    $("#customCheckG7").prop("checked", false);
    $("#customCheckG8").prop("checked", false);
    $("#customCheckG9").prop("checked", false);
    $("#customCheckG10").prop("checked", false);
    // H
    $("#customCheckH1").prop("checked", false);
    $("#customCheckH2").prop("checked", false);
    $("#customCheckH3").prop("checked", false);
    $("#customCheckH4").prop("checked", false);
    $("#customCheckH5").prop("checked", false);
    $("#customCheckH6").prop("checked", false);
    $("#customCheckH7").prop("checked", false);
    $("#customCheckH8").prop("checked", false);
    $("#customCheckH9").prop("checked", false);
    $("#customCheckH10").prop("checked", false);
    // Enable seats
    // A
    $("#customCheckA1").attr("disabled", false);
    $("#customCheckA2").attr("disabled", false);
    $("#customCheckA3").attr("disabled", false);
    $("#customCheckA4").attr("disabled", false);
    $("#customCheckA5").attr("disabled", false);
    $("#customCheckA6").attr("disabled", false);
    $("#customCheckA7").attr("disabled", false);
    $("#customCheckA8").attr("disabled", false);
    // B
    $("#customCheckB1").attr("disabled", false);
    $("#customCheckB2").attr("disabled", false);
    $("#customCheckB3").attr("disabled", false);
    $("#customCheckB4").attr("disabled", false);
    $("#customCheckB5").attr("disabled", false);
    $("#customCheckB6").attr("disabled", false);
    $("#customCheckB7").attr("disabled", false);
    $("#customCheckB8").attr("disabled", false);
    $("#customCheckB9").attr("disabled", false);
    $("#customCheckB10").attr("disabled", false);
    // C
    $("#customCheckC1").attr("disabled", false);
    $("#customCheckC2").attr("disabled", false);
    $("#customCheckC3").attr("disabled", false);
    $("#customCheckC4").attr("disabled", false);
    $("#customCheckC5").attr("disabled", false);
    $("#customCheckC6").attr("disabled", false);
    $("#customCheckC7").attr("disabled", false);
    $("#customCheckC8").attr("disabled", false);
    $("#customCheckC9").attr("disabled", false);
    $("#customCheckC10").attr("disabled", false);
    // D
    $("#customCheckD1").attr("disabled", false);
    $("#customCheckD2").attr("disabled", false);
    $("#customCheckD3").attr("disabled", false);
    $("#customCheckD4").attr("disabled", false);
    $("#customCheckD5").attr("disabled", false);
    $("#customCheckD6").attr("disabled", false);
    $("#customCheckD7").attr("disabled", false);
    $("#customCheckD8").attr("disabled", false);
    // E
    $("#customCheckE1").attr("disabled", false);
    $("#customCheckE2").attr("disabled", false);
    $("#customCheckE3").attr("disabled", false);
    $("#customCheckE4").attr("disabled", false);
    $("#customCheckE5").attr("disabled", false);
    $("#customCheckE6").attr("disabled", false);
    $("#customCheckE7").attr("disabled", false);
    $("#customCheckE8").attr("disabled", false);
    // F
    $("#customCheckF1").attr("disabled", false);
    $("#customCheckF2").attr("disabled", false);
    $("#customCheckF3").attr("disabled", false);
    $("#customCheckF4").attr("disabled", false);
    $("#customCheckF5").attr("disabled", false);
    $("#customCheckF6").attr("disabled", false);
    $("#customCheckF7").attr("disabled", false);
    $("#customCheckF8").attr("disabled", false);
    $("#customCheckF9").attr("disabled", false);
    $("#customCheckF10").attr("disabled", false);
    // G
    $("#customCheckG1").attr("disabled", false);
    $("#customCheckG2").attr("disabled", false);
    $("#customCheckG3").attr("disabled", false);
    $("#customCheckG4").attr("disabled", false);
    $("#customCheckG5").attr("disabled", false);
    $("#customCheckG6").attr("disabled", false);
    $("#customCheckG7").attr("disabled", false);
    $("#customCheckG8").attr("disabled", false);
    $("#customCheckG9").attr("disabled", false);
    $("#customCheckG10").attr("disabled", false);
    // H
    $("#customCheckH1").attr("disabled", false);
    $("#customCheckH2").attr("disabled", false);
    $("#customCheckH3").attr("disabled", false);
    $("#customCheckH4").attr("disabled", false);
    $("#customCheckH5").attr("disabled", false);
    $("#customCheckH6").attr("disabled", false);
    $("#customCheckH7").attr("disabled", false);
    $("#customCheckH8").attr("disabled", false);
    $("#customCheckH9").attr("disabled", false);
    $("#customCheckH10").attr("disabled", false);

    $("#printTotal").text("0");
    $("#printSubtotal").text("0");
    $("#checkCount").text("0");
    time = $("#inputSelectTime").val();
    var movie_id = $(".movie_id").attr("id");
    var day = $("#inputSelectDate").val().substr(0, 1);
    $.ajax({
      url: "../config/server/reservation_data.php",
      method: "POST",
      data: {
        movie_id: movie_id,
        theater: theater,
        day: day,
        time: time,
      },
      dataType: "json",
      success: function (data) {
        $(".movie_id").val(movie_id);

        // A
        if (data.a1 == "A1") {
          $("#customCheckA1").attr("disabled", true);
          $("#customCheckA1").prop("checked", true);
        } else {
          $("#customCheckA1").attr("disabled", false);
          $("#customCheckA1").prop("checked", false);
        }
        if (data.a2 == "A2") {
          $("#customCheckA2").attr("disabled", true);
          $("#customCheckA2").prop("checked", true);
        } else {
          $("#customCheckA2").attr("disabled", false);
          $("#customCheckA2").prop("checked", false);
        }
        if (data.a3 == "A3") {
          $("#customCheckA3").attr("disabled", true);
          $("#customCheckA3").prop("checked", true);
        } else {
          $("#customCheckA3").attr("disabled", false);
          $("#customCheckA3").prop("checked", false);
        }
        if (data.a4 == "A4") {
          $("#customCheckA4").attr("disabled", true);
          $("#customCheckA4").prop("checked", true);
        } else {
          $("#customCheckA4").attr("disabled", false);
          $("#customCheckA4").prop("checked", false);
        }
        if (data.a5 == "A5") {
          $("#customCheckA5").attr("disabled", true);
          $("#customCheckA5").prop("checked", true);
        } else {
          $("#customCheckA5").attr("disabled", false);
          $("#customCheckA5").prop("checked", false);
        }
        if (data.a6 == "A6") {
          $("#customCheckA6").attr("disabled", true);
          $("#customCheckA6").prop("checked", true);
        } else {
          $("#customCheckA6").attr("disabled", false);
          $("#customCheckA6").prop("checked", false);
        }
        if (data.a7 == "A7") {
          $("#customCheckA7").attr("disabled", true);
          $("#customCheckA7").prop("checked", true);
        } else {
          $("#customCheckA7").attr("disabled", false);
          $("#customCheckA7").prop("checked", false);
        }
        if (data.a8 == "A8") {
          $("#customCheckA8").attr("disabled", true);
          $("#customCheckA8").prop("checked", true);
        } else {
          $("#customCheckA8").attr("disabled", false);
          $("#customCheckA8").prop("checked", false);
        }
        // B
        if (data.b1 == "B1") {
          $("#customCheckB1").attr("disabled", true);
          $("#customCheckB1").prop("checked", true);
        } else {
          $("#customCheckB1").attr("disabled", false);
          $("#customCheckB1").prop("checked", false);
        }
        if (data.b2 == "B2") {
          $("#customCheckB2").attr("disabled", true);
          $("#customCheckB2").prop("checked", true);
        } else {
          $("#customCheckB2").attr("disabled", false);
          $("#customCheckB2").prop("checked", false);
        }
        if (data.b3 == "B3") {
          $("#customCheckB3").attr("disabled", true);
          $("#customCheckB3").prop("checked", true);
        } else {
          $("#customCheckB3").attr("disabled", false);
          $("#customCheckB3").prop("checked", false);
        }
        if (data.b4 == "B4") {
          $("#customCheckB4").attr("disabled", true);
          $("#customCheckB4").prop("checked", true);
        } else {
          $("#customCheckB4").attr("disabled", false);
          $("#customCheckB4").prop("checked", false);
        }
        if (data.b5 == "B5") {
          $("#customCheckB5").attr("disabled", true);
          $("#customCheckB5").prop("checked", true);
        } else {
          $("#customCheckB5").attr("disabled", false);
          $("#customCheckB5").prop("checked", false);
        }
        if (data.b6 == "B6") {
          $("#customCheckB6").attr("disabled", true);
          $("#customCheckB6").prop("checked", true);
        } else {
          $("#customCheckB6").attr("disabled", false);
          $("#customCheckB6").prop("checked", false);
        }
        if (data.b7 == "B7") {
          $("#customCheckB7").attr("disabled", true);
          $("#customCheckB7").prop("checked", true);
        } else {
          $("#customCheckB7").attr("disabled", false);
          $("#customCheckB7").prop("checked", false);
        }
        if (data.b8 == "B8") {
          $("#customCheckB8").attr("disabled", true);
          $("#customCheckB8").prop("checked", true);
        } else {
          $("#customCheckB8").attr("disabled", false);
          $("#customCheckB8").prop("checked", false);
        }
        if (data.b9 == "B9") {
          $("#customCheckB9").attr("disabled", true);
          $("#customCheckB9").prop("checked", true);
        } else {
          $("#customCheckB9").attr("disabled", false);
          $("#customCheckB9").prop("checked", false);
        }
        if (data.b10 == "B10") {
          $("#customCheckB10").attr("disabled", true);
          $("#customCheckB10").prop("checked", true);
        } else {
          $("#customCheckB10").attr("disabled", false);
          $("#customCheckB10").prop("checked", false);
        }
        // C
        if (data.c1 == "C1") {
          $("#customCheckC1").attr("disabled", true);
          $("#customCheckC1").prop("checked", true);
        } else {
          $("#customCheckC1").attr("disabled", false);
          $("#customCheckC1").prop("checked", false);
        }
        if (data.c2 == "C2") {
          $("#customCheckC2").attr("disabled", true);
          $("#customCheckC2").prop("checked", true);
        } else {
          $("#customCheckC2").attr("disabled", false);
          $("#customCheckC2").prop("checked", false);
        }
        if (data.c3 == "C3") {
          $("#customCheckC3").attr("disabled", true);
          $("#customCheckC3").prop("checked", true);
        } else {
          $("#customCheckC3").attr("disabled", false);
          $("#customCheckC3").prop("checked", false);
        }
        if (data.c4 == "C4") {
          $("#customCheckC4").attr("disabled", true);
          $("#customCheckC4").prop("checked", true);
        } else {
          $("#customCheckC4").attr("disabled", false);
          $("#customCheckC4").prop("checked", false);
        }
        if (data.c5 == "C5") {
          $("#customCheckC5").attr("disabled", true);
          $("#customCheckC5").prop("checked", true);
        } else {
          $("#customCheckC5").attr("disabled", false);
          $("#customCheckC5").prop("checked", false);
        }
        if (data.c6 == "C6") {
          $("#customCheckC6").attr("disabled", true);
          $("#customCheckC6").prop("checked", true);
        } else {
          $("#customCheckC6").attr("disabled", false);
          $("#customCheckC6").prop("checked", false);
        }
        if (data.c7 == "C7") {
          $("#customCheckC7").attr("disabled", true);
          $("#customCheckC7").prop("checked", true);
        } else {
          $("#customCheckC7").attr("disabled", false);
          $("#customCheckC7").prop("checked", false);
        }
        if (data.c8 == "C8") {
          $("#customCheckC8").attr("disabled", true);
          $("#customCheckC8").prop("checked", true);
        } else {
          $("#customCheckC8").attr("disabled", false);
          $("#customCheckC8").prop("checked", false);
        }
        if (data.c9 == "C9") {
          $("#customCheckC9").attr("disabled", true);
          $("#customCheckC9").prop("checked", true);
        } else {
          $("#customCheckC9").attr("disabled", false);
          $("#customCheckC9").prop("checked", false);
        }
        if (data.c10 == "C10") {
          $("#customCheckC10").attr("disabled", true);
          $("#customCheckC10").prop("checked", true);
        } else {
          $("#customCheckC10").attr("disabled", false);
          $("#customCheckC10").prop("checked", false);
        }
        // D
        if (data.d1 == "D1") {
          $("#customCheckD1").attr("disabled", true);
          $("#customCheckD1").prop("checked", true);
        } else {
          $("#customCheckD1").attr("disabled", false);
          $("#customCheckD1").prop("checked", false);
        }
        if (data.d2 == "D2") {
          $("#customCheckD2").attr("disabled", true);
          $("#customCheckD2").prop("checked", true);
        } else {
          $("#customCheckD2").attr("disabled", false);
          $("#customCheckD2").prop("checked", false);
        }
        if (data.d3 == "D3") {
          $("#customCheckD3").attr("disabled", true);
          $("#customCheckD3").prop("checked", true);
        } else {
          $("#customCheckD3").attr("disabled", false);
          $("#customCheckD3").prop("checked", false);
        }
        if (data.d4 == "D4") {
          $("#customCheckD4").attr("disabled", true);
          $("#customCheckD4").prop("checked", true);
        } else {
          $("#customCheckD4").attr("disabled", false);
          $("#customCheckD4").prop("checked", false);
        }
        if (data.d5 == "D5") {
          $("#customCheckD5").attr("disabled", true);
          $("#customCheckD5").prop("checked", true);
        } else {
          $("#customCheckD5").attr("disabled", false);
          $("#customCheckD5").prop("checked", false);
        }
        if (data.d6 == "D6") {
          $("#customCheckD6").attr("disabled", true);
          $("#customCheckD6").prop("checked", true);
        } else {
          $("#customCheckD6").attr("disabled", false);
          $("#customCheckD6").prop("checked", false);
        }
        if (data.d7 == "D7") {
          $("#customCheckD7").attr("disabled", true);
          $("#customCheckD7").prop("checked", true);
        } else {
          $("#customCheckD7").attr("disabled", false);
          $("#customCheckD7").prop("checked", false);
        }
        if (data.d8 == "D8") {
          $("#customCheckD8").attr("disabled", true);
          $("#customCheckD8").prop("checked", true);
        } else {
          $("#customCheckD8").attr("disabled", false);
          $("#customCheckD8").prop("checked", false);
        }
        // E
        if (data.e1 == "E1") {
          $("#customCheckE1").attr("disabled", true);
          $("#customCheckE1").prop("checked", true);
        } else {
          $("#customCheckE1").attr("disabled", false);
          $("#customCheckE1").prop("checked", false);
        }
        if (data.e2 == "E2") {
          $("#customCheckE2").attr("disabled", true);
          $("#customCheckE2").prop("checked", true);
        } else {
          $("#customCheckE2").attr("disabled", false);
          $("#customCheckE2").prop("checked", false);
        }
        if (data.e3 == "E3") {
          $("#customCheckE3").attr("disabled", true);
          $("#customCheckE3").prop("checked", true);
        } else {
          $("#customCheckE3").attr("disabled", false);
          $("#customCheckE3").prop("checked", false);
        }
        if (data.e4 == "E4") {
          $("#customCheckE4").attr("disabled", true);
          $("#customCheckE4").prop("checked", true);
        } else {
          $("#customCheckE4").attr("disabled", false);
          $("#customCheckE4").prop("checked", false);
        }
        if (data.e5 == "E5") {
          $("#customCheckE5").attr("disabled", true);
          $("#customCheckE5").prop("checked", true);
        } else {
          $("#customCheckE5").attr("disabled", false);
          $("#customCheckE5").prop("checked", false);
        }
        if (data.e6 == "E6") {
          $("#customCheckE6").attr("disabled", true);
          $("#customCheckE6").prop("checked", true);
        } else {
          $("#customCheckE6").attr("disabled", false);
          $("#customCheckE6").prop("checked", false);
        }
        if (data.e7 == "E7") {
          $("#customCheckE7").attr("disabled", true);
          $("#customCheckE7").prop("checked", true);
        } else {
          $("#customCheckE7").attr("disabled", false);
          $("#customCheckE7").prop("checked", false);
        }
        if (data.e8 == "E8") {
          $("#customCheckE8").attr("disabled", true);
          $("#customCheckE8").prop("checked", true);
        } else {
          $("#customCheckE8").attr("disabled", false);
          $("#customCheckE8").prop("checked", false);
        }
        // F
        if (data.f1 == "F1") {
          $("#customCheckF1").attr("disabled", true);
          $("#customCheckF1").prop("checked", true);
        } else {
          $("#customCheckF1").attr("disabled", false);
          $("#customCheckF1").prop("checked", false);
        }
        if (data.f2 == "F2") {
          $("#customCheckF2").attr("disabled", true);
          $("#customCheckF2").prop("checked", true);
        } else {
          $("#customCheckF2").attr("disabled", false);
          $("#customCheckF2").prop("checked", false);
        }
        if (data.f3 == "F3") {
          $("#customCheckF3").attr("disabled", true);
          $("#customCheckF3").prop("checked", true);
        } else {
          $("#customCheckF3").attr("disabled", false);
          $("#customCheckF3").prop("checked", false);
        }
        if (data.f4 == "F4") {
          $("#customCheckF4").attr("disabled", true);
          $("#customCheckF4").prop("checked", true);
        } else {
          $("#customCheckF4").attr("disabled", false);
          $("#customCheckF4").prop("checked", false);
        }
        if (data.f5 == "F5") {
          $("#customCheckF5").attr("disabled", true);
          $("#customCheckF5").prop("checked", true);
        } else {
          $("#customCheckF5").attr("disabled", false);
          $("#customCheckF5").prop("checked", false);
        }
        if (data.f6 == "F6") {
          $("#customCheckF6").attr("disabled", true);
          $("#customCheckF6").prop("checked", true);
        } else {
          $("#customCheckF6").attr("disabled", false);
          $("#customCheckF6").prop("checked", false);
        }
        if (data.f7 == "F7") {
          $("#customCheckF7").attr("disabled", true);
          $("#customCheckF7").prop("checked", true);
        } else {
          $("#customCheckF7").attr("disabled", false);
          $("#customCheckF7").prop("checked", false);
        }
        if (data.f8 == "F8") {
          $("#customCheckF8").attr("disabled", true);
          $("#customCheckF8").prop("checked", true);
        } else {
          $("#customCheckF8").attr("disabled", false);
          $("#customCheckF8").prop("checked", false);
        }
        if (data.f9 == "F9") {
          $("#customCheckF9").attr("disabled", true);
          $("#customCheckF9").prop("checked", true);
        } else {
          $("#customCheckF9").attr("disabled", false);
          $("#customCheckF9").prop("checked", false);
        }
        if (data.f10 == "F10") {
          $("#customCheckF10").attr("disabled", true);
          $("#customCheckF10").prop("checked", true);
        } else {
          $("#customCheckF10").attr("disabled", false);
          $("#customCheckF10").prop("checked", false);
        }
        // G
        if (data.g1 == "G1") {
          $("#customCheckG1").attr("disabled", true);
          $("#customCheckG1").prop("checked", true);
        } else {
          $("#customCheckG1").attr("disabled", false);
          $("#customCheckG1").prop("checked", false);
        }
        if (data.g2 == "G2") {
          $("#customCheckG2").attr("disabled", true);
          $("#customCheckG2").prop("checked", true);
        } else {
          $("#customCheckG2").attr("disabled", false);
          $("#customCheckG2").prop("checked", false);
        }
        if (data.g3 == "G3") {
          $("#customCheckG3").attr("disabled", true);
          $("#customCheckG3").prop("checked", true);
        } else {
          $("#customCheckG3").attr("disabled", false);
          $("#customCheckG3").prop("checked", false);
        }
        if (data.g4 == "G4") {
          $("#customCheckG4").attr("disabled", true);
          $("#customCheckG4").prop("checked", true);
        } else {
          $("#customCheckG4").attr("disabled", false);
          $("#customCheckG4").prop("checked", false);
        }
        if (data.g5 == "G5") {
          $("#customCheckG5").attr("disabled", true);
          $("#customCheckG5").prop("checked", true);
        } else {
          $("#customCheckG5").attr("disabled", false);
          $("#customCheckG5").prop("checked", false);
        }
        if (data.g6 == "G6") {
          $("#customCheckG6").attr("disabled", true);
          $("#customCheckG6").prop("checked", true);
        } else {
          $("#customCheckG6").attr("disabled", false);
          $("#customCheckG6").prop("checked", false);
        }
        if (data.g7 == "G7") {
          $("#customCheckG7").attr("disabled", true);
          $("#customCheckG7").prop("checked", true);
        } else {
          $("#customCheckG7").attr("disabled", false);
          $("#customCheckG7").prop("checked", false);
        }
        if (data.g8 == "G8") {
          $("#customCheckG8").attr("disabled", true);
          $("#customCheckG8").prop("checked", true);
        } else {
          $("#customCheckG8").attr("disabled", false);
          $("#customCheckG8").prop("checked", false);
        }
        if (data.g9 == "G9") {
          $("#customCheckG9").attr("disabled", true);
          $("#customCheckG9").prop("checked", true);
        } else {
          $("#customCheckG9").attr("disabled", false);
          $("#customCheckG9").prop("checked", false);
        }
        if (data.g10 == "G10") {
          $("#customCheckG10").attr("disabled", true);
          $("#customCheckG10").prop("checked", true);
        } else {
          $("#customCheckG10").attr("disabled", false);
          $("#customCheckG10").prop("checked", false);
        }
        // C
        if (data.h1 == "H1") {
          $("#customCheckH1").attr("disabled", true);
          $("#customCheckH1").prop("checked", true);
        } else {
          $("#customCheckH1").attr("disabled", false);
          $("#customCheckH1").prop("checked", false);
        }
        if (data.h2 == "H2") {
          $("#customCheckH2").attr("disabled", true);
          $("#customCheckH2").prop("checked", true);
        } else {
          $("#customCheckH2").attr("disabled", false);
          $("#customCheckH2").prop("checked", false);
        }
        if (data.h3 == "H3") {
          $("#customCheckH3").attr("disabled", true);
          $("#customCheckH3").prop("checked", true);
        } else {
          $("#customCheckH3").attr("disabled", false);
          $("#customCheckH3").prop("checked", false);
        }
        if (data.h4 == "H4") {
          $("#customCheckH4").attr("disabled", true);
          $("#customCheckH4").prop("checked", true);
        } else {
          $("#customCheckH4").attr("disabled", false);
          $("#customCheckH4").prop("checked", false);
        }
        if (data.h5 == "H5") {
          $("#customCheckH5").attr("disabled", true);
          $("#customCheckH5").prop("checked", true);
        } else {
          $("#customCheckH5").attr("disabled", false);
          $("#customCheckH5").prop("checked", false);
        }
        if (data.h6 == "H6") {
          $("#customCheckH6").attr("disabled", true);
          $("#customCheckH6").prop("checked", true);
        } else {
          $("#customCheckH6").attr("disabled", false);
          $("#customCheckH6").prop("checked", false);
        }
        if (data.h7 == "H7") {
          $("#customCheckH7").attr("disabled", true);
          $("#customCheckH7").prop("checked", true);
        } else {
          $("#customCheckH7").attr("disabled", false);
          $("#customCheckH7").prop("checked", false);
        }
        if (data.h8 == "H8") {
          $("#customCheckH8").attr("disabled", true);
          $("#customCheckH8").prop("checked", true);
        } else {
          $("#customCheckH8").attr("disabled", false);
          $("#customCheckH8").prop("checked", false);
        }
        if (data.h9 == "H9") {
          $("#customCheckH9").attr("disabled", true);
          $("#customCheckH9").prop("checked", true);
        } else {
          $("#customCheckH9").attr("disabled", false);
          $("#customCheckH9").prop("checked", false);
        }
        if (data.h10 == "H10") {
          $("#customCheckH10").attr("disabled", true);
          $("#customCheckH10").prop("checked", true);
        } else {
          $("#customCheckH10").attr("disabled", false);
          $("#customCheckH10").prop("checked", false);
        }
      },
    });
  });
});
