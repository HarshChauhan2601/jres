<?php

session_start();

if($_SESSION['email'] == ""){
    echo "<div class='error-container'>
    <h1>Can't Access MyProfile :</h1>
    <p>You Have Not Logged in or Not have an Account.</p>
    <a href='login.php' target='_blank'>Login</a>
    <a href='register.php' target='_blank'>Create Account</a>
 </div> ";
     exit();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Your details</title>

 <style>
     form {
            max-width: 500px;
            margin: 10% auto;
            background-color: #fff;
            max-height: 100vh;
            overflow: scroll;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 2rem;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
 </style>
</head>
<body>
<h2 style="width: 100%; text-align: center;">Profile Update Details</h2>
                <!-- This is My Simple Form -->
                <form action="connection/insert_update.php" method="post">
                <!-- <?php echo $_SESSION['fname']; ?> -->
 

                    <div class="input">
                        <label for="">First Name</label>
                        <input type="text" name="fname" maxlength="30" placeholder="" value="<?php echo $_SESSION['fname']; ?>">

                    </div>

                    <div class="input">
                        <label for="">Last Name</label>
                        <input type="text" name="lname" maxlength="30" value="<?php echo $_SESSION['lname']; ?>" placeholder="">
                    </div>

                    <div class="input">

                        <!-- Mobile Number -->
                        <label for="phone">Mobile Number:</label>
                        <input type="tel" id="phone" name="phone" maxlength="10" value="<?php echo $_SESSION['phone']; ?>" required>
                    </div>

                    <div class="input">
                        <!-- Location -->
                        <label for="city">City:</label>
                        <input type="text" id="location" name="city" value="<?php echo $_SESSION['city']; ?>" required>

                    </div>

                    <div class="input">
                        <!-- DOB -->
                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" name="dob" value="<?php echo $_SESSION['dob']; ?>" required>

                    </div>
 

                    <div class="input-box">
                        <!-- Profile Pic -->
                        <label for="file1">Update Profile Pic</label>
                        <input type="file" id="file1" name="file1" accept=".png, .jpg, .jpeg" max-size="2000" value="<?php echo $_SESSION['profile_pic']; ?>" required>
                        <br>
                        <small>*Max File size 2MB only accepted(.png | .jpg | .jpeg)</small>
                    </div>



                    <div class="btn">
                        <!-- Submit Button -->
                        <input type="submit" name="update" value="Update">
                    </div>

                </form>

</body>
</html>