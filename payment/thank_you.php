<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>JainRashtriyaEktaSangathan - Thank You Payment Page</title>

  <!-- Style -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style lang="css">
    .center {
        min-height: 100%;
        min-height: 100vh; /* Fallback for browsers do NOT support vh unit */
        margin: 0;
        display: flex;
        align-items: center;
    }
  </style>
</head>

<body>
  <div class="jumbotron text-center center">
    <div class="container">
      <h1 class="display-3">Congratulations !</h1>
      <p>Matrimonial Profile Created SuccessFully !!!</p>
      </br>
      <div class="row">
        <div class="col-sm-4 mx-auto">
          <a class="btn btn-success btn-lg btn-block" href="https://table2site.com/site/carleslc-resources" role="button">HomePage</a>
          <a class="btn btn-warning btn-lg btn-block" href="https://airtable.com/shrnzLIolsKJMD9Ql" role="button">Myprofile</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>


<?php
$maleCheck =  "SELECT * FROM matriprofile WHERE matri_id = '".$_SESSION['id']."' and gender = 'MALE' ";
$maleSql = mysqli_query($conn, $maleCheck);
if(mysqli_num_rows($maleSql)>0){
  $paySelect = "SELECT * from payment where internal_id = '".$_SESSION['id']."' and payment_status = 'PAID'  ";
  $paySql = mysqli_query($conn, $paySelect);
  if(mysqli_num_rows($paySql)==0){
    echo '<div class="div" style="height: 1rem;"></div>
      <a href="https://jainrashtriyaektasangthan.in/payment/products.php"  class="button-edit"><i class="fa-solid fa-lock"></i>Complete Payment</a>
</div>';
	echo 'NOTE : Without Payment Your Matrimonial Profile will not be visible to bride/groom.';
  } 
}

?>

		