<!DOCTYPE html>
<html>
<head>
    <title>PupsNPoodles</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<nav>
    <ul>
        <li><a href="/frontend/index.php">Home</a></li>
        <?php
        echo $_SESSION['userId'];
            if(isset($_SESSION['userId']))
            {
                echo '<li><a href="/frontend/login.php">Logout</a></li>';
            }
            else
            {
                echo '<li><a href="/frontend/login.php">Login</a></li>';
            }
        ?>
        
    </ul>
</nav>