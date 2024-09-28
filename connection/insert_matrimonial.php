<?php


 include 'conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="errors.css">
</head>
<body>
    


<?php

$loginFirst = '<div  style="min-width: 70%; height: fit-content; margin: auto;  background: #f8d7da; display: flex;">
<i class="fa-solid fa-triangle-exclamation" style="line-height: 3rem; margin-left:2rem; font-size: 22px;"></i>&nbsp;&nbsp;
<p style="line-height: 3rem; font-size: 18px; color: #262626; margin-left: 1rem;">
Please, Login First to build an matrimonial profile.</p>
</div>';

?>
<?php


session_start();
 
$matri_id = 0;
// Check if the user is logged in
if (!isset($_SESSION['fname'])) {
    echo "Please <a href='login.php'>Login</a> first or <a href='register.php'>Create an Account</a> to view the matrimonial page.";

    exit();
}elseif($_SESSION['matri_profile_created'] == "YES") {
    echo " <div class='error-container'>
<h1>Error:</h1>
<p>Your Matrimonial Profile Already Exists !!!</p>
<a href='index.php' target='_blank'>Go Back to Homepage</a>

</div> ";
    exit();
}
// id, matri_id
// mother_tongue, highest_edu, course, college, height_ft, height_inches, father_name, father_occupation, mother_name, siblings, martial, native, parent_living, work_type, work_title
// , cname, bio, income, father_status, mother_status

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save_submit"])){


    $mother_tongue = mysqli_real_escape_string($conn, $_POST['mother_tongue']);
    $highest_edu = mysqli_real_escape_string($conn, $_POST['highest_edu']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    $college = mysqli_real_escape_string($conn, $_POST['college']);
    $height_ft = mysqli_real_escape_string($conn, $_POST['height_ft']);
    $height_inches = mysqli_real_escape_string($conn, $_POST['height_inches']);
    
    $father_name = mysqli_real_escape_string($conn, $_POST['father_name']);
    $father_occupation = mysqli_real_escape_string($conn, $_POST['father_occupation']);
    $mother_name = mysqli_real_escape_string($conn, $_POST['mother_name']);
    
    $siblings = mysqli_real_escape_string($conn, $_POST['siblings']);
    $martial = mysqli_real_escape_string($conn, $_POST['martial']);

    $native = mysqli_real_escape_string($conn, $_POST['native']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);

    $parent_living = mysqli_real_escape_string($conn, $_POST['parent_living']);
    $work_type = mysqli_real_escape_string($conn, $_POST['work_type']);
    $work_title = mysqli_real_escape_string($conn, $_POST['work_title']);

    $cname = mysqli_real_escape_string($conn, $_POST['cname']);
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);

    $income = mysqli_real_escape_string($conn, $_POST['income']);
    $father_status = mysqli_real_escape_string($conn, $_POST['father_status']);
    $mother_status = mysqli_real_escape_string($conn, $_POST['mother_status']);
    $matri_id = $_SESSION['id'];

    
    //    $sql = "INSERT INTO matriprofile('matri_id', 'mother_tongue', 'edu', 'course', 'college_name', 'height_ft', 'height_inches', 'father_name', 'father_occupation', 'mother_name', 'siblings', 'martial_status', 'native', 'parent_living', 'work_type', 'work_title', 'cname', 'bio', 'income', 'father_status', 'mother_status') VALUES ('$matri_id', '$mother_tongue', '$course', '$college', '$height_ft', '$height_inches', '$father_name', '$father_occupation', '$mother_name', '$siblings', '$martial', '$native', '$parent_living', '$work_type', '$work_title', '$cname', '$bio', '$income','$father_status', '$mother_status')";
    
    // matri_id, mother_tongue, edu, course, college_name, height_ft, height_inches, father_name, father_occupation, mother_name, siblings, martial_status, native, parent_living, work_type, work_title,cname, bio, income, father_status, mother_status, age
    
    // To already exist
    
    $status = "INACTIVE";
    
    $sql = "INSERT INTO matriprofile(matri_id, mother_tongue, edu, course, college_name, height_ft, height_inches, father_name, father_occupation, mother_name, siblings, martial_status, native, parent_living, work_type, work_title,cname, bio, income, father_status, mother_status, age,status) VALUES ('$matri_id', UPPER('$mother_tongue'), UPPER('$highest_edu') ,UPPER('$course'), UPPER('$college'), UPPER('$height_ft'), UPPER('$height_inches'), UPPER('$father_name'), UPPER('$father_occupation'), UPPER('$mother_name'), UPPER('$siblings'), UPPER('$martial'), UPPER('$native'), UPPER('$parent_living'), UPPER('$work_type'), UPPER('$work_title'), UPPER('$cname'), UPPER('$bio'), UPPER('$income'), UPPER('$father_status'), UPPER('$mother_status'), '$age', '$status' ) limit 1";
       
    
    $exe = mysqli_query($conn, $sql);
    
    
    $sql_regis = "update registration set matri_profile_created = 'YES' where id ='".$_SESSION['id']."'";
    mysqli_query($conn, $sql_regis);
     
    $_SESSION['matri_profile_created'] = "YES";
    
    
    if($exe){
    
        echo " <div class='error-container'>
        <h1 style='color: mediumseagreen;'>Congrats !!!</h1>
        <p>Matrimonial Profile Created SuccessFully.</p>
        <a href='index.php' target='_blank'>Go Back to Homepage</a>
        <a href='matrimonial.php' target='_blank'>Start Finding Soul Mate</a>
        </div> ";
    }else{
        echo " <div class='error-container'>
        <h1>Error !!!</h1>
        <p>Something Wrong Occured Please try after a while.</p>
        <a href='index.php' target='_blank'>Go Back to Homepage</a>
        <a href='profile_creation.php' target='_blank'>Back to Matrimonial Page</a>
        </div> ";
    }
    
    }
    

    $checkSql = "select * from payment where internal_id = '".$_SESSION["id"]."'";
    $exeCheck = mysqli_query($conn, $checkSql);

    $maleCheck = "select * from registration where gender = 'MALE' and id = '".$_SESSION["id"]."'";
    $maleExe = mysqli_query($conn, $maleCheck);

    if(mysqli_num_rows($exeCheck) == 0 and mysqli_num_rows($maleExe) > 0){
        header("Location: http://localhost/Sanjay_Uncle/payment/products.php");
    }else if(mysqli_num_rows($maleExe) == 0){
        //  This is for female free members
        $status = "ACTIVE";
        $activeMatriProfile = "UPDATE matriprofile SET status = 'ACTIVE' where matri_id ='".$_SESSION["id"]."'";
        $sql_active_matri = mysqli_query($conn, $activeMatriProfile);
    

    // This is An end to check payme
    }else{

    }


    if(mysqli_num_rows($exeCheck) > 0 ){
        $status = "ACTIVE";
    
    }

    
        // This will active matrimonial profile
        $activeMatriProfile = "UPDATE matriprofile SET status = '$status' where matri_id ='".$_SESSION["id"]."'";
        $sql_active_matri = mysqli_query($conn, $activeMatriProfile);
    
// Close connection
$conn->close();

?>

</body>
</html>