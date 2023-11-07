<!DOCTYPE html>
<html>
<head>
  <title>Dynamically Load Page with SQL Query</title>
  <script>
    function loadPage(page, value) {
      // Get the div element where the page will be loaded.
      var div = document.getElementById("page-container");

      // Create a new XMLHttpRequest object.
      var xhr = new XMLHttpRequest();

      // Open a GET request to the selected page, passing the value as a query parameter.
      xhr.open("GET", page + "?value=" + value);

      // Set the callback function to be executed when the request is completed.
      xhr.onload = function() {
        // If the request was successful, set the content of the div element to the response.
        if (xhr.status === 200) {
          div.innerHTML = xhr.responseText;
        } else {
          // If the request was not successful, show an error message.
          div.innerHTML = "Error: " + xhr.statusText;
        }
      };
      // Send the request.
      xhr.send();
    }
  </script>
</head>
<body>
  <h1>Dynamically Load Page with SQL Query</h1>

  <select id="page-selector" onchange="loadPage('searchbyrole.php', this.value)">
    <option disabled selected value> -- select an option -- </option> # forces selection from list
    <option value=1>Admins</option>
    <option value=0>Users</option>
   
  </select>

  <div id="page-container"></div>

  
</body>
</html>