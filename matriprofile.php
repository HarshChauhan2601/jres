<?php include 'connection/conn.php'; ?>

<?php
session_start();

$sql_match = mysqli_query($conn ,"select * from matriprofile where matri_id = '".$_GET['id']."' order by id desc");
$items = mysqli_fetch_assoc($sql_match);

  
$sql_regis = mysqli_query($conn, "select * from registration where id = '".$items['matri_id']."' order by id desc limit 1");
$items_regis =  mysqli_fetch_assoc($sql_regis);

$imgPath = "connection/" . $items_regis['profile_pic'];
?>
<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php include 'links.php'; ?>
    <!-- This Are My Styles -->
    <link rel="stylesheet" href="styles/matriIndividualProfile.css?=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/registration.css?=<?php echo time(); ?>">

</head>

<body>




    <div class="back">
        <a href="matrimonial.php?age=&location="><i class="fa-solid fa-arrow-left-long"></i> Back To Matrimonial Page</a>
    </div>

    <!-- connection\register_profiles\9281721821_photo-1542291026-7eec264c27ff(1).jpg
    C:\xampp\htdocs\Sanjay_Uncle\connection\register_profiles\9127172172_photo-1515955656352-a1fa3ffcd111.jpg --> 
   
    <div class="container">
        <div class="img">
            <img src="<?php echo $imgPath; ?>" alt="">
            <div class="img-r">
                <h1><?php echo $items_regis['fname']; ?>&nbsp;<?php echo $items_regis['lname']; ?></h1>
                <span><i class="fa-solid fa-user"></i>&nbsp;<?php echo $items['age']; ?>&nbsp;Years</span>
                <span><i class="fa-solid fa-mars-and-venus"></i>&nbsp;<?php echo $items_regis['gender']; ?></span>
            </div>
        </div>

        <!-- Place Details -->
        <div class="container-inner">
            <div class="container-row-wrap">
                <div class="column">
                    <h3>Residing City</h3>
                    <p><?php echo $items['cname']; ?></p>
                </div>

                <div class="column">
                    <h3>Native Place</h3>
                    <p><?php echo $items['native']; ?></p>
                </div>
            </div>
            <!-- Place Details Ends Here  -->

            <!-- Education Details -->
            <div class="container-row-wrap">
                <div class="column">
                    <h3>Highest Education</h3>
                    <p><?php echo $items['edu']; ?></p>
                </div>

                <div class="column">
                    <h3>Course Name</h3>
                    <p><?php echo $items['course']; ?></p>
                </div>
            </div>


            <div class="container-row-wrap">
                <div class="column">
                    <h3>College Name</h3>
                    <p><?php echo $items['college_name']; ?></p>
                </div>
                <div class="column">
                    <h3>Height</h3>
                    <p><?php echo $items['height_ft']."' "; ?><?php echo $items['height_inches']." '' "; ?></p>
                </div>
            </div>

            <!-- Education Details Ends Here -->
            <!-- WOrk Details -->
            <div class="container-row-wrap">
                <div class="column">
                    <h3>Work Type</h3>
                    <p><?php echo $items['work_type']; ?></p>
                </div>

                <div class="column">
                    <h3>Work Title</h3>
                    <p><?php echo $items['work_title']; ?></p>
                </div>
            </div>

            <div class="container-row-wrap">
                <div class="column">
                    <h3>Annual Income</h3>
                    <p><?php echo $items['income']; ?></p>
                </div>

                <div class="column">
                    <h3>Company / Business Name</h3>
                    <p><?php echo $items['cname']; ?></p>
                </div>
            </div>

            <!-- Work Details Ends Here  -->

            <!-- Family Type & Details -->
            <div class="container-row-wrap">
                <div class="column">
                    <h3>Mother Tongue</h3>
                    <p><?php echo $items['mother_tongue']; ?></p>
                </div>

                <div class="column">
                    <h3>Nos Of Siblings</h3>
                    <p><?php echo $items['siblings']; ?></p>
                </div>
            </div>

            <div class="container-row-wrap">
                <div class="column">
                    <h3>Mother's Name</h3>
                    <p><?php echo $items['mother_name']; ?></p>
                </div>

                <div class="column">
                    <h3>Mother's Status</h3>
                    <p><?php echo $items['mother_status']; ?></p>
                </div>
            </div>

            <div class="container-row-wrap">
                <div class="column">
                    <h3>Father's Name</h3>
                    <p><?php echo $items['father_name']; ?></p>
                </div>
                <div class="column">
                    <h3>Father's Occupation</h3>
                    <p><?php echo $items['father_occupation']; ?></p>
                </div>

            </div>

            <div class="container-row-wrap">
                <div class="column">
                    <h3>Father's Status</h3>
                    <p><?php echo $items['father_status']; ?></p>
                </div>
                <div class="column">
                    <h3>Parent's Living Status</h3>
                    <p><?php echo $items['parent_living']; ?></p>
                </div>
            </div>

            <div class="container-row-wrap">
                <div class="column">
                    <h3>Short Bio</h3>
                    <p><?php echo $items['bio']; ?></p>
                </div>
                <div class="column">
                   
                </div>
                
            </div>

            <!-- Family Type & Details Ends Here -->

            <!-- Other Details -->

            <!-- Other Details Ends Here -->
        
            <!-- COntact Detials -->
            <div class="container-row-wrap" id="contact">
              
                <div class="column">
              <!-- The text field -->
              <input type="text" style="display: none; height: 0rem;" value="<?php echo $items_regis['phone']; ?>" id="myInput" readonly>

                    <!-- The button used to copy the text -->
                    <!-- <a onclick="myFunction()" id="call"><i class="fa-solid fa-copy"></i> Copy Phone Number</a>
                      -->
                    <a href="tel:<?php echo $items_regis['phone']; ?>" id="download"><i class="fa-solid fa-phone"></i> Make a Call</a>

                </div>
                <!-- <div class="column">
                    <a href="" type="download" id="download"><i class="fa-solid fa-download"></i> Download Profile</a>
                </div> -->

            </div>
            <!-- Contact Details Ends Here -->

        </div>

    </div>


    <script>
        function myFunction() {
            // Get the text field
            var copyText = document.getElementById("myInput");

            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);

            // Alert the copied text
            alert("Copied the text: " + copyText.value);
        }
    </script>


</body>
</html>