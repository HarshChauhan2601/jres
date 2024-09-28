    <?php include('../Sanjay_Uncle/connection/conn.php');
  
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <?php include 'links.php' ?>
        <link rel="stylesheet" href="styles/registration.css?=<?php echo time(); ?>">
    <style>


        h1{
            text-align: center;
        }
    </style>
    </head>
    <body>

    <!-- This is My Back To HomePAge -->
    <div class="back">
        <a href="index.php"><i class="fa-solid fa-house"></i> Back To Home Page</a>
    </div>

        <!-- This is My Form -->
    <section class="container" id="section1">
    <?php

    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $sqlCheck = "SELECT * FROM registration where email = '$email'";
        $exeCheck = mysqli_query($conn, $sqlCheck);
        if(mysqli_num_rows($exeCheck)>0){
            // Adding into ForgotPAssword Table Query
            $internal_id = "";
            foreach($exeCheck as $row){
                $internal_id = $row['id'];
                break;
            }

            $checkEmailQuery = "SELECT email FROM forgot WHERE email = '$email'";
            $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

            if(mysqli_num_rows($checkEmailResult) == 0) {
                $sqlInsert = "INSERT INTO forgot (email,internal_id) VALUES('$email', '$internal_id')";
                $exeInsert = mysqli_query($conn, $sqlInsert);
            }
 // Sending the Reset Code
 $code = rand(999999, 111111);
 $insert_code = "UPDATE forgot SET otp = $code WHERE email = '$email'";
 $run_query =  mysqli_query($conn, $insert_code);
 if($run_query){
     echo " <div class='error-container'>
     <h1></h1>
     <p style='color: darkslategrey; background:mediumseagreen; padding: 5px 7px; border-radius: 4px;'><i class='fa-solid fa-circle-check'></i> We Have sent an OTP to ''$email''.</p>
     </div> ";

     $subject = "Password Reset Code - JainRashtriyaEktaSangathan.in";
     $message = "Your password reset code is - $code";
     $sender = "From: jainektasangathan@gmail.com";
     if(mail($email, $subject, $message, $sender)){
         $info = "We've sent a passwrod reset otp to your email - $email";
         $_SESSION['info'] = $info;
         $_SESSION['email'] = $email;
         header('location: new_password.php');
         exit();
     }
 }else{

 }           

        }else{
            echo " <div class='error-container'>
            <h1></h1>
            <p style='color: darkslategrey; background:#FF7F7F; padding: 5px 7px; border-radius: 4px;'><i class='fa-solid fa-circle-exclamation'></i>  This Email ID does not Exists in our Database.</p>
            </div> ";
        }
    }


    ?>

    
    <form action="resetPassword.php" class="form" method="POST">
            <div class="para">
    
            <h1>Reset Password</h1>
            <div class="line"><div class="line-inner"></div></div>
            </div>
        <div class="input-box">
            <label>Enter Email Address</label>
            <input type="email" name="email" placeholder="e.g jenish.demo@dmail.com" required />
        </div>

        <input type="submit" name="submit" value="Send Code">
    </form>
    </section>




    </body>
    </html>