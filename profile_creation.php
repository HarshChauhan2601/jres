<?php
  include('connection/lang.php');
  include('connection/lang_ach.php');

  
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
    <title>Matrimonial Page - Profile Creation, Find Groom / Bride</title>


    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ec3a451c3a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">

    <!-- This are My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Rubik&display=swap" rel="stylesheet">

    <!-- This is Multi LAnguage Code -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- This are My Share Buttons -->
    <script type="text/javascript" async src="https://platform-api.sharethis.com/js/sharethis.js#property=647af748413e9c001905a4aa&product=sop"></script>


    <!-- THis Are My Styles Files -->
    <link rel="stylesheet" href="styles/index.css?=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/matrimonial_profile.css?=<?php echo time(); ?>">

    <script>
  function set_language(){
    var language = jQuery('#lang').val();
    window.location.href= 'profile_creation.php?lang='+language;


}
</script>

<style>
 #lang{
  padding: 10px;
 }
</style>

  </head>

  <body>

<?php
session_start();
// Checks if Session is Not Started
if (!isset($_SESSION['fname'])) {
  echo " <div class='error-container'>
    <h1>Error:</h1>
    <p>Please, Login First or Create An Account To Continue.</p>
    <a href='login.php'>Go Back to Login Page</a>
    <a href='register.php'>Go Back to Create Account Page</a>
    </div> ";
} else {
  
?>



    <!-- This is My Loader -->
  <!-- Loader Container -->
  <div class="loader-container">
    <span>Please, Wait a Moment !!!</span>
    <div class="loader"></div>
  </div>

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
                <!-- <label for="lang" style="color: darkslategrey;"><i class="fa-solid fa-globe"></i></label> -->
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

    <div class="profile">

      <div class="p-inner">

      <div class="p-l" id="p-l">
        <h1><?php echo $profile_creation[$_GET['lang']][0]; ?>, <?php echo $_SESSION['fname']; ?></h1>
        <img src="images/profile_matri_page.png" alt="">
        <a href="matrimonial.php?age=&location=" target="_blank"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;&nbsp;<?php echo $profile_creation[$_GET['lang']][1]; ?></a>
      </div>

      <?php

      if($_SESSION['matri_profile_created'] != 'YES'){
            ?>

        <div class="profile-content" id="profile-content">
          <span><?php echo $profile_creation[$_GET['lang']][0]; ?>,&nbsp;<?php echo $_SESSION['fname']; ?></span>
          <h2><?php echo $profile_creation[$_GET['lang']][2]; ?></h2>
          <button class="button-profile" onclick="openMultiStep();"><?php echo $profile_creation[$_GET['lang']][3]; ?>&nbsp;<i class="fa-solid fa-arrow-right-long"></i></button>
        </div>
      </div>

            <?php
      }else{

      }

      ?>




      <!-- This are My MultiStep Form -->
      <form action="connection/insert_matrimonial.php" id="regForm"  method="POST">

        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
        </div>

        <!-- This Are My Inputs -->

        <div class="tab">
          <h3><?php echo $profile_creation[$_GET['lang']][4]; ?><h3>

              <div class="input-box">
                <label for="mother_tongue">*<?php echo $myprofile_head3[$_GET['lang']][1]; ?></label>
                <select name="mother_tongue" id="mother_tongue" required>
                  <option value="hindi" selected>Hindi</option>
                  <option value="bengali">Bengali</option>
                  <option value="telugu">Telugu</option>
                  <option value="marathi">Marathi</option>
                  <option value="tamil">Tamil</option>
                  <option value="urdu">Urdu</option>
                  <option value="gujarati">Gujarati</option>
                  <option value="malayalam">Malayalam</option>
                  <option value="kannada">Kannada</option>
                  <option value="oriya">Oriya</option>
                  <option value="punjabi">Punjabi</option>
                  <option value="assamese">Assamese</option>
                  <option value="maithili">Maithili</option>
                  <option value="santali">Santali</option>
                  <option value="kashmiri">Kashmiri</option>
                  <option value="nepali">Nepali</option>
                  <option value="konkani">Konkani</option>

                </select>
                <!-- Add more languages as needed -->
              </div>
              <br>
              <span>*<?php echo $myprofile_head3[$_GET['lang']][2]; ?></span>
              <div class="row">

                <input type="radio" name="highest_edu" id="edu1" value="Doctorate" required>
                <label for="edu1">Doctorate</label>
                <input type="radio" name="highest_edu" id="edu2" value="Master's">
                <label for="edu2">Master's</label>

                <input type="radio" name="highest_edu" id="edu3" value="Bachelor's" checked>
                <label for="edu3">Bachelor's</label>

                <input type="radio" name="highest_edu" id="edu4" value="Diploma">
                <label for="edu4">Diploma</label>

                <input type="radio" name="highest_edu" id="edu5" value="Undergraduate">
                <label for="edu5">Undergraduate</label>

                <input type="radio" name="highest_edu" id="edu6" value="High School">
                <label for="edu6">High School</label>

                <input type="radio" name="highest_edu" id="edu7" value="Less Than High School">
                <label for="edu7">Less Than High School</label>

                <input type="radio" name="highest_edu" id="edu8" value="Honours">
                <label for="edu8">Honour's</label>

                <input type="radio" name="highest_edu" id="edu9" value="ITI">
                <label for="edu9">ITI</label>


              </div>

              <div class="column">
                <div class="input-box">
                  <label for="course">*<?php echo $myprofile_head3[$_GET['lang']][3]; ?></label>
                  <input type="text" name="course" id="course" maxlength="50" placeholder="e.g CSE / IT" required>
                </div>

                <div class="input-box">
                  <label for="college">*<?php echo $myprofile_head3[$_GET['lang']][4]; ?></label>
                  <input type="text" name="college" id="college" maxlength="50" placeholder="e.g IIM Ahmedabad" required>
                </div>

              </div>

              <div class="row">
                <label for="height_ft">*<?php echo $myprofile_head3[$_GET['lang']][5]; ?></label>
                <input type="text" name="height_ft" id="height_ft" maxlength="1" placeholder="e.g 5" required>
                <label for="height_inches">*<?php echo $myprofile_head3[$_GET['lang']][6]; ?></label>
                <input type="text" name="height_inches" id="height_inches" max="13" maxlength="2" placeholder="e.g 11" required>

              </div>


              <div style="overflow:auto;">
                <div style="float:right;">
                  <button type="button" id="prevBtn" onclick="nextPrev(-1)"><?php echo $profile_creation[$_GET['lang']][8]; ?></button>
                  <button type="submit" id="nextBtn" onclick="nextPrev(1)"><?php echo $profile_creation[$_GET['lang']][9]; ?></button>
                </div>
              </div>


        </div>


        <div class="tab">
          <h3><?php echo $profile_creation[$_GET['lang']][5]; ?></h3>

          <div class="input-box">
            <label for="father_name">*<?php echo $myprofile_head3[$_GET['lang']][7]; ?></label>
            <input type="text" name="father_name" placeholder="e.g Amaal Jain" maxlength="50" required>
          </div>


          <div class="input-box">
            <label for="father_occupation">*<?php echo $myprofile_head3[$_GET['lang']][8]; ?></label>
            <input type="text" name="father_occupation" placeholder="e.g CA" maxlength="50" required>
          </div>

          <div class="input-box">
            <label for="mother_name">*<?php echo $myprofile_head3[$_GET['lang']][9]; ?></label>
            <input type="text" name="mother_name" placeholder="e.g Anita Amaal Jain" maxlength="50" required>
          </div>

          <div class="input-box">
            <label for="siblings">*<?php echo $myprofile_head3[$_GET['lang']][10]; ?></label>
            <select name="siblings" id="siblings" required>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="5+">5+</option>
            </select>
          </div>

          <div style="overflow:auto;">
            <div style="float:right;">
              <button type="button" id="prevBtn" onclick="nextPrev(-1)"><?php echo $profile_creation[$_GET['lang']][8]; ?></button>
              <button type="button" id="nextBtn" onclick="nextPrev(1)"><?php echo $profile_creation[$_GET['lang']][9]; ?></button>
            </div>
          </div>

        </div>

        <div class="tab">
          <h3><?php echo $profile_creation[$_GET['lang']][6]; ?></h3>

          <div class="input-box">
            <label for="martial">*<?php echo $myprofile_head3[$_GET['lang']][11]; ?></label>
            <select name="martial" id="martial" required>
              <option value="Never Married" selected>Never Married</option>
              <option value="Divorced">Divorced</option>
              <option value="Widowed">Widowed</option>
              <option value="Awaiting Divorce">Awaiting Divorce</option>
            </select>
          </div>


          <div class="input-box">
            <label for="native"><?php echo $myprofile_head3[$_GET['lang']][12]; ?></label>
            <input type="text" name="native" placeholder="e.g Uvarsad, Gujarat" maxlength="50">
          </div>

          <div class="input-box">
            <label for="native">*<?php echo $myprofile_head3[$_GET['lang']][15]; ?></label>
            <input type="text" name="age" placeholder="e.g 24" min="18" max="60" maxlength="50" required>
          </div>

          <div class="input-box">
            <label for="parent_living"><?php echo $myprofile_head3[$_GET['lang']][13]; ?></label>
            <select name="parent_living" id="parent_living">
              <option value="Lives With Me" selected>Lives With Me</option>
              <option value="Do Not Live with Me">Do Not Live with Me</option>
              <option value="None Applicable">None Applicable</option>
            </select>
          </div>

          <div class="input-box">
            <label for="work_type">*<?php echo $myprofile_head3[$_GET['lang']][16]; ?></label>
            <select name="work_type" id="" required>
              <option value="Self Employed">Self Employed</option>
              <option value="Business">Business</option>
              <option value="Government Services">Government Services</option>
              <option value="Job" selected>Job</option>
              <option value="Unemployed">Unemployed</option>
              <option value="Other">Other</option>
            </select>
          </div>


          <div style="overflow:auto;">
            <div style="float:right;">
              <button type="button" id="prevBtn" onclick="nextPrev(-1)"><?php echo $profile_creation[$_GET['lang']][8]; ?></button>
              <button type="submit" id="nextBtn" onclick="nextPrev(1)"><?php echo $profile_creation[$_GET['lang']][9]; ?></button>
            </div>
          </div>

        </div>

        <div class="tab">
          <h3><?php echo $profile_creation[$_GET['lang']][7]; ?></h3>


          <div class="input-box">
            <label for="work_title">*<?php echo $myprofile_head3[$_GET['lang']][14]; ?></label>
            <input type="text" name="work_title" placeholder="e.g Entrepreneur / IAS" maxlength="40" required>
          </div>


          <div class="input-box">
            <label for="cname">*<?php echo $myprofile_head3[$_GET['lang']][17]; ?></label>
            <input type="text" name="cname" placeholder="e.g Reliance / Indian Armed Forces" maxlength="50" required>
          </div>

          <div class="input-box">
            <label for="bio">*Add Bio (Max. 250 Characters)</label>
            <textarea name="bio" id="" cols="20" rows="5" maxlength="250" placeholder=""  required></textarea>
          </div>

          <div class="input-box">
            <label for="income">*<?php echo $myprofile_head3[$_GET['lang']][18]; ?></label>
            <select name="income" id="income" required>
              <option value="INR 1 Lakh to 2 Lakh">INR 1 to 2 Lakh</option>
              <option value="INR 2 Lakh to 4 Lakh">INR 2 Lakh to 4 Lakh</option>
              <option value="INR 4 Lakh to 8 Lakh">INR 4 Lakh to 8 Lakh</option>
              <option value="INR 8 Lakh to 12 Lakh">INR 8 Lakh to 12 Lakh</option>
              <option value="INR 12 Lakh to 20 Lakh">INR 12 Lakh to 20 Lakh</option>
              <option value="INR 20 Lakh to 30 Lakh">INR 20 Lakh to 30 Lakh</option>
              <option value="INR 30 Lakh to 50 Lakh">INR 30 Lakh to 50 Lakh</option>
              <option value="INR 50 Lakh to 75 Lakh">INR 50 Lakh to 75 Lakh</option>
              <option value="INR Upto 1 Crore">INR Upto INR 1 Crore</option>
              <option value="INR Above 1 Crore">INR Above 1 Crore</option>
            </select>
          </div>





          <br>
          <span>*<?php echo $myprofile_head3[$_GET['lang']][19]; ?></span>
          <br>
          <div class="row">
            <input type="radio" name="father_status" id="f_status1" value="Retired" selected required>
            <label for="f_status1">Retired</label>
            <input type="radio" name="father_status" id="f_status2" value="Working">
            <label for="f_status2">Working</label>
            <input type="radio" name="father_status" id="f_status3" value="Passed Away">
            <label for="f_status3">Passed Away</label>
          </div>

          <br>
          <span>*<?php echo $myprofile_head3[$_GET['lang']][20]; ?></span>
          <br>
          <div class="row">

            <input type="radio" name="mother_status" id="m_status1" value="Retired" selected required>
            <label for="m_status1">Retired</label>
            <input type="radio" name="mother_status" id="m_status2" value="Working">
            <label for="m_status2">Working</label>

            <input type="radio" name="mother_status" id="m_status3" value="Passed Away">
            <label for="m_status3">Passed Away</label>

            <input type="radio" name="mother_status" id="m_status4" value="Homemaker">
            <label for="m_status4">Homemaker</label>
          </div>



          <div class="input-box-btn">
            <p><b><?php echo $profile_creation[$_GET['lang']][11]; ?> :</b><br>*<?php echo $profile_creation[$_GET['lang']][12]; ?></p>
            <!-- <input type="submit" name="save_submit" value="Save & Submit"> -->
                 <button type="submit" class="save_submit" id="save_submit" name="save_submit" onclick="pay_func();"><?php echo $profile_creation[$_GET['lang']][10]; ?></button>
          </div>


        </div>



        <!-- This is An End To My Input -->


      </form>

      <!-- This is An End to MultiStep Form -->


    </div>

    <script>
      function pay_func(){
        window.location="https://jainrashtriyaektasangthan.in/payment/products.php";
      }
    </script>

    <script src="js/loader.js"></script>
    <script src="js/navbar.js"></script>


    <script>
      var currentTab = 0; // Current tab is set to be the first tab (0)
      showTab(currentTab); // Display the current tab

      function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
          document.getElementById("prevBtn").style.display = "none";
        } else {
          document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
          document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
          document.getElementById("nextBtn").innerHTML = "Next";
        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
      }

      function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
          //...the form gets submitted:
          document.getElementById("regForm").submit();
          return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
      }

      function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
          // If a field is empty...
          if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
          }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
          document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
      }

      function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
          x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
      }


      // This Are My onCLick Starting MultiStep Form

      function openMultiStep() {
        document.getElementById("regForm").style.display = "flex";
        document.getElementById("p-l").style.display = "none";
        document.getElementById("profile-content").style.display = "none";
      }
    </script>


  </body>

  </html>

  <script>
  function set_language(){
    var language = jQuery('#lang').val();
    window.location.href= 'profile_creation.php?lang='+language;


}
</script>
<?php
  // This is The Main Session Function Ends
}
?>