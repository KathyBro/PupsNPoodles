<!-- REMEMBER TO WRITE LOTS OF COMMENTS!!! -->
<?php
    $title = "Home"; 
    include_once "MyHeader.php";
    
    if(array_key_exists("ChangeValue", $_POST)) {
        echo "<h2>" . $_POST["ChangeValue"] . " appointment for " . $_POST["aptPet"] . "</h2>";
        UpdateAppointmentStatus($_POST["aptNum"], strtolower($_POST["ChangeValue"]) . "ed");
    }
    if(array_key_exists("Delete", $_POST)) {
        echo "<h2>" . $_POST["Delete"] . "d appointment for " . $_POST["aptPet"] . "</h2>";
        RemoveAppointment($_POST["aptNum"]);
    }
?>

<div>
    <h2><?php if(isset($_SESSION['userId'])) echo $user["name"] . "'s Appointments"?></h2>
</div>

<?php
    if(isset($_SESSION['userId'])) {
        if($user["isBusiness"] == true) {
            $appointments = GetBusinessAppointments($user["id"]);
            echo "<div class='appointment-list'>";
            foreach ($appointments as $appointment) {
                echo "<div class='appointment-listing'>";
                echo "<h3>" . $appointment["petName"] . "</h3>";
                echo "<h4>" . $appointment["petSpecies"] . "</h4>";
                echo "<p>" . $appointment["BuisnessName"] . "</p>";
                echo "<p>" . $appointment["appointmentTime"] . "</p>";
                echo "<p><strong>" . $appointment["status"] . "</strong></p>";
                echo "<form method='POST'>";
                if($appointment["status"] == "pending") {
                    echo "<form method='Post'>";
                    echo "<input type='hidden' name='aptNum' value='" . $appointment["id"] . "'/>";
                    echo "<input type='hidden' name='aptPet' value='" . $appointment["petName"] . "'/>";
                    echo "<input type='submit' name='ChangeValue' value='Accept'></input>";
                    echo "</form>";
                    echo "<form method='Post'>";
                    echo "<input type='hidden' name='aptNum' value='" . $appointment["id"] . "'/>";
                    echo "<input type='hidden' name='aptPet' value='" . $appointment["petName"] . "'/>";
                    echo "<input type='submit' name='ChangeValue' value='Reject'></input>";
                    echo "</form>";
                }
                echo "</form>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            $appointments = GetAppointments($user["id"]);
            echo "<div class='appointment-list'>";
            foreach ($appointments as $appointment) {
                echo "<div class='appointment-listing'>";
                echo "<h3>" . $appointment["petName"] . "</h3>";
                echo "<h4>" . $appointment["petSpecies"] . "</h4>";
                echo "<p>" . $appointment["BuisnessName"] . "</p>";
                echo "<p>" . $appointment["appointmentTime"] . "</p>";
                echo "<p><strong>" . $appointment["status"] . "</strong></p>";
                if ($appointment["status"] == "rejected") { 
                    echo "<form method='Post'>";
                    echo "<input type='hidden' name='aptNum' value='" . $appointment["id"] . "'/>";
                    echo "<input type='hidden' name='aptPet' value='" . $appointment["petName"] . "'/>";
                    echo "<input type='submit' name='Delete' value='Delete'></input>";
                    echo "</form>";
                }
                echo "</div>";
            }
            echo "</div>";
        }
    }
?>

<?php
    include_once "MyFooter.php";
?>
