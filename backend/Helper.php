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

    function GetAllBusinesses()
    {
        $dbConn = ConnGet();

        $returnedTable = ReturnBuissness($dbConn);

        $i = 0;
        $returningArray = null;
        while ($row = mysqli_fetch_row($returnedTable))
        {
            $returningArray[$i] = $row[0];
            $i++;
        }

        mysqli_close($dbConn);
        return $returningArray;
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

    function UploadPet($petName, $species)
    {
        $dbConn = ConnGet();
        $petName = htmlspecialchars($petName);
        $species = htmlspecialchars($species);

        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $fileExtensions = array("jpg", "jpeg", "png", "gif");

        if(in_array($imageFileType, $fileExtensions))
        {
            $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
            $image = 'data:image/' . $imageFileType . ';base64, ' . $image_base64;

            InsertPet($dbConn, $image, $petName, $species, $_SESSION['userId']);
        }

        mysqli_close($dbConn);

    }

    function RetrievePets()
    {
        $dbConn = ConnGet();

        $ownerId = $_SESSION['userId'];
        $petData = PetsByOwner($dbConn, $ownerId);

        mysqli_close($dbConn);

        return $petData;
    }

?>