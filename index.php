
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
    <title>JainRashtriyaEktaSangathan - Home Page</title>

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
    <!-- This are My CSS Files -->
    <link rel="stylesheet" href="styles/index.css?<?php echo time(); ?>">

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
    <div class="div" style="height: 4rem;"></div>


    <!-- This is My Loader -->
  <!-- Loader Container -->
  <div class="loader-container">
    <span>Please, Wait a Moment !!!</span>
    <div class="loader"></div>
  </div>

    <!-- This is An End To My Loader -->

    <!-- This is My Hover to Top Button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa-solid fa-arrow-up-long"></i></button>

    <!-- This is An end  -->

    <!-- This is My Slider -->
    <div class="slider-container">
        <div class="slider">
            <div class="slide" id="slide1">
                 <div class="slide-l">
                 <h2>
                  <?php echo $home_slider_content[$_GET['lang']][0]; ?>
                 </h2>
                 <?php echo $home_slider_content[$_GET['lang']][1]; ?>
                 </div>

                 <div class="slide-r">
                 <img src="images/wedding.png" alt="">
                 </div>
            
                </div>

            <div class="slide" id="slide2">
                <div class="slide-l">
                    <img src="images/signup.png" alt="">
                </div>
                <div class="slide-r">
                    <h2>  <?php echo $home_slider_content[$_GET['lang']][2]; ?></h2>
                    <p>  <?php echo $home_slider_content[$_GET['lang']][3]; ?></p>
                    <br>
                    <a href="register.php" target="_blank"><i class="fa-solid fa-user"></i>&nbsp;<?php echo $footer_content[$_GET['lang']][4]; ?></a>
                </div>
            </div>

            <div class="slide" id="slide3">
                <div class="slide-l">
                    <h2>  <?php echo $home_slider_content[$_GET['lang']][4]; ?></h2>
                    <p>  <?php echo $home_slider_content[$_GET['lang']][5]; ?></p>
                    <a href="events.php" target="_blank"><i class="fa-solid fa-square-check"></i> &nbsp;<?php echo $footer_content[$_GET['lang']][6]; ?></a>
                </div>
                <div class="slide-r">
                    <img src="images/events.png" alt="">
                </div>
            </div>

        </div>
        <button class="slider-btn prev" onclick="prevSlide()">&#10094;</button>
        <button class="slider-btn next" onclick="nextSlide()">&#10095;</button>
    </div>
    <!-- This is An End to My Slider -->



    <!-- Some More Information Para -->
    <div class="para">

        <div class="para-left">
            <img src="images/web_img1.jpg" alt="">
            <img src="images/web_img2.jpg" alt="">
            <img src="images/web_image3.jpg" alt="">
        </div>

        <div class="para-right">
            <span style="background: mediumseagreen; padding: 10px 20px;">#Proudly United</span><br><br>
            <h2>  <?php echo $home_para_content[$_GET['lang']][0]; ?></h2>
            <div class="line">
                <div class="line-inner"></div>
            </div>
            <p> <?php echo $home_para_content[$_GET['lang']][1]; ?></p>

        </div>

    </div>
    <!-- This is An End to My Information Para -->


    <!--  Our Achiever's  Page -->
    <div class="achieve">
        
    <div class="achieve-l">
        <h2><?php echo $home_achieve_content[$_GET['lang']][0]; ?></h2>
        <a href="achievers.php"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;<?php echo $home_achieve_content[$_GET['lang']][1]; ?></a>
    </div>

    <div class="achieve-r"  id="cCarousel" >  
        <!-- This Are My Previous & Next Button -->         
        <div class="arrow" id="prev"><i class="fa-solid fa-chevron-left"></i></div>
        <div class="arrow" id="next"><i class="fa-solid fa-chevron-right"></i></div>
        <!-- This is An End To My Prev & Next Button -->
        <div id="carousel-vp">
          <div id="cCarousel-inner">
    

          <!-- This is My PHP Script which will give u the achievers data and their bio -->
          <?php
          $sql_regis = "SELECT * from registration where achiever = 'YES' order by id limit 7";
          $exe_regis = mysqli_query($conn, $sql_regis);

          if(mysqli_num_rows($exe_regis) > 0){
            foreach($exe_regis as $e){
?>


          <!-- This is An End -->
            <article class="cCarousel-item">
              <img src="https://images.unsplash.com/photo-1564292284209-60cce69f08ed?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2ODQ0MTA1MTJ8&ixlib=rb-4.0.3&q=80&w=400" alt="Moon">
              <div class="infos">
                <h3><?php echo $e['fname']; ?>&nbsp;<?php echo $e['lname']; ?></h3>
                <p><?php echo $e['short_bio']; ?></p>
                <a href="achievers.php" target="_blank">View Profile</a>
              </div>
            </article>
            <?php
            }
          }

          ?>
    
          </div>
        </div>
    </div>
     
    </div>
    <!-- This is An End to Our Achiever's PAge -->


    

    <!-- Some More Information Para -->
    <div class="para" id="para2">

        <div class="para-left">
        <span style="background: tomato; color: white; padding: 10px 20px;">#Let's Connect</span><br><br><br>
            <h2><?php echo $home_para2_content[$_GET['lang']][0]; ?></h2>
            <div class="line">
                <div class="line-inner"></div>
            </div>

            <ul>
            <?php echo $home_para2_content[$_GET['lang']][1]; ?>
            </ul>

            <br>
            <br>
            <a href="register.php"><i class="fa-solid fa-user"></i>&nbsp;<?php echo $home_para2_content[$_GET['lang']][2]; ?></a>
             
            <a href="profile_creation.php" target="_blanl"><i class="fa-solid fa-ring"></i>&nbsp;<?php echo $home_para2_content[$_GET['lang']][3]; ?></a>
        </div>
         

        <div class="para-right">
           <a href="https://www.vectorstock.com/royalty-free-vector/women-video-call-on-laptop-and-cat-cartoon-vector-47408374" target="_blank" title="VectorStock Image"> <img src="images/index_para.png" alt="">
        </a>
          
        </div>

    </div>
    <!-- This is An End to My Information Para -->






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
        // THis is My Slider
        let currentIndex = 0;
        const slides = document.querySelectorAll('.slide');
        const totalSlides = slides.length;

        function showSlide(index) {
            if (index < 0) {
                currentIndex = totalSlides - 1;
            } else if (index >= totalSlides) {
                currentIndex = 0;
            } else {
                currentIndex = index;
            }

            const newPosition = -currentIndex * 100 + '%';
            document.querySelector('.slider').style.transform = `translateX(${newPosition})`;
        }

        function nextSlide() {
            showSlide(currentIndex + 1);
        }

        function prevSlide() {
            showSlide(currentIndex - 1);
        }

        // Automatic slide change every 3 seconds
        setInterval(nextSlide, 3000);
    </script>
    <script src="hover_top.js"></script>
    <script >
        let currentIndexProfile = 0;

function scrollCarousel(direction) {
    const carousel = document.getElementById('carousel');
    const cardWidth = document.querySelector('.achieve-box').offsetWidth + 20;
    const maxIndex = carousel.children.length - 1;

    currentIndexProfile = (currentIndexProfile + direction) % (maxIndex + 1);
    if (currentIndex < 0) {
        currentIndex = maxIndex;
    }

    const translateValue = -currentIndex * cardWidth;
    carousel.style.transform = `translateX(${translateValue}px)`;
}
    </script>
     

     <script src="js/loader.js"></script>
     <script src="js/profileCardScroller.js"></script>
     <script src="js/hover_top.js"></script>
     <script src="js/navbar.js"></script>
     <script src="js/language.js"></script>
</body>

</html>