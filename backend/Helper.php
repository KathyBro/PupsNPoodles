<?php
    include_once "DatabaseConnection.php";

    function Login($username, $password)
    {
        $dbConn = ConnGet();
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        $userId = FindUserId($dbConn, $username, $password);
        $isBusiness = IsBusiness($dbConn, $userId);
        
        mysqli_close($dbConn);
        $_SESSION['userId'] = $userId;
        $_SESSION['isBusiness'] = $isBusiness;
    }

    function Logout()
    {
        unset($_SESSION['userId']);
        unset($_SESSION['isBusiness']);
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
            $returningArray[$i][0] = $row[0];//0 is id
            $returningArray[$i][1] = $row[1];//1 is name
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

        // $name = $_FILES['file']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $fileExtensions = array("jpg", "jpeg", "png", "gif");

        if(in_array($imageFileType, $fileExtensions))
        {
            $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
            $image = 'data:image/' . $imageFileType . ';base64, ' . $image_base64;
            
            // move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);

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

    function DisplayOnlyPets()
    {
        $petsTable = RetrievePets();

        foreach ($petsTable as $pet)
        {
            echo "<div class='appointment-listing'>";
                echo "<h3>" . $pet["name"] . "</h3>";
                echo "<h4>" . $pet["species"] . "</h4>";
                echo "<img src='" . $pet["image"] . "'>";
                echo "</div>";
        }
    }



    function GetAppointments($userId) {
        $dbConn = ConnGet();

        $userId = htmlspecialchars($userId);

        $appointments = GetAppointmentsByUser($dbConn, $userId);
        mysqli_close($dbConn);
        return $appointments;
    }

    function GetBusinessAppointments($userId) {
        $dbConn = ConnGet();

        $userId = htmlspecialchars($userId);

        $appointments = GetAppointmentsByBusiness($dbConn, $userId);
        mysqli_close($dbConn);
        return $appointments;
    }

    function GetUser($userId) {
        $dbConn = ConnGet();

        $userId = htmlspecialchars($userId);

        $appointments = FindUserById($dbConn, $userId);
        mysqli_close($dbConn);
        return $appointments;
    }

    function UpdateAppointmentStatus($aptId, $status) {
        $dbConn = ConnGet();

        $aptId = htmlspecialchars($aptId);
        $status = htmlspecialchars($status);
        SetAppointmentStatus($dbConn, $aptId, $status);
        mysqli_close($dbConn);
    }

    function RemoveAppointment($aptId) {
        $dbConn = ConnGet();

        $aptId = htmlspecialchars($aptId);
        DeleteAppointment($dbConn, $aptId);
    }
?>