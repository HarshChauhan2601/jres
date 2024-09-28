<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ec3a451c3a.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">

   <!-- This are My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Rubik&display=swap" rel="stylesheet">

    <!-- This is Multi LAnguage Code -->
 
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        #sidebar {
            width: 250px;
            height: 100%;
            background-color: #f6f4f9;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 20px;
            color: #fff;
            border-right: 1px dashed lightgrey;
        }

        #sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 14px;
            color: #262626;
            display: block;
            transition: 0.3s;
        }

        #sidebar a:hover {
            background-color: #555;
            color: white;
        }

        #sidebar i{
            margin-right: 0.5rem;
        }

        #content {
            margin-left: 250px;
            padding: 20px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        /* Optional: Add some style to make it look better */
        #header {
            background-color: #333;
            padding: 10px;
            color: #fff;
            text-align: center;
        }

        /* This Are My Cards */
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 15px;
            padding: 20px;
            text-align: center;
            width: 200px;
        }

        .card h2 {
            margin-bottom: 10px;
            color: #333;
        }

        .card p {
            color: #666;
        }
    </style>
</head>
<body>

    <div id="sidebar">
        <div id="header">JainRashtriyaEktaSangathan.in</div>
        <a href="#"><i class="fa-solid fa-house"></i>Dashboard</a>
        <a href="#"><i class="fa-solid fa-calendar-days"></i>Add Event</a>
        <a href="#"><i class="fa-solid fa-user"></i>Add Achiever's</a>
        <a href=""><i class="fa-solid fa-chart-line"></i>View Accounts</a>
        <!-- Add more links as needed -->
    </div>

    <div id="content">
        <!-- Your content goes here -->
        <div class="card">
        <h2>Total Accounts</h2>
        <p>1,000</p>
    </div>

    <div class="card">
        <h2>Total Matrimonial Profiles</h2>
        <p>500</p>
    </div>

    <!-- Add more cards as needed -->
    <div class="card">
        <h2>Total Events Listed</h2>
        <p>3</p>
    </div>

    <div class="card">
        <h2>Total Achievers Profiles</h2>
        <p>4</p>
    </div>

    <!-- <div class="card">
        <h2></h2>
        <p>Content for card 5</p>
    </div> -->
    </div>



</body>
</html>
