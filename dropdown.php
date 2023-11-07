<!DOCTYPE html>
<html>
<head>
  <title>Dynamically Load Page</title>
  <script>
    function loadPage(page) {
      // Get the div element where the page will be loaded.
      var div = document.getElementById("page-container");
      // Create a new XMLHttpRequest object.
      var xhr = new XMLHttpRequest();
      // Open a GET request to the selected page.
      xhr.open("GET", page);
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
  <h1>Dynamically Load Page based on drop down value</h1>
  <p> this could pass a variable to be used in a query too</p>

  <select id="page-selector" onchange="loadPage(this.value)">
    <option value="menu.php">Menu</option>
    <option value="buystuff.php">buystuff</option>
    <option value="login.php">login</option>
  </select>

  <div id="page-container"></div>

  <script>
    loadPage("page1.html");
  </script>
</body>
</html>