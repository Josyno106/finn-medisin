// $(document).ready(function () {
//   $("#vare").keyup(function () {
//     var query = $(this).val();
//     if (query != "") {
//       $.ajax({
//         url: "./php/search.php",
//         method: "POST",
//         data: {
//           query: query,
//         },
//         success: function (data) {
//           $("#search_result").html(data);
//           $("#search_result").css("display", "block");
//           $("#vare").focusout(function () {
//             $("#search_result").css("display", "none");
//           });
//           $("#vare").focusin(function () {
//             $("#search_result").css("display", "block");
//           });
//         },
//       });
//     } else {
//       $("#search_result").css("display", "none");
//     }
//   });
// });

$(document).ready(function () {
  //get the data if it's selected
  // Get references to the checkbox group and input field
  var checkboxGroup = $("input[name='fylke_checkbox']");

  var inputField = $("#adresse");
  let values = [];

  // Initially disable the input field if any checkbox is checked on page load
  if (checkboxGroup.is(":checked")) {
    inputField.prop("disabled", true);
  }

  // Add an event handler to the checkbox group
  checkboxGroup.change(function () {
    if (checkboxGroup.is(":checked")) {
      // At least one checkbox is checked, disable the input field
      inputField.prop("disabled", true);
      // Get the selected option values
      let selectedValue = $(this).val();

      //push value to the array
      values.push(selectedValue);
    } else {
      // No checkbox is checked, enable the input field
      inputField.prop("disabled", false);
    }
  });

  // Add an event handler to the form submission
  $("#searchForm").submit(function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Retrieve form data
    var product = $("#vare").val().trim();
    var location = parseInt($("#adresse").val().trim());

    // alert(product);
    // alert(values);
    // alert(location);

    // Perform form data validation or any other processing
    // ...

    //here, we check what kind of request to sent for processing

    if (values.length === 0) {
      //check if Zip Code or place is specified
      if (location !== null && location > 0) {
        // Perform an AJAX request to submit the form data
        $.ajax({
          url: "./php/search.php", // Replace with the URL to handle the form submission
          method: "POST",
          data: {
            product: product,
            location: location,
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
          error: function (xhr, status, error) {
            // Handle the error response
            console.error("Form submission failed.");
            console.error("Error:", error);
            // Perform any error handling or display error messages
          },
        });
      } else {
        alert("You must enter postal code or a place to continue");
      }
    } else {
    }
  });

  //get all the values from checkbox upon button click
});
