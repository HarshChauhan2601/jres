<?php
include 'connection/conn.php'; 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set New Password - JainRashtiryaEktaSangathan.in</title>
    <link rel="stylesheet" href="styles/registration.css">
    <link rel="stylesheet" href="connection/errors.css">
</head>
<body>

<section class="container">
    <form action="new_password.php" class="form" enctype="multipart/form-data" method="post">
        <div class="input-box">
            <label>Enter 6 Digit OTP</label>
            <input type="text" name="otp" id="otp" placeholder="******" maxlength="6" minlength="1" required>
        </div>
        <br>
        <input type="submit" name="verifyOtp" value="Verify OTP">
    </form>
</section>

<?php
if (isset($_POST['verifyOtp'])) {
    $otp = mysqli_real_escape_string($conn, $_POST['otp']);
    $status = 'UNSEEN';

    // Check OTP
    $otpCheck = $conn->prepare("SELECT * FROM forgot WHERE otp = ? AND status = ?");
    $otpCheck->bind_param("ss", $otp, $status);
    $otpCheck->execute();
    $result = $otpCheck->get_result();

    $internal_id = "";
    $email = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $email = $row['email'];
            $internal_id = $row['internal_id'];
        }

        // Setting to Seen - enables to use a code for only one time
        $updateOtp = $conn->prepare("UPDATE forgot SET status = 'SEEN' WHERE otp = ?");
        $updateOtp->bind_param("s", $otp);
        $updateOtp->execute();
        $updateOtp->close();
?>

<section class="container">
    <form action="new_password.php" class="form" enctype="multipart/form-data" method="post">
        <h1>Update Password</h1>
        <div class="input-box">
            <label>Set New Password</label>
            <input type="password" name="password" placeholder="*************" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" minlength="8" maxlength="16" required />
        
        </div>
        <div class="input-box">
            <label>Confirm Password</label>
            <input type="password" name="cpassword" placeholder="*************" id="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" minlength="8" maxlength="16" required />
        </div>
        <hr>
        <input type="checkbox" onclick="showPassword();"> <small>Show Password</small><br>
            <small>*Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.</small>
        <input type="submit" name="resetPassword" value="Confirm Reset">
        <br>
    </form>
</section>

<?php
    } else {
        echo "<div class='error-container'>
                <h1></h1>
                <p style='color: darkslategrey; background:#FF7F7F; padding: 5px 7px; border-radius: 4px;'><i class='fa-solid fa-circle-exclamation'></i> Please, Enter Correct OTP.</p>
                <a href='resetPassword.php'>Resend OTP</a>
              </div>";
    }

    $otpCheck->close();
}
?>

<?php 
if (isset($_POST['resetPassword'])) {
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password != $cpassword) {
        echo "<div class='error-container'>
                <h1>Error : </h1>
                <p>Password & Confirm Password Should be Same !!!</p>
              </div>";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = $conn->prepare("UPDATE registration SET password = ? WHERE id = ?");
    $sql->bind_param("si", $hashed_password, $internal_id);
    if ($sql->execute()) {
        echo "<div class='error-container'>
                <h1 style='color:mediumseagreen'>Success, Password Updated</h1>
                <p>Please, Login to Confirm</p>
                <a href='https://jainrashtriyaektasangthan.in/login.php'>Complete</a>
              </div>";
    } else {
        echo "<div class='error-container'>
                <h1>Failure !!!</h1>
                <p>Please, Try after Some Time.</p>
                <a href='https://jainrashtriyaektasangthan.in'>Go to Home Page</a>
              </div>";
    }

    $sql->close();
    $conn->close();
}
?>

<script>
function showPassword() {
    var x = document.getElementById("password");
    var y = document.getElementById("cpassword");
    if (x.type === "password" || y.type === "password") {
        x.type = "text";
        y.type = "text";
    } else {
        x.type = "password";
        y.type = "password";
    }
}
</script>
</body>
</html>
