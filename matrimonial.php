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
     <link rel="stylesheet" href="styles/matrimonial.css?=<?php echo time(); ?>">
     <link rel="stylesheet" href="styles/index.css?=<?php echo time(); ?>">

    <!-- This Are My JS Files -->
    <script src="js/loader.js"></script>
    <script src="js/hover_top.js"></script>
    <script src="js/navbar.js"></script>
    <!-- This is An End To My JS Files -->
<script>
    function set_language(){
    var language = jQuery('#lang').val();
    window.location.href= 'matrimonial.php?age=&location=&lang='+language;
}

</script>
 </head>

 <body>
    <?php
    session_start();
if($_SESSION['fname'] == ""){
    echo "<div class='error-container'>
    <h1>Can't Access Matrimonial Page :</h1>
    <p>You Have Not Logged in or Not have an Account.</p>
    <a href='login.php' target='_blank'>Login</a>
    <a href='register.php' target='_blank'>Create Account</a>
 </div> ";
     exit();
  }

    ?>
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
            <li><a href="events.php"><?php echo $top_nav[$_GET['lang']]['1']; ?></a></li>
            <li><a href="achievers.php"><?php echo $top_nav[$_GET['lang']]['2']; ?></a></li>
            <li><a href="profile_creation.php" class="active"><?php echo $top_nav[$_GET['lang']]['3']; ?></a></li>
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
     <div class="div" style="height: 4rem;"></div>


     <div class="search-bg">

         <div class="head">
             <h1>Jain<b style="color: tomato;">RashtriyaEkta</b>Sangathan.in</h1>
             <p>Wishes you best of Luck for finding your future soul mate</p>
         </div>

         <div class="search">
              <form action="" method="get">
             <div class="input-box">
                 <label for=""><i class="fa-solid fa-user"></i> Enter Age</label>
                 <input type="text" placeholder="24"  value="<?php if(isset($_GET['age'])){echo $_GET['age'];} ?>" name="age" min="18" max="60" maxlength="2">
             </div>

             <div class="input-box">
                 <label for=""><i class="fa-solid fa-location-dot"></i> Enter Location</label>
                 <input type="text" name="location" placeholder="e.g Ahmedabad"  value="<?php if(isset($_GET['location'])){echo $_GET['location'];} ?>" maxlength="40">
             </div>

             <input type="submit" value="Search">
             </form> 

         </div>
     </div>

     <!-- This is My Actual Searching Query -->
<?php
 
  
if(isset($_GET['age'])  OR isset($_GET['location'])){

    $filtervalues = $_GET['age'];
    $filtervalues2 = $_GET['location'];
  
  
    // This is My Search Bar Query for age from my matri db
    $select_matri_db = "SELECT * from matriprofile where CONCAT(age) LIKE '%$filtervalues%' AND status = 'ACTIVE' ";
    $queryrun1 = mysqli_query($conn, $select_matri_db);
 
    $select_regis_db = "SELECT * from registration where CONCAT(city) LIKE '%$filtervalues2%'";
    $queryrun2 = mysqli_query($conn, $select_regis_db);
 
   
    if(mysqli_num_rows($queryrun1) > 0 || mysqli_num_rows($queryrun2) > 0){
      
      
        foreach($queryrun1 as $i1){
        foreach($queryrun2 as $i2){
            if($i1['matri_id'] != $i2['id'] ){

            }else{
              $id_matri = $i1['matri_id'];
              $id_regis = $i1['id'];

                $res = "<div class='profile-card'>
                <div class='profile-card-l'>
                    <img src='images/profile.png' alt=''>
                </div>
                <div class='profile-card-r'>
                    <h2>".$i2['fname']." ". $i2['lname'] ."</h2>
            
                    <div class='row'>
                        <div class='column'>
                            <span id='age'><b>Age: </b>".$i1['age']." years</span>
                            <span id='work'><b>Work:</b>".$i1['work_title']."</span>
                        </div>
                        <div class='column'>
                            <span id='mba'><b>Edu: </b>".$i1['course']."</span>
                            <span id='city'><b>City:</b>".$i2['city']."</span>
                        </div>
                    </div>
            
                    <p id='bio'>".$i1['bio']."</p>
                    <a href='matriprofile.php?id=".$id_matri."' target='_blank'>view profile</a>
                </div>
            </div>
            ";
 
            
            echo $res;

            }
            }
            
            }
            
            
            }
            
            
            }
            
            ?>

     <!-- This is An end to my Actual Searching Query -->
     
     <!-- This are My Profiles -->
     <div class="matri-profiles">

        <!-- This is My Profile Card -->
       
         <!-- This is An End to My Individual PRofile Card -->
     <!-- THis is MY Php Script -->

 

     </div>
     <!-- This is An End -->


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



    <!-- This Are My JS Files -->
    <script src="js/loader.js"></script>
    <script src="js/hover_top.js"></script>
    <script src="js/navbar.js"></script>
    <!-- This is An End To My JS Files -->
<script>
    function set_language(){
    var language = jQuery('#lang').val();
    window.location.href= 'matrimonial.php?age=&location=&lang='+language;
}
</script>
 </body>

 </html>