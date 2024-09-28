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

session_start();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JainRashtriyaEktaSangathan My Profile</title>

    <?php include 'links.php'; ?>

    <!-- This are My Styles -->
    <link rel="stylesheet" href="styles/myprofile.css?=<?php echo time();?>">
    <!-- For Header -->
    <link rel="stylesheet" href="styles/index.css?=<?php echo time(); ?>">

       
  

</head>

<body>

<?php
 if($_SESSION['fname'] == ""){
    echo "<div class='error-container'>
    <h1>Can't Access MyProfile :</h1>
    <p>You Have Not Logged in or Not have an Account.</p>
    <a href='login.php' target='_blank'>Login</a>
    <a href='register.php' target='_blank'>Create Account</a>
 </div> ";
     exit();
  }

?>

       <!-- This is My Header -->
       <nav>
    <a href="index.php" class="logo">
                <img src="images/jres_logo.png" style="min-width: 120px; max-height: 130px;" alt="">
            </a>
        <ul id="nav">
          
            <li><a href="index.php"><?php echo $top_nav[$_GET['lang']]['0']; ?></a></li>
            <li><a href="events.php"><?php echo $top_nav[$_GET['lang']]['1']; ?></a></li>
            <li><a href="achievers.php"><?php echo $top_nav[$_GET['lang']]['2']; ?></a></li>
            <li><a href="profile_creation.php"><?php echo $top_nav[$_GET['lang']]['3']; ?></a></li>
            <li><a href="myprofile.php" id="my_profile" class="active"><i class="fa-solid fa-user"></i><?php echo $top_nav[$_GET['lang']]['4']; ?></a></li>
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

    <!-- This is My Header End -->
    <div class="div" style="height: 5.1rem;"></div>
    <!-- This is My Loader -->
  <!-- Loader Container
  <div class="loader-container">
    <span>Please, Wait a Moment !!!</span>
    <div class="loader"></div>
  </div>
 -->
      <!-- This is My Hover to Top Button -->
      <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa-solid fa-arrow-up-long"></i></button>


    <div class="bg">
        <div class="bg-head">
            <h1><?php echo $myprofile_para[$_GET['lang']][0]; ?>&nbsp;<?php echo $_SESSION['fname']; ?></h1>
            <p><?php echo $myprofile_para[$_GET['lang']][1]; ?>
</p>
        </div>
    </div>
    <main>


    <!-- This is For My Profile Pic -->
    <?php
    $pic_sql = "select * from registration where email = '".$_SESSION['email']."'";
    $exe_pic = mysqli_query($conn, $pic_sql);
    $store_img = '';
    if(mysqli_num_rows($exe_pic) > 0){
        foreach($exe_pic as $e){
            $store_img = $e['profile_pic'];
        }
    }
  
    ?>
    <div class="profile-left">
            <img src="<?php echo "connection/".$store_img; ?>?>" alt="">

            <div class="profile-left-edit">
                <div class="div" style="height: 1rem;"></div>
                <a href="edit.php" style="max-width: 90%;" target="_blank" class="button-edit"><?php echo $myprofile_edit[$_GET['lang']][0]; ?> <i class="fa-solid fa-pen-to-square"></i></a>

                <div class="div" style="height: 1rem;"></div>
                <!-- button-matrimonial -->
                <!-- <button href="profile_creation.php" target="_blank" class="button-matrimonial"><i class="fa-solid fa-plus"></i> <a href="profile_creation.php" target="_blank" style="color: white; width: 200px;">Add Matrimonial Profile</a></button> -->

                <!-- <a href="" class="button-matrimonial"><i class="fa-solid fa-plus"></i> Add Matrimonial Info</a> -->

                <div class="div" style="height: 1rem;"></div>
                <a href="https://jainrashtriyaektasangthan.in/connection/logout.php"  class="button-2"><?php echo $myprofile_edit[$_GET['lang']][1]; ?> <i class="fa-solid fa-right-from-bracket"></i></a>

            </div>
        </div>

        <div class="profile-right">

            <!-- This is Just To Display All The Detailss -->
            <div class="profile-right-content" id="just_view">
                <h2><?php echo $myprofile_head1[$_GET['lang']][0]; ?></h2>

                <div class="just_view_row">
                    <div class="column">
                        <h3><?php echo $myprofile_head1[$_GET['lang']][1]; ?></h3>
                        <span><?php echo $_SESSION['fname']; ?></span>
                    </div>
                    <div class="column">
                        <h3><?php echo $myprofile_head1[$_GET['lang']][2]; ?></h3>
                        <span><?php echo $_SESSION['lname']; ?></span>
                    </div>
                </div>
                <div class="just_view_row">
                    <div class="column">
                        <h3>*<?php echo $myprofile_head1[$_GET['lang']][3]; ?></h3>
                        <span><?php echo $_SESSION['email']; ?></span>
                    </div>
                    <div class="column">
                        <h3><?php echo $myprofile_head1[$_GET['lang']][4]; ?></h3>
                        <span><?php echo $_SESSION['phone']; ?></span>
                    </div>
                </div>


                <div class="just_view_row">
                    <div class="column">
                        <h3>*<?php echo $myprofile_head1[$_GET['lang']][5]; ?></h3>
                        <span><?php echo $_SESSION['gender']; ?></span>
                    </div>

                    <div class="column">
                        <h3><?php echo $myprofile_head1[$_GET['lang']][6]; ?></h3>
                        <span><?php echo $_SESSION['city']; ?></span>
                    </div>
                    
                </div>

                <div class="just_view_row">
                <div class="column">
                        <h3><?php echo $myprofile_head1[$_GET['lang']][7]; ?></h3>
                        <span><?php echo $_SESSION['dob']; ?></span>
                    </div>
                    <div class="column">
                        <h3><?php echo $myprofile_head1[$_GET['lang']][8]; ?></h3>
                        <span>**********</span>
                    </div>
                </div>

<!-- This are My Other Details -->

                <h2><?php echo $myprofile_head2[$_GET['lang']][0]; ?></h2>
                <div class="just_view_row">
                    <div class="column">
                        <h3><i class="fa-solid fa-calendar-days"></i>&nbsp;<?php echo $myprofile_head2[$_GET['lang']][1]; ?></h3>
                        <span><?php echo $_SESSION['created_at']; ?></span>
                    </div>
                    <div class="column">
                        <h3><i class="fa-solid fa-clock"></i><?php echo $myprofile_head2[$_GET['lang']][2]; ?></h3>
                        <span><?php echo $_SESSION['updated_at']; ?></span>
                    </div>
                </div>

                <div class="just_view_row">
                    <div class="column">
                        <h3><i class="fa-solid fa-globe"></i><?php echo $myprofile_head2[$_GET['lang']][3]; ?></h3>
                        <span><?php echo $_SESSION['lang']; ?></span>
                    </div>
                    <div class="column">
                        <h3><i class="fa-solid fa-user"></i> <?php echo $myprofile_head2[$_GET['lang']][4]; ?></h3>
                        <span><?php echo $_SESSION['matri_profile_created']; ?></span>
                    </div>
                </div>

                <!--  -->
                <!-- This is To Check If Matrimonial is Created or Not -->
                <?php
                 
                 if($_SESSION['matri_profile_created'] == "NO"){
                    echo " <div class='error-container'>
                    <h1>Matrimonial Not Available</h1>
                    <p>Matrimonial Profile Not Created Yet.</p>
                    <a href='profile_creation.php' target='_blank'>Create Now</a>
                </div> ";
                exit;
                 }else{

             
                $sql_check = "select * from matriprofile where matri_id = '".$_SESSION['id']."' order by id desc limit 1";
                $exe = mysqli_query($conn, $sql_check);

                if(mysqli_num_rows($exe) > 0){
                    foreach($exe as $r){
                ?>
                <!-- This is An End -->
                <!-- This Are My Matrimonial Details -->
                <h2><?php echo $myprofile_head3[$_GET['lang']][0]; ?></h2>
                <div class="just_view_row">
                <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][1]; ?></h3>
                        <span><?php echo $r['mother_tongue']; ?></span>
                    </div>
                    <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][2]; ?></h3>
                        <span><?php echo $r['edu']; ?></span>
                    </div>
                </div>

                <div class="just_view_row">
                <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][3]; ?></h3>
                        <span><?php echo $r['course']; ?></span>
                    </div>
                    <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][4]; ?></h3>
                        <span><?php echo $r['college_name']; ?></span>
                    </div>
                </div>

                <div class="just_view_row">
                <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][5]; ?></h3>
                        <span><?php echo $r['height_ft']; ?></span>
                    </div>
                    <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][6]; ?></h3>
                        <span><?php echo $r['height_inches']; ?></span>
                    </div>
                </div>

                <div class="just_view_row">
                <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][7]; ?></h3>
                        <span><?php echo $r['father_name']; ?></span>
                    </div>
                    <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][8]; ?></h3>
                        <span><?php echo $r['father_occupation']; ?></span>
                    </div>
                </div>


                <div class="just_view_row">
                <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][9]; ?></h3>
                        <span><?php echo $r['mother_name']; ?></span>
                    </div>
                    <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][10]; ?></h3>
                        <span><?php echo $r['siblings']; ?></span>
                    </div>
                </div>

                
                <div class="just_view_row">
                <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][11]; ?></h3>
                        <span><?php echo $r['martial']; ?></span>
                    </div>
                    <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][12]; ?></h3>
                        <span><?php echo $r['native']; ?></span>
                    </div>
                </div>

                <div class="just_view_row">
                <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][13]; ?></h3>
                        <span><?php echo $r['parent_living']; ?></span>
                    </div>
                    <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][14]; ?></h3>
                        <span><?php echo $r['work_title']; ?></span>
                    </div>
                </div>

                <div class="just_view_row">
                <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][15]; ?></h3>
                        <span><?php echo $r['age']; ?></span>
                    </div>
                    <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][16]; ?></h3>
                        <span><?php echo $r['work_type']; ?></span>
                    </div>
                </div>

 

                <div class="just_view_row">
                <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][17]; ?></h3>
                        <span><?php echo $r['cname']; ?></span>
                    </div>
                    <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][18]; ?></h3>
                        <span><?php echo $r['income']; ?></span>
                    </div>
                </div>

                
                <div class="just_view_row">
                <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][19]; ?></h3>
                        <span><?php echo $r['father_status']; ?></span>
                    </div>
                    <div class="column">
                        <h3><?php echo $myprofile_head3[$_GET['lang']][20]; ?></h3>
                        <span><?php echo $r['mother_status']; ?></span>
                    </div>
                </div>

 
             <?php   
                

       
            }
        }
    } //Main Else

        ?>
                



                <!-- This is An End  -->
               
            </div>
</div>
            <div class="profile-right-content" id="just_update">
                <h2>Profile Update Details</h2>
                <!-- This is My Simple Form -->
                <form action="/connection/insert_update.php" method="post">


                    <div class="input">
                        <label for="">First Name</label>
                        <input type="text" name="fname" maxlength="30" placeholder="" value="<?php echo $_SESSION['fname']; ?>">

                    </div>

                    <div class="input">
                        <label for="">Last Name</label>
                        <input type="text" name="lname" maxlength="30" value="<?php echo $_SESSION['lname']; ?>" placeholder="">
                    </div>

                    <div class="input">

                        <!-- Mobile Number -->
                        <label for="phone">Mobile Number:</label>
                        <input type="tel" id="phone" name="phone" maxlength="10" value="<?php echo $_SESSION['phone']; ?>" required>
                    </div>

                    <div class="input">
                        <!-- Location -->
                        <label for="city">City:</label>
                        <input type="text" id="location" name="city" value="<?php echo $_SESSION['city']; ?>" required>

                    </div>

                    <div class="input">
                        <!-- DOB -->
                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" name="dob" value="<?php echo $_SESSION['dob']; ?>" required>

                    </div>

                    <div class="input">
                        <!-- Profile Pic -->
                        <label for="file1">Update Profile Pic</label>
                        <input type="file" id="file1" name="file1" accept=".png, .jpg, .jpeg" max-size="2000" value="<?php echo $_SESSION['profile_pic']; ?>" required>
                        <br>
                        <small>*Max File size 2MB only accepted(.png | .jpg | .jpeg)</small>
                    </div>



                    <div class="btn">
                        <!-- Submit Button -->
                        <input type="submit" name="update" value="Update">
                    </div>

                </form>

            </div>

           
        </div>

    </main>


   

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


  
    
  <!-- This Are MY JS FILES -->
         <script src="js/loader.js"></script>
    <!-- <script src="js/myprofile.js"></script> -->
    <script src="js/navbar.js"></script>
    <script src="js/hover_top.js"></script>
    <script>
    function set_language(){
    var language = jQuery('#lang').val();
    window.location.href= 'myprofile.php?lang='+language;}
</script>
<script>
function editable(){
    document.getElementById("just_update").style.display = "block";
    document.getElementById("just_view").style.display = "none";
 }

 </script>
</body>

</html>