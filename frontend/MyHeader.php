<?php
//Starts PHP Sessions
    session_start();

    require "..\backend\Helper.php";
    
    if(isset($_SESSION['userId'])) {
        $user = GetUser($_SESSION['userId']);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>PupsNPoodles: <?php echo $title?></title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@300&display=swap" rel="stylesheet">
</head>
<body>

<!-- Header Nav Bar Creation -->
<nav>
    <h1 id="main-header">Pups N Poodles</h1>
    <ul>
        <li><a href="index.php">Home</a></li>
        <?php
        //If User is logged in they will be able to see the profile and appointment nav links

            //Checks for populated user session
            if(isset($_SESSION['userId']))
            {
                if($_SESSION['isBusiness'] == false)
                {
                    echo '<li><a href="appointment.php">Make an Appointment</a></li>';
                    echo '<li><a href="profile.php">Profile</a></li>';
                }
                echo '<li><a href="login.php">Logout</a></li>';
                
            }
        //If Not they will only be able to see home and login

            else
            {
                echo '<li><a href="login.php">Login</a></li>';
            }
        ?>
    </ul>

    <!-- Dynamic Header for each page -->
    <h1 id="sub-header"><?php echo $title?></h1>
</nav>
