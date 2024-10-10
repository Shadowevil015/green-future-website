$(document).ready(function () {
    $("form").submit(function (event) {
      let formData = {
          mileage: $(mileage).val(),
          flights: $(flights).val(),
          energyUse: $(energyUse).val(),
          waste: $(waste).val(),
          meat: $(meat).val()
      };
      $.ajax({
          type: "POST",
          url: "../utils/calculator.php",
          data: formData,
          success: function(response) {
              alert(response)
          },
          error: function(error) {
                  console.log("error", error);
                  alert("error")
              }
      })
      event.preventDefault();
    })
  })