<?php

error_reporting(0);
include 'connection/conn.php';
include 'connection/lang.php';
include 'connection/lang_ach.php';

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
    <title>Achiever's</title>

    <?php include 'links.php'; ?>
    <link rel="stylesheet" href="styles/achievers.css?=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/index.css?=<?php echo time(); ?>">

    <style>
        .slide img{
            max-height: 60vh;
        }
    </style>

</head>

<body>

    <!-- This is My Loader -->
  <!-- Loader Container -->
  <div class="loader-container">
    <span>Please, Wait a Moment !!!</span>
    <div class="loader"></div>
  </div>
  <!-- This is My Hover to Top Button -->
  <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa-solid fa-arrow-up-long"></i></button>
    <!-- This is My Header -->
    <nav>
    <a href="index.php" class="logo">
                <img src="images/jres_logo.png" style="min-width: 120px; max-height: 130px;" alt="">
            </a>
        <ul id="nav">
          
            <li><a href="index.php"><?php echo $top_nav[$_GET['lang']]['0']; ?></a></li>
            <li><a href="events.php" ><?php echo $top_nav[$_GET['lang']]['1']; ?></a></li>
            <li><a href="achievers.php" class="active"><?php echo $top_nav[$_GET['lang']]['2']; ?></a></li>
            <li><a href="profile_creation.php"><?php echo $top_nav[$_GET['lang']]['3']; ?></a></li>
            <li><a href="myprofile.php" id="my_profile"><i class="fa-solid fa-user"></i><?php echo $top_nav[$_GET['lang']]['4']; ?></a></li>
            <li>
                <label for="lang" style="color: darkslategrey;"><i class="fa-solid fa-globe"></i></label>
                <select name="lang" id="lang" onchange="set_language();">
                    <option value="ENG" <?php echo $en_selected; ?>>English</option>
                    <option value="HINDI"<?php echo $hi_selected; ?>>Hindi</option>
                </select>
            </li>
        </ul>
        <div class="toggle">
                <i class="fa-solid fa-bars" id="open">&nbsp;<small>Menu</small></i>
                <i class="fa-solid fa-xmark" id="close" style="display: none;"></i>
    
            </div>
    </nav>
    <!-- This is My Header End -->
    <div class="div" style="height: 4rem; background-color: #f4f7f8;"></div>


    <div class="head">
        <div class="head-l">
        <img src="images/web_img1.jpg" alt="Slide 1">

        </div>
        <div class="head-r">
            <span># JRES Achievers</span>
            <h1><?php echo $ach_para[$_GET['lang']][0]; ?></h1>
            <p><?php echo $ach_para[$_GET['lang']][1]; ?></p>
        </div>
    </div>

    <div class="achieve-main">
        <h3><?php echo $ach_para[$_GET['lang']][2]; ?></h3>
        <?php
          $sql_regis = "SELECT * from registration where achiever = 'YES' order by id limit 7";
          $exe_regis = mysqli_query($conn, $sql_regis);

          if(mysqli_num_rows($exe_regis) > 0){
            foreach($exe_regis as $e){
?>

        <div class="achieve-inner">
            <button onclick="showOverlay()">
            <img src="images/profile.png" alt="">

            </button>
            <h4><?php echo $e['fname']; ?>&nbsp;<?php echo $e['lname']; ?></h4>
            <p><?php echo $e['bio']; ?></p>
            <!-- Overlay container -->
<div id="overlay" class="overlay">
    <div class="overlay-content">
        <span class="close-btn" onclick="hideOverlay()">&times;</span>
        <h3>Harsh Chauhan</h3>
        <br><br>

        <div class="overlay-content-open">
          
        <span><i class="fa-solid fa-user"></i><?php echo $e['ach_title']; ?></span><br>
      <span><i class="fa-solid fa-location-dot"></i><?php echo $e['city']; ?></span>
        </div>

        <!-- Add your event details here -->
        <p><?php echo $e['short_bio']; ?></p>
<!-- 
        <p style="background-color: #f6f4f8; padding: 10px 15px; margin-top: 1.5rem; border-radius: 5px;"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero molestiae esse rem eligendi minima pariatur dolore quae labore reiciendis earum?</p> -->
    </div>

</div>
 
    <!-- This is An End for My Click on Details -->
        </div>
        <?php
            }
          }

          ?>
 

    </div>

<div class="div" style="margin-top: -10rem;"></div>


      <!-- This is My Footer -->
      <footer>
        <div class="footer-links f1">
            <img src="images/jres_logo.png" alt="JRES Logo">

            <div class="footer-logo-icons">
                <a href="tel:9825005735"><i class="fa-solid fa-mobile"></i>+91 98250 05735 </a>
                <a href="tel:07935620051"><i class="fa-solid fa-phone"></i>079-3562 0051</a>
                <a href="mailto:jainektasangathan@gmail.com"><i class="fa-solid fa-envelope"></i>jainektasangathan@gmail.com</a>

            </div>

        </div>

        <div class="footer-links f2">
            <h4><?php echo $footer_links[$_GET['lang']][0]; ?></h4>
            <ul>
                <a href="index.php"><?php echo $footer_content[$_GET['lang']][0]; ?></a>
                <a href="achievers.php"><?php echo $footer_content[$_GET['lang']][1]; ?></a>
                <a href="about.php" target="_blank"><?php echo $footer_content[$_GET['lang']][2]; ?></a>
                <a href="contact.php" target="_blank"><?php echo $footer_content[$_GET['lang']][3]; ?></a>
            </ul>
        </div>

        <div class="footer-links">
            <h4><?php echo $footer_links[$_GET['lang']][1]; ?></h4>
            <ul>
                <a href="register.php" target="_blank"><?php echo $footer_content[$_GET['lang']][4]; ?></a>
                <a href="profile_creation.php" target="_blank"><?php echo $footer_content[$_GET['lang']][5]; ?></a>
                <a href="events.php"><?php echo $footer_content[$_GET['lang']][6]; ?></a>
                <a href="terms.html" target="_blank"><?php echo $footer_content[$_GET['lang']][7]; ?></a>
            </ul>
        </div>

        <div class="footer-links">
            <!-- Address Icons : <i class="fa-solid fa-location-dot"></i> -->
            <div class="addr_map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3670.530693779203!2d72.53186477372591!3d23.077661114273198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e8346456aaaab%3A0x348287be8058678!2sain%20Rastriya%20Ekta%20Sangthan%20.!5e0!3m2!1sen!2sin!4v1701956589367!5m2!1sen!2sin" width="280" height="150" style="border: 1px solid lightslategrey; border-radius: 5px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <br>
            <strong style="border-top: 1px dashed darkslategrey; padding-top: 10px; width: 100%;"><?php echo $footer_links[$_GET['lang']][2]; ?>
            <br>
            <address style="color: slategrey;">
            <?php echo $footer_content[$_GET['lang']][8]; ?>
            </address>


        </div>
    </footer>
    <!-- This is My Footer End -->

    <!-- This is My CopyRight -->
    <div class="copyRight">
        <p>Copyright <b><i class="fa-regular fa-copyright"></i> 2023</b> - <a href="/index.php" style="color: #262626;"><b>JainRashtriyaEktaSangathan.in</b></a> | All Rights Reserved</p>
    </div>
    <!-- This is An End to My CopyRight -->




    <!-- This Are My JS -->
    <script src="js/commons.js"></script>
    <script src="js/events.js"></script>
    <script src="js/loader.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/hover_top.js"></script>
    <script>

        function set_language(){
    var language = jQuery('#lang').val();
    window.location.href= 'achievers.php?lang='+language;
        }
    </script>
    <!-- This is An End To My JS -->

</body>

</html>