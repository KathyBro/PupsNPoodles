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

function FindUser($dbConn, $username, $password) {
    $query = "SELECT * FROM UserTable WHERE username='" . $username . "' AND password='" . $password . "';";

    $table = mysqli_query($dbConn, $query);
    return mysqli_fetch_array($table); 
}

function FindUserById($dbConn, $userId) {
    $query = "SELECT * FROM UserTable WHERE id='" . $userId . "';";

    $table = mysqli_query($dbConn, $query);
    return mysqli_fetch_array($table); 
}

function InsertIntoAppointmentTable($dbConn, $businessId, $ownerId, $petName, $petSpecies, $appointmentTime, $status)
{
    $query = "INSERT INTO AppointmentTable (businessId, ownerId, petName, petSpecies, appointmentTime, status) VALUES (?, ?, ?, ?, ?, ?);";

    $prep = mysqli_prepare($dbConn, $query);

    mysqli_stmt_bind_param($prep, "iissss", $businessId, $ownerId, $petName, $petSpecies, $appointmentTime, $status);

    mysqli_stmt_execute($prep);

    $affected_rows = mysqli_stmt_affected_rows($prep);
    mysqli_stmt_close($prep);
    // header("Location: /PupsNPoodles/frontend/appointment.php");
    return $affected_rows;
}

function InsertUser($dbConn, $name, $username, $password, $isBusiness)
{
    $query = "INSERT INTO UserTable(name, username, password, isBusiness) VALUES (?, ?, ?, ?);";

    $prep = mysqli_prepare($dbConn, $query);

    mysqli_stmt_bind_param($prep, "sssi", $name, $username, $password, $isBusiness);

    mysqli_stmt_execute($prep);
}

function GetAppointmentsByUser($dbConn, $userId) {
    $query = "SELECT apt.id, apt.businessId as 'BuisnessId', apt.petName, apt.petSpecies, apt.appointmentTime, apt.status, ut.name as 'BuisnessName' FROM appointmenttable apt JOIN usertable ut ON ut.id = apt.businessId WHERE ownerId='" . $userId . "';";

    $table = mysqli_query($dbConn, $query);
    return mySqli_fetch_all($table, MYSQLI_ASSOC); 
}

function GetAppointmentsByBusiness($dbConn, $userId) {
    $query = "SELECT apt.id, apt.businessId as 'BuisnessId', apt.petName, apt.petSpecies, apt.appointmentTime, apt.status, ut.name as 'BuisnessName' FROM appointmenttable apt JOIN usertable ut ON ut.id = apt.businessId WHERE apt.businessId = '" . $userId . "';";

    $table = mysqli_query($dbConn, $query);
    return mySqli_fetch_all($table, MYSQLI_ASSOC); 
}

function SetAppointmentStatus($dbConn, $aptId, $status) {
    $query = "UPDATE appointmenttable SET status = '" . $status . "' WHERE id=" . $aptId . ";";
    mysqli_query($dbConn, $query);
}

function DeleteAppointment($dbConn, $aptId) {
    $query = "DELETE FROM appointmenttable WHERE id=" . $aptId;
    mysqli_query($dbConn, $query); 
}

?>