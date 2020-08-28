<?php

//Constants
DEFINE('DB_USER', 'root');
DEFINE('DB_PSWD', '');
DEFINE('DB_SERVER', 'localhost');
DEFINE('DB_NAME', 'pupsnpoodles');

function ConnGet() {
    // $dbConn will contain a resource link to the database
    // @ Don't display error
    $dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 3308)
        or die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error()); // Display messge and end PHP script

    return $dbConn;
}

function FindUserId($dbConn, $username, $password)
{
    $query = "SELECT id FROM UserTable WHERE username='" . $username . "' AND password='" . $password . "';";

    $table = mysqli_query($dbConn, $query);
    return mysqli_fetch_array($table)['id']; 
}

function InsertIntoAppointmentTable($dbConn, $businessId, $ownerId, $petName, $petSpecies, $appointmentTime, $status)
{
    $query = "INSERT INTO AppointmentTable (businessId, ownerId, petName, petSpecies, appointmentTime, status) VALUES (?, ?, ?, ?, ?, ?);";

    $prep = mysqli_prepare($dbConn, $query);

    mysqli_stmt_bind_param($prep, "iissss", $businessId, $ownerId, $petName, $petSpecies, $appointmentTime, $status);

    mysqli_stmt_execute($prep);

    $affected_rows = mysqli_stmt_affected_rows($prep);
    
    mysqli_stmt_close($prep);

    return $affected_rows;
}

function ReturnBuissness($dbConn)
{
    // $query = "SELECT name FROM UserTable WHERE 'isBusiness'='1';";
    $query = "SELECT name FROM usertable WHERE `isBusiness` = 1;";

    return mysqli_query($dbConn, $query);
}

function InsertUser($dbConn, $name, $username, $password, $isBusiness)
{
    $query = "INSERT INTO UserTable(name, username, password, isBusiness) VALUES (?, ?, ?, ?);";

    $prep = mysqli_prepare($dbConn, $query);

    mysqli_stmt_bind_param($prep, "sssi", $name, $username, $password, $isBusiness);

    mysqli_stmt_execute($prep);
}

?>