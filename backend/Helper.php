<?php
    include_once "DatabaseConnection.php";

    function Login($username, $password)
    {
        $dbConn = ConnGet();
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        $userId = FindUserId($dbConn, $username, $password);
        
        mysqli_close($dbConn);
        $_SESSION['userId'] = $userId;
    }

    function Logout()
    {
        unset($_SESSION['userId']);
    }

    function InsertAppointment($businessId, $ownerId, $petName, $petSpecies, $appointmentTime, $status)
    {
        $dbConn = ConnGet();

        InsertIntoAppointmentTable($dbConn,$businessId, $ownerId, $petName, $petSpecies, $appointmentTime, $status);

        mysqli_close($dbConn);
    }

    function InsertNewUser($name, $username, $password, $isBusiness)
    {
        $dbConn = ConnGet();

        $name = htmlspecialchars($name);
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        $isBusiness = htmlspecialchars($isBusiness);

        InsertUser($dbConn, $name, $username, $password, $isBusiness);

        $id = FindUserId($dbConn, $username, $password);

        $_SESSION['userId'] = $id;

        mysqli_close($dbConn);
    }

?>