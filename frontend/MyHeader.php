<?php
    session_start();

    require "..\backend\DatabaseConnection.php";
    if(array_key_exists('userId', $_SESSION)) {
        $user = $_SESSION['userId'];
        
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
<title><?php echo $title?></title>
<nav>
    <h1 id="main-header">Pups N Poodles</h1>
    <ul>
        <li><a href="index.php">Home</a></li>
        <?php
            if(isset($_SESSION['userId']))
            {
                echo '<li><a href="login.php">Logout</a></li>';
                echo '<li><a href="appointment.php">Make an Appointment</a></li>';
            }
            else
            {
                echo '<li><a href="login.php">Login</a></li>';
            }
        ?>
    </ul>
    <h1 id="sub-header"><?php echo $title?></h1>
</nav>
