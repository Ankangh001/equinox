<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script>
		
  $.ajax({
  url: "http://localhost/equinox/welcome/test",
    method: "GET",
    dataType: "json",
    complete: function(resp) {
      console.log(resp.responseText);
    // The response from the code
    var response = ;

    // Extract the JSON object from the response string
    var jsonString = response.match(/\{.*\}/)[0];

    // Parse the JSON object into a JavaScript object
    var responseObject = JSON.parse(jsonString);

    // Access the properties of the response object
    console.log(responseObject.userid);  // 51634880
    console.log(responseObject.balance);  // 199987
    console.log(responseObject.equity);  // 199987
    // ... and so on for other properties


  },
  //   error: function(jqXHR, textStatus, errorThrown) {
  //     console.log("Error:", textStatus, errorThrown);
  //   }
});
    </script>