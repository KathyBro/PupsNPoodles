<?php
    include_once "DatabaseConnection.php";

    function Login($username, $password)
    {
        $dbConn = ConnGet();
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        $userId = FindUserId($dbConn, $username, $password);
        
        mysqli_close($dbConn);
        return $userId;
    }

    function Logout()
    {
        unset($_SESSION['userId']);
    }


?>