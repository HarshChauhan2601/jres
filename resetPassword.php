<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jain Rashtriya Ekta Sangathan - Reset Password</title>
    <?php include 'links.php'; ?>
    <link rel="stylesheet" href="styles/registration.css?=<?php echo time(); ?>">
    <style>
        h1 {
            text-align: center;
        }

        .code{
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="back">
    <a href="index.php"><i class="fa-solid fa-house"></i> Back To Home Page</a>
</div>

<section class="container" id="section1">
    <form action="resetPassword.php" class="form" method="POST">

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connection/conn.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $sqlCheck = "SELECT * FROM registration WHERE email = '$email'";
    $exeCheck = mysqli_query($conn, $sqlCheck);
    if (mysqli_num_rows($exeCheck) > 0) {
        $internal_id = "";
        foreach ($exeCheck as $row) {
            $internal_id = $row['id'];
            break;
        }

        $checkEmailQuery = "SELECT email FROM forgot WHERE email = '$email'";
        $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

        if (mysqli_num_rows($checkEmailResult) == 0) {
            $sqlInsert = "INSERT INTO forgot (email, internal_id) VALUES ('$email', '$internal_id')";
            $exeInsert = mysqli_query($conn, $sqlInsert);
        }

        $code = rand(999999, 111111);

        $insert_code = "UPDATE forgot SET otp = $code, count = count+1, status='UNSEEN' WHERE email = '$email'";
        $run_query = mysqli_query($conn, $insert_code);
        if ($run_query) {
            echo "<div class='error-container'>
            <h1></h1>
            <p style='color: darkslategrey; background:mediumseagreen; padding: 5px 7px; border-radius: 4px;'><i class='fa-solid fa-circle-check'></i> We have sent an OTP to '$email'.</p>
            </div>";

            // Sending the email using PHPMailer
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'jainektasangathan@gmail.com'; // Your Gmail address
                $mail->Password = 'emzx sbvl itjz lwsa'; // Your Gmail password or App password
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('jainektasangathan@gmail.com', 'JainRashtriyaEktaSangathan');
                $mail->addAddress($email);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset Code - JainRashtriyaEktaSangathan.in';
                $mail->Body = "Your password reset code is - $code \n .This is Valid for One Time only and also Do not share your code with others.";

                $mail->send();
                $info = "We've sent a password reset OTP to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: new_password.php');
                exit();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "<div class='error-container'>
            <h1></h1>
            <p style='color: darkslategrey; background:#FF7F7F; padding: 5px 7px; border-radius: 4px;'><i class='fa-solid fa-circle-exclamation'></i> Something went wrong. Please try again.</p>
            </div>";
        }
    } else {
        echo "<div class='error-container'>
        <h1></h1>
        <p style='color: darkslategrey; background:#FF7F7F; padding: 5px 7px; border-radius: 4px;'><i class='fa-solid fa-circle-exclamation'></i> This Email ID does not exist in our database.</p>
        </div>";
    }
}
?>

        <div class="para">
            <br>
            <h1>Reset Password</h1>
            <div class="line"><div class="line-inner"></div></div>
        </div>
        <div class="input-box">
            <label>Enter Email Address</label>
            <input type="email" name="email" placeholder="e.g jenish.demo@gmail.com" required />
        </div>
        <input type="submit" name="submit" value="Send OTP">
    </form>
</section>

</body>
</html>
