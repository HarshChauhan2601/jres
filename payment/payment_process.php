<?php

session_start();
include('pay_conn.php');

if(isset($_POST['name'])){
    $name = $_SESSION['fname'];
    $amount = 103;
    $internal_id = $_SESSION['id'];
    $payment_status = "UNPAID";
    // $date_time = date('Y-m-d h:i:s');
    $date_time = date('m/d/Y h:i:s a', time());
     $sql_query = "INSERT INTO payment (name,amount, payment_status, date_time, internal_id ) VALUES ('$name','$amount', '$payment_status','$date_time', '$internal_id')";

    mysqli_query($conn,$sql_query);

    
    // Prepared statement for INSERT query
// $sql = "INSERT INTO payment (name, amount, payment_status, date_time, internal_id) VALUES (?, ?, ?, ?, ?)";

// // Prepare statement
// $stmt = $conn->prepare($sql);
// if ($stmt === false) {
//     die("Something Went Wrong !!!: " . $conn->error);
// }

// $stmt->bind_param("sdsss", $name, $amount, $payment_status, $date_time, $internal_id);

$_SESSION['OID']=mysqli_insert_id($conn);

// $stmt->execute();


}



if(isset($_POST['payment_id'])){
 $payment_id = $_POST['payment_id'];
 $pay_sql = "UPDATE payment SET payment_status = 'PAID' , payment_id = '$payment_id' where id = '".$_SESSION['OID']."' ";   
 $mQuery = mysqli_query($conn, $pay_sql);
	


}




$conn->close();