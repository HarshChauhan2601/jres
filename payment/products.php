<?php
session_start();
error_reporting(0);
if($_SESSION['fname'] == ""){
    echo "<div class='error-container'>
    <h1>Can't Go Ahead :</h1>
    <p>You Have Not Logged in or Not have an Account.</p>
    <a href='https://jainrashtriyaektasangthan.in/login.php' target='_blank'>Login</a>
    <a href='https://jainrashtriyaektasangthan.in/register.php' target='_blank'>Create Account</a>
 </div> ";
     exit();
  }

  include_once('pay_conn.php');
  $checkSql = "SELECT * FROM payment where internal_id = '".$_SESSION['id']."' ";
  $sqlRun = mysqli_query($conn,$checkSql);
  if(mysqli_num_rows($sqlRun)>0){
    echo "<div class='error-container'>
    <span>Hii, ".$_SESSION['fname']."</span>
    <h1>Payment Already Done :</h1>
    <p>Go Back to HomePage</p>
    <a href='https://jainrashtriyaektasangthan.in' target='_blank'>Back to Home</a>
 </div> ";
 exit();
  }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jain Rashtriya Ekta Sangathan - Buy Matrimonial Profile</title>

      <!-- Font Awesome -->
      <script src="https://kit.fontawesome.com/ec3a451c3a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">

    <!-- This are My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Rubik&display=swap" rel="stylesheet">


    <!-- This is Multi LAnguage Code -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/products.css?=<?php echo time();?>">

<!-- This are For Payments -->

<!-- <button id="rzp-button1">Pay</button> -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- This is An End -->

</head>
<body>
 
<main id="products">
      <div class="container">
        <div class="producat_wrapper">
          <div class="producat_image">
            <div class="img_thumbnail">
              <img src="./img/indian-4160039_1280.jpg" alt="" />
            </div>
            <form>
    <h1>Your Registered Details</h1>
    <p>This email will only be able to access the product.</p>
    
    <div class="form-group">
        <label for="name">Name</label>
        <input type="textbox" name="name" id="name" value="<?php echo $_SESSION['fname'];?>"/>
    </div>
    
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php echo $_SESSION['email'];?>" readonly>
    </div>
    
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="<?php echo $_SESSION['phone'];?>">
    </div>
    
    <div class="form-group">
        <label for="gender">Gender</label>
        <input type="textbox" name="gender" id="gender" value="<?php echo $_SESSION['gender'];?>" readonly/>
    </div>

    

    <?php
    if($_SESSION['gender'] == 'FEMALE' or $_SESSION['gender'] != 'MALE'){
        header("https://jainrashtriyaektasangthan.in/");
    }else{
    ?>
        <div class="form-group">
              <button class="add_cart" type="button" name="btn" id="btn" onclick="pay_now()">
              <i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;Purchase Now
              </button>
           
        </div>
    <?php
    }
    ?>
</form>


          </div>
          <div class="producat_content">
            <p class="company_txt">Jain Rashtriya Ekta Sangathan</p>
            <h2>Matrimonial Profile Creation at #JRES</h2>
            <p class="producat_des">By purchasing the product. You will get the access to create profile in <b>JainRashtriyaEktaSangathan</b>'s Matrimonial Page. This is valid only for the email you logged in. This will enable other bride/groom to view your profile.
            </p>
            <p class="producat_des">This is One time fee for creating an Matrimonial account as well for finding bride/groom at JRES . The purpose of the fee is to maintain legitmacy on our platform.</p>
            <p class="producat_des"><b>Note</b> : This is Free For all Female Members. It is non-refundable in any circumstances.</p>
            <div class="price">
              <div class="dicscount_price">
                <p class="normal_price"><i class="fa-solid fa-indian-rupee-sign"></i> 103.70</p>
                <p><span class="discount">50% OFF</span></p>
              </div>
              <p class="total_price"><i class="fa-solid fa-indian-rupee-sign"></i> 200.00</p>
            </div>
           <div class="qty">

           <div class="col" id="total_sum">
           <p>JRES Fees : <i class="fa-solid fa-indian-rupee-sign"></i> 101</p>
            <p>Transaction Fee : <i class="fa-solid fa-indian-rupee-sign"></i> 0.25 RS</p>
            <p>Online Provider Fee : <i class="fa-solid fa-indian-rupee-sign"></i>  2.4 Rs</p>
          </div>
            </div> 
          </div>
        </div>
      </div>


      <div class="" style="height: 100px;"></div>

   

      <!-- This is For Payment -->
      <script src="payment.js"></script>
      <!-- This is An End For Payment -->
</body>
</html>