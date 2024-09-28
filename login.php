<?php

include 'connection/regis_lang.php';


// This is For My Language
$en_selected = "";
$hi_selected = '';
 
if((isset($_GET['lang']) && $_GET['lang']=='ENG' || !isset($_GET['lang']))){
    $en_selected = "selected";
    $_GET['lang'] = 'ENG';
}else{
    $hi_selected = "selected";
    $_GET['lang'] = 'HINDI';
}
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'links.php'; ?>
    <link rel="stylesheet" href="styles/registration.css?=<?php echo time(); ?>">

    <style>
        .para{
            text-align: center;
        }
    </style>

</head>
<body>
<div class="back">
    <a href="index.php"><i class="fa-solid fa-house"></i>&nbsp;<?php echo $regis_h[$_GET['lang']][0]; ?></a>
    

&nbsp;&nbsp;&nbsp;        <label for="lang" style="color: darkslategrey;"><i class="fa-solid fa-globe"></i></label>
                <select name="lang" id="lang" onchange="set_language();">
                    <option value="ENG" <?php echo $en_selected; ?> selected>English</option>
                    <option value="HINDI"<?php echo $hi_selected; ?>>Hindi</option>
                </select>
  </div>

  <!-- This is My Form -->
  <section class="container">

<form action="connection/insert_login.php" class="form" method="post">
 
        <div class="para">
        <h1><?php echo $regis_h[$_GET['lang']][16]; ?></h1>
        <div class="line"><div class="line-inner"></div></div>
        </div>

   

    <div class="input-box">
        <label><?php echo $regis_h[$_GET['lang']][4]; ?></label>
        <input type="email" name="email" placeholder="e.g jenish.demo@dmail.com" required />
    </div>
 


    <div class="input-box">
        <label><?php echo $regis_h[$_GET['lang']][18]; ?></label>
        <input type="password" name="password" id="password" placeholder="*************" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
        <input type="checkbox" onclick="showPassword();">  <small><?php echo $regis_h[$_GET['lang']][9]; ?></small>
    </div>
    <br>
    <p style="padding-top: 15px; border-top: 1px dashed lightslategrey;"><?php echo $regis_h[$_GET['lang']][19]; ?> - <a href="register.php">Create One</a></p>
 
    <p><i class="fa-solid fa-arrow-right-long"></i> <?php echo $regis_h[$_GET['lang']][17]; ?> - <a href="resetPassword.php">Reset Now</a></p>
    <input type="submit" name="submit" value="<?php echo $regis_h[$_GET['lang']][16]; ?>">
</form>
</section>
<!-- This is End to My Form -->


<!-- My JS Files -->
<script src="js/register_commons.js"></script>
<script>
        function set_language(){
    var language = jQuery('#lang').val();
    window.location.href= 'login.php?lang='+language;
}
    </script>
</body>
</html>