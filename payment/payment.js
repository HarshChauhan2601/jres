
    function pay_now(){
        // var name=jQuery('#name').val();
        // var contact=jQuery('#phone').val();
        var name = jQuery('#name').val();
        var email = jQuery('#email').val();
        var contact = jQuery('#phone').val();
        var amt= 103.71;
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name,
               success:function(result){
                   var options = {
                        "key": "rzp_test_NRDmlv9j0seM2y", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "JAIN RASHTRIYA EKTA SANGATHAN",
                        "description": "Matrimonial Profile Creation Fee",
                        "image": "https://jainrashtriyaektasangthan.in/images/jres_logo.png",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                window.location.href="thank_you.php";
                               }
                           });
                        },
                        "prefill":{
                            "name": name, //your customer's name
                            "email": email,  
                            "contact": contact  
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
