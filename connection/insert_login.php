<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="errors.css">

</head>
<body>
    

<?php

include 'conn.php';

error_reporting(0);

$err =  " <div class='error-container'>
<h1>Error:</h1>
<p>Invalid Email ID or Password or Both Combination.</p>
<a href='Sanjay_Uncle/login.php'>Go Back to Login Page</a>

</div> ";

session_start();




    if(isset($_POST['email']) && isset($_POST['password'])){
       
       
        function validate($data){

            $data = trim($data);
     
            $data = stripslashes($data);
     
            $data = htmlspecialchars($data);
     
            return $data;
    }


    $email = validate($_POST['email']);
    $password = validate(md5($_POST['password']));

    $email = strtoupper($email);
    $password = strtoupper($password);


    if (empty($email)) {

        header("Location: index.php?error=Email ID  is required");

        exit();

    }else if(empty($password)){

        header("Location: index.php?error=Password is required");

        exit();

    }
    else{
        $sql = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);

        if ($row['email'] === $email  && $row['password'] === $password) {

            $_SESSION['id'] = $row['id'];
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['lname'] = $row['lname'];

            $_SESSION['email'] = $row['email'];
            $_SESSION['dob'] = $row['dob'];
            $_SESSION['phone'] = $row['phone'];

            $_SESSION['city'] = $row['city'];

            $_SESSION['gender'] = $row['gender'];
            $_SESSION['password'] = $row['password'];

            $_SESSION['created_at'] = $row['created_at'];
            $_SESSION['updated_at'] = $row['updated_at'];
            $_SESSION['lang'] = $row['lang'];
            $_SESSION['matri_profile_created'] = $row['matri_profile_created'];

            $_SESSION['profile_pic'] = $file1_dest;

            header("Location: /Sanjay_Uncle/myprofile.php");
            exit();

        }
        else{
            echo $err;
        }

    }

}

// Close connection
$conn->close();
?>

</body>
</html>
