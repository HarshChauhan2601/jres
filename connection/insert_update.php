<?php

include 'conn.php';

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
 
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);

$city = mysqli_real_escape_string($conn, $_POST['city']);
  
$query = "UPDATE regisration set fname= '$fname', lname= '$lname', dob = '$dob', phone = '$phone', city = '$city' where email = ".$_SESSION['email']."";
 
$qry = mysqli_query($conn, $query);

if($qry){
    echo "Successfully updated !!!";
    echo "<a href='https://jainrashtriyaektasangathan.in'>Go to Home Page</a>";
}else{
    echo "Fail To Update !!!";
    echo "<a href='https://jainrashtriyaektasangathan.in'>Go to Home Page</a>";
}


?>