<?php
  error_reporting(0);
  include 'connection/conn.php';
  include('connection/lang.php');

  
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
  <link rel="stylesheet" href="styles/about.css?=<?php echo time(); ?>">
  <link rel="stylesheet" href="styles/index.css?=<?php echo time(); ?>">

</head>
<body>
    <!-- This is My Header -->
    <nav>
    <a href="index.php" class="logo">
                <img src="images/jres_logo.png" style="min-width: 120px; max-height: 130px;" alt="">
            </a>
        <ul id="nav">
          
            <li><a href="index.php" class="active"><?php echo $top_nav[$_GET['lang']]['0']; ?></a></li>
            <li><a href="events.php"><?php echo $top_nav[$_GET['lang']]['1']; ?></a></li>
            <li><a href="achievers.php"><?php echo $top_nav[$_GET['lang']]['2']; ?></a></li>
            <li><a href="profile_creation.php"><?php echo $top_nav[$_GET['lang']]['3']; ?></a></li>
            <li><a href="myprofile.php" id="my_profile"><i class="fa-solid fa-user"></i><?php echo $top_nav[$_GET['lang']]['4']; ?></a></li>
            <li>
                <label for="lang" style="color: darkslategrey;"><i class="fa-solid fa-globe"></i></label>
                <select name="lang" id="lang" onchange="set_language();">
                    <option value="ENG" <?php echo $en_selected; ?> selected>English</option>
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
    <div class="div" style="height: 5rem;"></div>


  

  
    <h1><?php echo $about_content[$_GET['lang']][0]; ?></h1>
    

    <div class="about">

    <div class="about-inner">
           <div class="about-inner-l">
                <img src="img/photo-1542291026-7eec264c27ff(1).jpg" alt="">
           </div>
           <div class="about-inner-r" >
                <h2><?php  echo $about_content[$_GET['lang']][1]; ?></h2>
                <p>
                <?php echo $about_content[$_GET['lang']][2]; ?>

                </p>
                <button><i class="fa-solid fa-user"></i>&nbsp;<?php echo $about_content[$_GET['lang']][3]; ?></button>
           </div>
      </div>






    </div>
    

    <div class="about" id="ab2">
      
    <div class="about-inner">
          
          <div class="about-inner-r">
               <h2>Demo</h2>
               <p>
                
               </p>
               <button style="background-color: #0077f0; border: 2px solid #0077f0;"><i class="fa-solid fa-user"></i> Social Reformer</button>
          </div>

          <div class="about-inner-l" >
               <img src="img/photo-1542291026-7eec264c27ff(1).jpg" alt="">
          </div>
     </div>

    </div>


 

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



    <script>
        function set_language(){
    var language = jQuery('#lang').val();
    window.location.href= 'about.php?lang='+language;


}
    </script>

</body>
</html>