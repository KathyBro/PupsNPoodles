<?php
    require "DatabaseConnection.php";
    if(array_key_exists('userId', $_SESSION)) {
        $user = $_SESSION['userId'];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>PupsNPoodles</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<h1><?php echo $title?></h1>
<nav>
    <ul>
        <li><a href="/PupsNPoodles/frontend/index.php">Home</a></li>
        <li><a href="/PupsNPoodles/frontend/login.php">Login</a></li>
        <li><a href="/PupsNPoodles/frontend/appointment.php">Make an Appointment</a></li>
    </ul>
    <h1><?php echo $title?></h1>
</nav>
