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

function InsertIntoAppointmentTable($dbConn, $id ,$businessId, $ownerId, $petName, $petSpecies, $appointmentTime, $status)
{
    $query = "INSERT INTO appointmenttable (id, businessId, ownerId, petName, petSpecies, appointmentTime, status) VALUES ('" . $id . "','" . $businessId . "', " . $ownerId . ", " . $petName . ", " . $petSpecies . "" . $appointmentTime . "" . $status . ");";

    return mysqli_query($dbConn, $query);
}

?>