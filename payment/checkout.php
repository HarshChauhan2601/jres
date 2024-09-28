<?php
session_start();
if($_SESSION['fname'] == ""){
    echo "<div class='error-container'>
    <h1>Can't Go Ahead :</h1>
    <p>You Have Not Logged in or Not have an Account.</p>
    <a href='https://jainrashtriyaektasangthan.in/login.php' target='_blank'>Login</a>
    <a href='https://jainrashtriyaektasangthan.in/register.php' target='_blank'>Create Account</a>
 </div> ";
     exit();
  }

    ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form>
    <h1>Please, Fill Up the Details</h1>
    <p>NOTE : Matrimonial Membership is free For Females</p>
    <input type="textbox" name="name" id="name" value="<?php echo $_SESSION['fname'];?>" readonly/>
    <input type="email" name="email" id="email" value="<?php echo $_SESSION['email'];?>" readonly>
    <input type="text" name="phone" id="phone" value="<?php echo $_SESSION['phone'];?>" readonly>
    
    <input type="textbox" name="gender" id="gender" value="<?php echo $_SESSION['gender'];?>" readonly/>

    <?php
    if($_SESSION['gender'] == 'FEMALE' or $_SESSION['gender'] != 'MALE'){
        header("https://jainrashtriyaektasangthan.in/");
    }else{
        ?>
    <input type="button" name="btn" id="btn" value="Complete Payment" onclick="pay_now()"/>

        <?php
    }
    ?>
</form>

<script>
    function pay_now(){
        var name=jQuery('#name').val();
        var amt= 101;
        
         jQuery.ajax({
               type:'post',
            //    url:'payment_process.php',
               data:"amt="+amt+"&name="+name,
               success:function(result){
                   var options = {
                        "key": "rzp_test_NRDmlv9j0seM2y", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "JAIN RASHTRIYA EKTA SANGATHAN",
                        "description": "Test Transaction",
                        "image": "https://jainrashtriyaektasangthan.in/images/jres_logo.png",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                            //    url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                //    window.location.href="thank_you.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>