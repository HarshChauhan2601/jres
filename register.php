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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--<title>Registration Form in HTML CSS</title>-->
     <!-- This is Multi LAnguage Code -->
     <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ec3a451c3a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">

    <!-- This are My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Rubik&display=swap" rel="stylesheet">

    <!-- This is Multi LAnguage Code -->

     
    <script>
        function set_language(){
    var language = jQuery('#lang').val();
    window.location.href= 'register.php?lang='+language;
}
    </script>
    <!-- This are My CSS Files -->
    <!---Custom CSS File--->
    <link rel="stylesheet" href="styles/registration.css?=<?php echo time(); ?>" />
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

        <form action="connection/insert_register.php" class="form" enctype="multipart/form-data" method="post">

            <div class="column">
                <!-- This is My PRofile Pic Upload -->

                <div class="avatar-upload">
                    <div class="avatar-edit">

                        <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg" max-size="2000" name="file1" />
                        <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview">
                        <div id="imagePreview" style="background-image: url(images/profile.png);">
                        <img src="" alt="">
                        </div>
                    </div>
                </div>
                <!-- This is AN End to My Profile Pic Upload -->

                <div class="para">
                    <h1><?php echo $regis_h[$_GET['lang']][1]; ?></h1>
                    <div class="line">
                        <div class="line-inner"></div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label><?php echo $regis_h[$_GET['lang']][2]; ?></label>
                    <input type="text" placeholder="e.g Jenish" maxlength="40" name="fname" value="<?php if (isset($_POST['name'])) {
                                                                                                        echo $_POST['fname'];
                                                                                                    }   ?>" required />
                </div>

                <div class="input-box">
                    <label><?php echo $regis_h[$_GET['lang']][3]; ?></label>
                    <input type="text" placeholder="e.g Shah" maxlength="40" name="lname" required />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label><?php echo $regis_h[$_GET['lang']][4]; ?></label>
                    <input type="email" placeholder="e.g jenish.demo@dmail.com" name="email" required />
                </div>

                <div class="input-box">
                    <label><?php echo $regis_h[$_GET['lang']][5]; ?></label>
                    <input type="date" name="dob" required />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label><?php echo $regis_h[$_GET['lang']][6]; ?></label>
                    <input type="tel" placeholder="987XXXXXXX" minlength="10" maxlength="10" name="phone" required />
                </div>
                <div class="input-box">
                    <label><?php echo $regis_h[$_GET['lang']][7]; ?></label>
                    <input type="text" placeholder="e.g Ahmedabad" list="city" maxlength="50" name="city" required />
                     
                </div>
            </div>


            <div class="input-box">
                <label><?php echo $regis_h[$_GET['lang']][8]; ?></label>
                <input type="password" placeholder="*************" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" minlength="8" maxlength="16" name="password" required />
                <input type="checkbox" onclick="showPassword();"> <small><?php echo $regis_h[$_GET['lang']][9]; ?></small><br>
                <small>
                    *<?php echo $regis_h[$_GET['lang']][10]; ?>
                </small>
            </div>


            <div class="gender-box">
                <h3><?php echo $regis_h[$_GET['lang']][11]; ?></h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="gender" value="MALE" checked />
                        <label for="check-male"><?php echo $regis_h[$_GET['lang']][12]; ?></label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="gender" value="FEMALE" />
                        <label for="check-female"><?php echo $regis_h[$_GET['lang']][13]; ?></label>
                    </div>
                    <!-- <div class="gender">
                            <input type="radio" id="check-other" name="gender" />
                            <label for="check-other">prefer not to say</label>
                        </div> -->
                </div>
            </div>

            <div class="input-box">
                <p> <input type="checkbox" name="policy_accept" id="" required>

                    *<?php echo $regis_h[$_GET['lang']][14]; ?></p>
            </div>

            <br>

            <p style="padding-top: 15px; border-top: 1px dashed lightslategrey;"><i class="fa-solid fa-arrow-right-long"></i><?php echo $regis_h[$_GET['lang']][15]; ?> - <a href="login.php">Login Now</a></p>
            <br>

            <input type="submit" name="submit" value="Register">
            <br>
        </form>
    </section>
    <!-- This is End to My Form -->








    <!-- My JS Files -->
    <!-- comons -->
    <script src="js/commons.js"></script>
    <script src="js/register_commons.js"></script>


</body>

</html>