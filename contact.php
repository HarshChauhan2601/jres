<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <?php include 'links.php'; ?>

    <link rel="stylesheet" href="styles/index.css?=<?php echo time(); ?>">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            width: 100%;
            height: fit-content;
            overflow-x: hidden;
        }

        h1{
            color: darkslateblue;
            font-size: 28px;
            margin-bottom: 1rem;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .or {
            width: 100%;
            margin: auto;
            text-align: center;
        }

        section {
            max-width: 600px;
            margin: 5% auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .contact_email{
            display: flex;
            flex-direction: column;
        }

       .contact_email a {
      color: seagreen; /* Link color */
      text-decoration: none; /* Remove default underline */
      font-weight: 400; /* Make the text bold */
      margin: 0.5% 0;
    }

    /* Hover Effect */
    .contact_email a:hover {
      color: #0056b3; /* Change color on hover */
    }

    /* Visited Link */
    .contact_email a:visited {
      color: #4b0082; /* Visited link color */
    }

    i{
        border-radius: 50%;
        padding: 10px;
        border: 1px solid seagreen;
        color: mediumseagreen;
        margin-right: 0.5rem;
    }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;

            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
   <!-- This is My Header -->
   <nav>
    <a href="index.php" class="logo">
                <img src="images/jres_logo.png" style="min-width: 120px; max-height: 130px;" alt="">
            </a>
        <ul id="nav">
          
            <li><a href="index.php">Home</a></li>
            <li><a href="events.php">Events</a></li>
            <li><a href="achievers.php">Achiever's</a></li>
            <li><a href="matrimonial.php">Matrimonial</a></li>
            <li><a href="myprofile.php" id="my_profile"><i class="fa-solid fa-user"></i> My Profile</a></li>

        </ul>
        <div class="toggle">
                <i class="fa-solid fa-bars" id="open">&nbsp;<small>Menu</small></i>
                <i class="fa-solid fa-xmark" id="close" style="display: none;"></i>
    
            </div>
    </nav>
    <!-- This is My Header End -->
    <div class="div" style="height: 4rem;"></div>

    <section class="contact_email">
        <h1>Please, Feel Free to Contact US</h1>
        <a href="tel:07935620051"><i class="fa-solid fa-phone"></i>079-3562 0051</a>
        <a href="mailto:jainektasangathan@gmail.com"><i class="fa-solid fa-envelope"></i>jainektasangathan@gmail.com</a>
        <small style="color: seagreen; font-size: 15px;"><i class="fa-solid fa-hands-praying"></i>In Case of Complaints please spare us with some time in responding.</small>
        <br>
        <hr>
        <br>
        <small><b>NOTE :</b> Please, contact via number only between 10:00 am to 6:00 pm. Except Saturday, Sunday & any other public holidays.</small>
       
    </section>

    <div class="or">
        <p>-------------- OR -------------</p>
    </div>

    <section>
        <form action="connection/insert_contact.php" method="post" id="contactForm">
            <label for="name">*Name:</label>
            <input type="text" id="name" name="name" maxlength="50" required>

            <label for="email">*Email:</label>
            <input type="email" id="email" name="email" maxlength="50" required>

            <label for="message">*Message:</label>
            <textarea id="message" name="message" rows="4" maxlength="250" required></textarea>

            <input type="submit" name="submit" value="Submit"></input>
        </form>
    </section>

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
            <h4>Useful Links</h4>
            <ul>
                <a href="index.php">Home</a>
                <a href="achievers.php">Achievers</a>
                <a href="about.php" target="_blank">About</a>
                <a href="contact.php" target="_blank">Contact</a>
            </ul>
        </div>

        <div class="footer-links">
            <h4>Other Links</h4>
            <ul>
                <a href="register.php" target="_blank">Create an Account</a>
                <a href="matrimonial.php" target="_blank">Matrimonial</a>
                <a href="events.php">Upcoming Events</a>
                <a href="terms.html" target="_blank">Terms & Conditions</a>
            </ul>
        </div>

        <div class="footer-links">
            <!-- Address Icons : <i class="fa-solid fa-location-dot"></i> -->
            <div class="addr_map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3670.530693779203!2d72.53186477372591!3d23.077661114273198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e8346456aaaab%3A0x348287be8058678!2sain%20Rastriya%20Ekta%20Sangthan%20.!5e0!3m2!1sen!2sin!4v1701956589367!5m2!1sen!2sin" width="280" height="150" style="border: 1px solid lightslategrey; border-radius: 5px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <br>
            <strong style="border-top: 1px dashed darkslategrey; padding-top: 10px; width: 100%;">Address:</strong>
            <br>
            <br>
            <address style="color: slategrey;">
                A-102, Pushparaj-1, Opp. Vishwas Bungalow,
                New Judges Bungalow road, Opp. Gujarat High Court, Ghatlodia, Ahmedabad - 380061
            </address>


        </div>
    </footer>
    <!-- This is My Footer End -->

    <!-- This is My CopyRight -->
    <div class="copyRight">
        <p>Copyright <b><i class="fa-regular fa-copyright"></i> 2023</b> - <a href="index.php" style="color: #262626;"><b>JainRashtriyaEktaSangathan.in</b></a> | All Rights Reserved</p>
    </div>
    <!-- This is An End to My CopyRight -->


</body>

</html>