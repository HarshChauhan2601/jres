

<?php
   
   // Database configuration    
   define('DBSERVER', 'localhost');
   define('DBUSERNAME', 'root');
   define('DBPASSWORD', '');
   define('DBNAME', 'jres');
  
   // Create database connection 
   $conn = new mysqli(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);
    
   // Check connection 
   if ($conn->connect_error) { 
       die("Connection failed: " . $conn->connect_error); 
   }else{
   }
   
?>