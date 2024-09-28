<?php
$servername = 'localhost';
$username = "root";
$password = "";
$db = "jres";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if ($conn) {
  
  
}

else{
  ?>
  <script>
      alert("Something Went Wrong. Please, Try Again !");
  </script>
  <?php
}


?>

