<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account on Jain JainRashtriyaEktaSangathan.in</title>

  <link rel="stylesheet" href="errors.css">

</head>
<body>
  


<?php
$reg_url = '<a href="register.php">Back To Register / Login Page</a>';
// My All errors
$email_err = '<div  style="min-width: 70%; min-height: 3rem; margin: auto;  background: #f8d7da; display: flex;">
<i class="fa-solid fa-triangle-exclamation" style="line-height: 3rem; margin-left:2rem; font-size: 22px;"></i>&nbsp;&nbsp;
<p style="line-height: 3rem; font-size: 18px; color: #262626; margin-left: 1rem;">
This Email Id is already registered with us.</p>
</div>';


$mobile_err = '<div  style="min-width: 70%; min-height: 3rem; margin: auto;  background: #ffecb5; display: flex;">
<i class="fa-solid fa-triangle-exclamation" style="line-height: 3rem; margin-left:2rem; font-size: 22px;"></i>&nbsp;&nbsp;
<p style="line-height: 3rem; font-size: 18px; color: #262626; margin-left: 1rem;">
This Mobile Number is already registered with us !</p>
</div>';

$password_err = '<div  style="min-width: 70%; min-height: 3rem; margin: auto;  background: #f8d7da; display: flex;">
<i class="fa-solid fa-triangle-exclamation" style="line-height: 3rem; margin-left:2rem; font-size: 22px;"></i>&nbsp;&nbsp;
<p style="line-height: 3rem; font-size: 18px; color: #262626; margin-left: 1rem;">
This Password is already registered in our Database.
Please, Try Another One 
</p>
</div>';

?>

<?php
include 'conn.php';
// Starting my session
session_start();


if (isset($_POST["submit"])) {
  // fill the details in the table
  //   $image = mysqli_real_escape_string($conn, $_POST['image']);

  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);

  $city = mysqli_real_escape_string($conn, $_POST['city']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);

  //encrypt the password before saving in the database
  $password = md5($password);


  // 
  //   This is For Uploading My Imagez

  $file1 = $_FILES['file1'];
  // This is to print All The Images
  $file1_name = $file1['name'];
  $file1_path = $file1['tmp_name'];
  $file1_error = $file1['error'];
  $file1_dest = "register_profiles/". $phone."_". $file1_name;


  if ($file1_error == 0) {
    $file1_dest = "register_profiles/". $phone."_". $file1_name;
    move_uploaded_file($file1_name, $file1_dest);

    if (!file_exists($file1_dest)) {
      if (move_uploaded_file($_FILES['file1']['tmp_name'], $file1_dest)) {
      }
    }
  }

  // Check if the email, mobile, password already exists

  $emailquery = "select * from registration where email = '$email'";
  $query = mysqli_query($conn, $emailquery);

  $email_count = mysqli_num_rows($query);


  $mobilequery = "select * from registration where phone = '$phone'";
  $query2 = mysqli_query($conn, $mobilequery);

  $mobile_count = mysqli_num_rows($query2);

  $passwordquery = "select * from registration where password = '$password'";
  $query3 = mysqli_query($conn, $passwordquery);

  $password_count = mysqli_num_rows($query3);


  if ($email_count > 0) {
    echo " <div class='error-container'>
    <h1>Error:</h1>
    <p>This Email ID is Already Registered in our Database.</p>
    <a href='localhost/Sanjay_Uncle/register.php'>Go Back to Register Page</a>
 
    </div> ";
 

    
  } elseif ($mobile_count > 0) {
    echo " <div class='error-container'>
    <h1>Error:</h1>
    <p>This Mobile Number is Already Registered in our Database.</p>
    <a href='localhost/Sanjay_Uncle/register.php'>Go Back to Register Page</a>
 
    </div> ";
 
     
  } else {
    // $query = "INSERT INTO registration (name, email, mobile, password, cpassword) 
    // VALUES('$name', '$email', '$mobile' ,'$password' , '$cpassword')";
    $matri_profile_created = "NO";
    $lang = 'ENG';

    //   Converting Everything to UpperCase before Storing into the Database

// Is Added To Achiever
$achiever = "NO";

    // Inserting Finally
    $query = "INSERT INTO registration(profile_pic, fname, lname, email, dob, phone, city, password, gender, matri_profile_created, achiever,lang) VALUES ('$file1_dest', UPPER('$fname'), UPPER('$lname'), UPPER('$email'), UPPER('$dob'),UPPER('$phone'),UPPER('$city'), UPPER('$password'),UPPER('$gender'),UPPER('$matri_profile_created'), UPPER('$achiever') ,UPPER('$lang') )";
 
    mysqli_query($conn, $query);
    $_SESSION['email'] = $email;
   

    // $_SESSION['fname'] = strtoupper($fname);
    // $_SESSION['lname'] = strtoupper($lname);

    // $_SESSION['email'] = strtoupper($email);
    // $_SESSION['dob'] = strtoupper($dob);
    // $_SESSION['phone'] = strtoupper($phone);

    // $_SESSION['city'] = strtoupper($city);


    // $_SESSION['gender'] = strtoupper($gender);
    // $_SESSION['password'] = strtoupper($password);


 
    // $_SESSION['profile_pic'] = $file1_dest;
    // $_SESSION['matri_profile_created'] = 'NO';

    // $fetch_qry = "SELECT * FROM registration WHERE email = '$email' and password = '$password'";
    // $row = mysqli_query($conn, $fetch_qry);
    
    // $r = mysqli_fetch_assoc($row);
    // if ($r['email'] === $email  && $r['password'] === $password) {
    //   // $_SESSION['id'] = $r['id'];
    //   $_SESSION['created_at'] = $row['created_at'];
    //   $_SESSION['updated_at'] = $row['updated_at'];
    //   $_SESSION['lang'] = $row['lang'];
    // }

    $_SESSION['success'] = "You are now logged in";
   header("Location: /SANJAY_UNCLE/login.php");
  }
}




 
// Close connection
$conn->close();
?>


</body>
</html>