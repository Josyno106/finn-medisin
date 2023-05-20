$(document).ready(function () {
  $("#vare").keyup(function () {
    var query = $(this).val();
    if (query != "") {
      $.ajax({
        url: "./php/search.php",
        method: "POST",
        data: {
          query: query,
        },
        success: function (data) {
          $("#search_result").html(data);
          $("#search_result").css("display", "block");
          $("#vare").focusout(function () {
            $("#search_result").css("display", "none");
          });
          $("#vare").focusin(function () {
            $("#search_result").css("display", "block");
          });
        },
      });
    } else {
      $("#search_result").css("display", "none");
    }
  });
});
