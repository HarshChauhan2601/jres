<?php

include 'conn.php';

 

if (isset($_POST["submit"])) {
  // fill the details in the table
  //   $image = mysqli_real_escape_string($conn, $_POST['image']);

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $message = mysqli_real_escape_string($conn, $_POST['message']);
  $viewed = "NO";

   // Inserting Finally
 // Inserting Finally
$query = "INSERT INTO contact (name, email, message, viewed) VALUES (UPPER('$name'), UPPER('$email'), UPPER('$message'), UPPER('$viewed'))";

   mysqli_query($conn, $query);

   
   if($query){
  ?>
  <script>
    alert("Message Sent Successfully");
  </script>
  <?php  
   }else{
?>
  <script>
    alert("Something Went Wrong. Please try after sometime...");
  </script>

<?php

   }


}

 
// Close connection
$conn->close();
?>